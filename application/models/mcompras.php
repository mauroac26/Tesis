<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');
setlocale(LC_TIME, 'es_ES.UTF8');

class Mcompras extends CI_Model {

function __construct(){

parent::__construct();

}

//OBTIENE DATOS DE LA COMPRA, MUESTRA DATOS EN LA TABLACOMPRAS
public function getCompras(){

		 $this->db->select( 'a.fCarga fCarga, a.fComprobante fComprobante, a.comprobante comprobante, a.movimientos movimientos, a.total total,
												a.ven ven , a.formaPago formaPago, a.tipoFactura tipoFactura, a.puntoVenta puntoVenta, a.tipoComprobante tipoComprobante, a.condicion condicion,
												 p.apeynom apeynom, a.cuit cuit');
		 $this->db->from('altacompra a');
		 $this->db->join('proveedor p', 'a.cuit = p.cuit');
		 $this->db->order_by('fCarga', 'desc');
		 $r = $this->db->get();

		 return $r->result;
		}

//OBTIENE DATOS DE LA COMPRA, MUESTRA EN INFORMACION DE LA COMPRA
public function getDatosCompras($param){
		$this->db->select( 'a.fCarga fCarga, a.fComprobante fComprobante, a.comprobante comprobante, a.movimientos movimientos, a.total total,
												a.ven ven , a.formaPago formaPago, a.tipoFactura tipoFactura, a.puntoVenta puntoVenta, a.tipoComprobante tipoComprobante, a.fContab fContab,
												 p.apeynom apeynom, a.cuit cuit, a.condicion condicion' );
		 $this->db->from('altacompra a');
		 $this->db->join('proveedor p', 'a.cuit = p.cuit');
		 $this->db->where('comprobante', $param['id']);
		 $this->db->where('a.cuit', $param['cuit']);
		 $r = $this->db->get();

		 return $r->result();
}

//INSERTA REGISTROS DE LOS DETALLES DE LA COMPRA
public function addDetalleCompra($param){

$this->db->select('cantidad');
	$this->db->from('detalleremito');
	$this->db->where('remito_cuit', $param['cuit']);
	$this->db->where('remito_comprobante', $param['comprobanteFacturar']);
	$this->db->where('id_producto', $param['idProducto']);
	$this->db->limit(1);
	$query = $this->db->get();
	//if ($query->num_rows() > 0){
	 foreach ($query->result() as $row) {
 $cantidad = $row->cantidad;
}
//}

if($cantidad === $param['cantidad']){
	$array = array(
						'imputar' => 1
			);

	$this->db->where('remito_cuit', $param['cuit']);
	$this->db->where('remito_comprobante', $param['comprobanteFacturar']);
	$this->db->where('id_producto', $param['idProducto']);
 $this->db->update('detalleremito', $array);
}else{
	$cantidadTotal = $cantidad - $param['cantidad'];

	$array = array(
						
						'cantidad' => $cantidadTotal
			);

	$this->db->where('remito_cuit', $param['cuit']);
	$this->db->where('remito_comprobante', $param['comprobanteFacturar']);
	$this->db->where('id_producto', $param['idProducto']);
$this->db->update('detalleremito', $array);

$arrayRem = array(
						'estado' => 0
			);

$this->db->where('cuit', $param['cuit']);
$this->db->where('comprobante', $param['comprobanteFacturar']);
$this->db->update('remito', $arrayRem);
}

	 //ACTUALIZA EL STOCK DE UN PRODUCTO
$this->db->select('stock');
	$this->db->from('producto');
	$this->db->where('id', $param['idProducto']);
	//$this->db->limit(1);
	$query = $this->db->get();
	//if ($query->num_rows() > 0){
	 foreach ($query->result() as $row) {
 $cantidad = $row->stock;
 
}

$stock = $cantidad + $param['cantidad'];


		 $producto = array(
						'stock' => $stock
			);

					$this->db->where('id', $param['idProducto']);
					$this->db->update('producto', $producto);

			//INSERTA DATOS EN DETALLECOMPRA
			$campos = array(
						'id_c' => $param['idCompra'],
						'cuit' => $param['cuit'],
						// 'descripcion' => $param['producto'],
						'cantidad' => $param['cantidad'],
						'pUni' => $param['pesounitario'],
						// 'alicuota' => $param['alicuota'],
						'subTotal' => $param['subtotal'],
						'id_producto' => $param['idProducto']
			);

		 $r = $this->db->insert('detallecompra', $campos);

		
	 return $this->db->affected_rows();
}

//ELIMINA DETALLES DE LA COMPRA
public function eliminarDetalleCompra($idcompra){
		 $this->db->select('alicuota');
		 $this->db->from('detallecompra');
			$this->db->where('id_c', $idcompra);
		 $r = $this->db->get();

		 
		
	$campos = array(
						'id_c' => $idcompra
			);

	$this->db->delete('detallecompra', $campos);
return $r->result();
	
}

//REGISTRA LA COMPRA
public function registrarCompra($param){

if ($param['formaPago'] == "Cuenta corriente") {
		//SELECCIONA SALDO DEL PROVEEDOR

	$this->db->select('saldo');
	$this->db->from('movimientosproveedor');
	$this->db->where('cuit', $param['proveedor']);
	$this->db->order_by('fechaCarga', 'desc');
	$this->db->limit(1);
	$query = $this->db->get();
	if ($query->num_rows() > 0){
	 foreach ($query->result() as $row) {
 $resultado = $row->saldo;
}
}else{
	$resultado = 0;
}

$saldo = $resultado + $param['resultado'];

$campos1 = array(
						'fechaCarga' => $param['fCarga'],
						'cuit' => $param['proveedor'],
						'comprobante' => $param['tipoComprobante'].$param['tipoFactura'].str_pad($param['pVenta'], 4, "0", STR_PAD_LEFT).'-'.str_pad($param['numero'], 8, "0", STR_PAD_LEFT),
						'debe' => $param['resultado'],
						'haber' => 0,
						'saldo' => $saldo,
						'tipoComp' => "fac"
			);
$this->db->insert('movimientosproveedor', $campos1);

$array = array(
						'saldo' => $saldo
			);

$this->db->where('cuit', $param['proveedor']);
$this->db->update('proveedor', $array);


		$fPago = "impaga";
}else{
		$fPago = "pagado";
}

			$campos = array(
						'comprobante' => $param['numero'],
						'fCarga' => $param['fCarga'],
						'fComprobante' => $param['fComprobante'],
						'movimientos' => $param['tipoProducto'],
						'cuit' => $param['proveedor'],
						'total' => $param['resultado'],
						'ven' => $param['vencimiento'],
						'tipoComprobante' => $param['tipoComprobante'],
						'tipoFactura' => $param['tipoFactura'],
						'formaPago' => $param['formaPago'],
						'fContab' => $param['fContab'],
						'condicion' => $fPago,
						'puntoVenta' => $param['pVenta'],
						'id_remito' => $param['comprobanteFacturar']
			);

if ($param['comprobanteFacturar'] != 0){



	$arrayRem = array(
						'estado' => 1
						//'id_compra' => $param['numero']
			);

$this->db->where('cuit', $param['proveedor']);
$this->db->where('comprobante', $param['comprobanteFacturar']);
$this->db->update('remito', $arrayRem);
}

 $this->db->insert('altacompra', $campos);
 return $this->db->affected_rows();  

// return $this->db->insert_id();

}

//OBTIENE NOMBRE DEL PROVEEDOR
public function getNombre($nombre){
		
$this->db->like('apeynom', $nombre, 'both');
 $this->db->order_by('cuit', 'asc');
$this->db->limit(10);

return $this->db->get('proveedor')->result();
		}

//OBTIENE DETALES DE LA COMPRA, MUESTRA EN TABLAEDITAR
public function getDatosDetallesCompras($param){

//  $cuitProveedor = 'select cuit from proveedor where apeynom = '.$cuit.'';

// $resultados = $this->db->query($cuitProveedor);

// $this->db->select('cuit');
//   $this->db->from('proveedor');
//   $this->db->where('apeynom', $cuit);
// $cuitProveedor = $this->db->get();
// foreach ($cuitProveedor->result() as $row) {
//  $resultado = $row->cuit;
// }
		 $this->db->select('d.cantidad cantidad, p.nombre nombre, d.subTotal subTotal,d.puni precio');
		 $this->db->from('detallecompra d');
		 $this->db->join('producto p', 'd.id_producto = p.id');
		 $this->db->where('id_c', $param['id']);
		 $this->db->where('cuit', $param['cuit']);
		 $r = $this->db->get();

		 return $r->result();
		}

//ACTUALIZA UNA COMPRA
public function actualizarCompra($id, $param){
		$campos = array(
						'fComprobante' => $param['eFComprobante'],
						'fContab' => $param['eFcontabilizacion'],
						'formaPago' => $param['eFormaPago']
						
						);



		$this->db->where('comprobante', $id);
		$this->db->update('altacompra', $campos);

		return $this->db->affected_rows();


}

//ELIMINA UNA COMPRA
public function eliminarCompra($idcompra){
		 $campos = array(
						'comprobante' => $idcompra
			);
		 
		 $camponumFac = array(
						'numFac' => $idcompra
			);
$this->db->delete('altacompra', $campos);

$this->db->delete('detallecompra', $camponumFac);

return $this->db->affected_rows();

}

// public function getNombreSearch($nombre){
		
//      $this->db->select( 'a.fCarga fCarga, a.fComprobante fComprobante, a.comprobante comprobante, a.movimientos movimientos, a.total total,
//                         a.ven ven , a.formaPago formaPago, a.saldo saldo, a.tipoFactura tipoFactura, a.puntoVenta puntoVenta, a.tipoComprobante tipoComprobante,
//                          p.apeynom apeynom');
//      $this->db->from('altacompra a');
//      $this->db->join('proveedor p', 'a.cuit = p.cuit');
// $this->db->like('apeynom', $nombre, 'both');

// // $query=$this->db->get('altacompra');
// // $numFilas = $query->num_rows();
// // return $numFilas;
// $this->db->limit(50);

// return $this->db->get('altacompra')->result();
//     }

public function libroIvaCompra($param){

	
			$fdesde = $param['fDesde'];
			$fhasta = $param['fHasta'];
			$tipo_factura = $param['tipoComprobante'];
			$tipo_filtro = $param['tipoFiltro'];
			$orden = $param['Orden'];


			$this->db->select( 'a.fCarga fCarga, '.$param['selectF'].' fecha, a.comprobante comprobante, a.total total, a.tipoFactura tipoFactura, a.tipoComprobante tipoComprobante, p.apeynom apeynom, p.cuit cuit, pro.alicuota alicuota');
		 $this->db->from('altacompra a');
		 $this->db->join('proveedor p', 'a.cuit = p.cuit', 'inner');
		$this->db->join('detallecompra d', 'a.comprobante = d.id_c');
		$this->db->join('producto pro', 'd.id_producto = pro.id');
		 $this->db->where(''.$tipo_filtro.'>=',  $fdesde);
		 $this->db->where(''.$tipo_filtro.'<=',  $fhasta);
		 if($tipo_factura != "todos"){
				$this->db->where('tipoFactura', $tipo_factura);
		 }
		 
		 $this->db->distinct('p.apeynom apeynom');
		 $this->db->order_by($orden, 'asc');
		 $r = $this->db->get();

		 return $r;
		}

		public function vencimientoProveedores($param){

			
			$fhasta = $param['fechaHastaVen'];
			$orden = $param['orden'];

           
			$this->db->select( 'a.comprobante comprobante, a.total total, a.tipoFactura tipoFactura, a.tipoComprobante tipoComprobante, p.apeynom apeynom, a.ven vencimiento');
		 $this->db->from('altacompra a');
		 $this->db->join('proveedor p', 'a.cuit = p.cuit');
		 $this->db->where('ven<=',  $fhasta);
		  $this->db->where('condicion',  "impaga");
		  $this->db->where('formaPago',  "Cuenta corriente");
		 //$this->db->distinct('p.apeynom apeynom');
		 $this->db->order_by($orden, 'asc');
		 $r = $this->db->get();

		 return $r->result_array();
		}


public function getGrafico(){
		$this->db->select( 'sum(a.total) total,  p.apeynom proveedor');
		 $this->db->from('altacompra a');
		 $this->db->where('fCarga >=',  '2020-07-01');
		 $this->db->where('fCarga <=',  '2020-12-31');
		 $this->db->join('proveedor p', 'a.cuit = p.cuit');
		 $this->db->group_by('p.cuit');
		 $r = $this->db->get();

		 return $r->result_array();
}


//OBTIENE NOMBRE DEL PROVEEDOR
public function getNombrePendiente(){
		
$this->db->select( 'count(*) cuenta, p.apeynom nombre, p.cuit cuit');
$this->db->from('remito r');
// $this->db->like('p.apeynom', $nombre, 'both');
$this->db->join('proveedor p', 'r.cuit = p.cuit');
$this->db->group_by('p.cuit');
$this->db->where('r.estado',  0);
//  $this->db->order_by('p.cuit', 'asc');
// $this->db->limit(10);
$r = $this->db->get();
return $r->result();
// return $this->db->get('proveedor')->result();
		}



public function getRemitosPendientes($param){
	 
	 $cuit = $param['cuit'];

	 $this->db->select( 'r.fecha fecha, r.comprobante comprobante, r.tipoComprobante tipoComprobante, r.tipo tipo, p.apeynom nombre');
	 $this->db->from('remito r');
	 $this->db->join('proveedor p', 'r.cuit = p.cuit');
	 $this->db->where('r.cuit', $cuit);
	 $this->db->where('r.estado',  0);
	 $this->db->order_by('r.fecha', 'desc');

	 $r = $this->db->get();

	 return $r->result();
	}



public function getDetallesRemitosPendientes($param){
	 
	 $cuit = $param['cuit'];
	 $comprobante = $param['comprobante'];

	 $this->db->select( 'd.cantidad, p.nombre');
	 $this->db->from('detalleremito d');
	 $this->db->join('producto p', 'd.id_producto = p.id');
	 $this->db->where('d.remito_cuit', $cuit);
	 $this->db->where('d.remito_comprobante', $comprobante);
	 $this->db->where('d.imputar', 0);

	 $r = $this->db->get();

	 return $r->result();
	}


	public function getGraficoCompra(){
		 $this->db->query("SET lc_time_names = 'es_ES'");
		 //for ($i=1; $i <= 12 ; $i++) { 
		 	$this->db->select( 'sum(total) total, CONCAT(UPPER(LEFT(date_format(fContab,"%b"),1)),SUBSTR(date_format(fContab,"%b"),2))fecha, year(fContab) year');
		 $this->db->from('altacompra');
		 //$this->db->where('month(fContab)', 10);

		 //$this->db->where('fCarga <=',  '2020-11-31');
		 $this->db->group_by('month(fContab)');
		 $r = $this->db->get();

		 return $r->result_array();
		 //}

		 	
}

	public function getGraficoPrueba(){
		$this->db->query("SET lc_time_names = 'es_ES'");
		 //for ($i=1; $i <= 12 ; $i++) { 
		 	$this->db->select( 'sum(total) total, CONCAT(UPPER(LEFT(date_format(fecha,"%b"),1)),SUBSTR(date_format(fecha,"%b"),2)) fecha, year(fecha) year');
		 $this->db->from('pruebaGraficos');
		 //$this->db->where('month(fContab)', 10);

		 //$this->db->where('fCarga <=',  '2020-11-31');
		 $this->db->group_by('month(fecha)');
		 $r = $this->db->get();

		 return $r->result_array();
		 //}

		 	
}


}
?>

