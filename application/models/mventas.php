<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');
setlocale(LC_TIME, 'es_ES.UTF8');

class Mventas extends CI_Model 
{
  
  function __construct(){

parent::__construct();

}

//OBTIENE DATOS DE LA VENTAS, MUESTRA DATOS EN LA TABLAVENTAS
public function getVentas(){

		 $this->db->select( 'v.fecha fecha, v.comprobante comprobante, v.total total, v.vencimiento vencimiento, v.formaPago formaPago, v.puntoVenta puntoVenta, v.condicion condicion, c.nombre nombre, v.cuit cuit');
		 $this->db->from('venta v');
		 $this->db->join('clientes c', 'v.cuit = c.cuit');
		 $this->db->order_by('v.fecha', 'desc');
		 $r = $this->db->get();

		 return $r->result();
		}

//OBTIENE DATOS DE LA VENTAS, MUESTRA EN INFORMACION DE LA VENTAS
public function getDatosVentas($param){

		$this->db->select( 'v.fecha fecha, v.comprobante comprobante, v.total total, v.vencimiento vencimiento , v.formaPago formaPago, v.puntoVenta puntoVenta, c.nombre nombre, v.cuit cuit, v.condicion condicion, count(*) items, sum(cantidad) unidades' );
		 $this->db->from('venta v');
		 $this->db->join('clientes c', 'v.cuit = c.cuit');
		 $this->db->join('detalleventa dv', 'dv.id_venta = v.comprobante');
		 $this->db->where('v.comprobante', $param['id']);
		 $this->db->where('v.cuit', $param['cuit']);
		 $r = $this->db->get();

		 return $r->result();
}

//OBTIENE DETALES DE LA Ventas, MUESTRA EN TABLAEDITARVentas
public function getDatosDetallesVentas($param){

//  $cuitProveedor = 'select cuit from proveedor where apeynom = '.$cuit.'';

// $resultados = $this->db->query($cuitProveedor);

// $this->db->select('cuit');
//   $this->db->from('proveedor');
//   $this->db->where('apeynom', $cuit);
// $cuitProveedor = $this->db->get();
// foreach ($cuitProveedor->result() as $row) {
//  $resultado = $row->cuit;
// }     

		 $this->db->select('dv.cantidad cantidad, p.nombre nombre, dv.subTotal subTotal,dv.pesoUnitario precio, p.alicuota iva');
		 $this->db->from('detalleventa dv');
		 $this->db->join('producto p', 'dv.id_producto = p.id');
		 $this->db->where('id_venta', $param['id']);
		 $this->db->where('cuit', $param['cuit']);
		 $r = $this->db->get();

		 return $r->result();
		}

//INSERTA REGISTROS DE LOS DETALLES DE LA COMPRA
public function addDetalleVenta($param){
   //ACTUALIZA EL STOCK DE UN PRODUCTO
		$this->db->select('stock');
	$this->db->from('producto');
	$this->db->where('id', $param['idProducto']);
	
	$query = $this->db->get();
	
	 foreach ($query->result() as $row) {
 $cantidad = $row->stock;
 
}

$stock = $cantidad - $param['cantidad'];


		 $producto = array(
						'stock' => $stock
			);

					$this->db->where('id', $param['idProducto']);
					$this->db->update('producto', $producto);

			//INSERTA DATOS EN DETALLECOMPRA
			$campos = array(
						'id_venta' => $param['idVenta'],
						'cuit' => '20-31987654-4',
						'cantidad' => $param['cantidad'],
						'pesoUnitario' => $param['pesounitario'],
						'subTotal' => $param['subtotal'],
						'id_producto' => $param['idProducto']
			);

		 $this->db->insert('detalleventa', $campos);

		
	 return $this->db->affected_rows();
				

	}

	//REGISTRA LA VENTA
public function registrarVenta($param){

if ($param['formaPago'] == "Cuenta corriente") {
		//SELECCIONA SALDO DEL PROVEEDOR

// 	$this->db->select('saldo');
// 	$this->db->from('movimientosproveedor');
// 	$this->db->where('cuit', $param['proveedor']);
// 	$this->db->order_by('fechaCarga', 'desc');
// 	$this->db->limit(1);
// 	$query = $this->db->get();
// 	if ($query->num_rows() > 0){
// 	 foreach ($query->result() as $row) {
//  $resultado = $row->saldo;
// }
// }else{
// 	$resultado = 0;
// }

// $saldo = $resultado + $param['resultado'];

// $campos1 = array(
// 						'fechaCarga' => $param['fCarga'],
// 						'cuit' => $param['proveedor'],
// 						'comprobante' => $param['tipoComprobante'].$param['tipoFactura'].$param['numero'],
// 						'debe' => $param['resultado'],
// 						'haber' => 0,
// 						'saldo' => $saldo,
// 						'tipoComp' => "fac"
// 			);
// $this->db->insert('movimientosproveedor', $campos1);

// $array = array(
// 						'saldo' => $saldo
// 			);

// $this->db->where('cuit', $param['proveedor']);
// $this->db->update('proveedor', $array);


		$fPago = "no cobrado";
}else{
		$fPago = "cobrado";
}

			$campos = array(
						'comprobante' => $param['numero'],
						'fecha' => $param['fecha'],
						'cuit' => $param['cliente'],
						'total' => $param['resultado'],
						'vencimiento' => '2020-11-06',
						'formaPago' => $param['formaPago'],
						'condicion' => $fPago,
						'puntoVenta' => $param['pVenta'],
						'id_remito' => $param['comprobanteFacturar']
			);

if ($param['comprobanteFacturar'] != 0){



	$arrayRem = array(
						'estado' => 1
						
			);

$this->db->where('cuit', $param['cliente']);
$this->db->where('comprobante', $param['comprobanteFacturar']);
$this->db->update('remitoventa', $arrayRem);
}

 $this->db->insert('venta', $campos);
 return $this->db->affected_rows();  

// return $this->db->insert_id();

}

public function getGraficoVentas(){

	$this->db->select( 'sum(cantidad) total, p.nombre nombre');
$this->db->from('detalleventa dv');
// $this->db->like('p.apeynom', $nombre, 'both');
$this->db->join('producto p', 'dv.id_producto = p.id');
$this->db->group_by('p.id');
$this->db->order_by('total', 'desc');
//$this->db->limit(10);

$r = $this->db->get();

return $r->result_array();

}


//OBTIENE NOMBRE DEL CLIENTE
public function getNombre($nombre){
		
$this->db->like('nombre', $nombre, 'both');
 $this->db->order_by('cuit', 'asc');
$this->db->limit(10);

return $this->db->get('clientes')->result();
		}



//OBTIENE NOMBRE DEL Cliente
public function getNombrePendiente(){
		
$this->db->select( 'count(*) cuenta, c.nombre nombre, c.cuit cuit');
$this->db->from('remitoventa rv');
// $this->db->like('p.apeynom', $nombre, 'both');
$this->db->join('clientes c', 'rv.cuit = c.cuit');
$this->db->group_by('c.cuit');
$this->db->where('rv.estado',  0);
//  $this->db->order_by('p.cuit', 'asc');
// $this->db->limit(10);
$r = $this->db->get();
return $r->result();
// return $this->db->get('proveedor')->result();
		}



public function getRemitosPendientes($param){
	 
	 $cuit = $param['cuit'];

	 $this->db->select( 'rv.fecha fecha, rv.comprobante comprobante, rv.tipoComprobante tipoComprobante, rv.tipo tipo, c.nombre nombre');
	 $this->db->from('remitoventa rv');
	 $this->db->join('clientes c', 'rv.cuit = c.cuit');
	 $this->db->where('rv.cuit', $cuit);
	 $this->db->where('rv.estado',  0);
	 $this->db->order_by('rv.fecha', 'desc');

	 $r = $this->db->get();

	 return $r->result();
	}

}


?>