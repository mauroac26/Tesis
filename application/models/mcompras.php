<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcompras extends CI_Model {

function __construct(){

parent::__construct();

}

//OBTIENE DATOS DE LA COMPRA, MUESTRA DATOS EN LA TABLACOMPRAS
public function getCompras(){

     $this->db->select( 'a.fCarga fCarga, a.fComprobante fComprobante, a.comprobante comprobante, a.movimientos movimientos, a.total total,
                        a.ven ven , a.formaPago formaPago, a.saldo saldo, a.tipoFactura tipoFactura, a.puntoVenta puntoVenta, a.tipoComprobante tipoComprobante,
                         p.apeynom apeynom');
     $this->db->from('altacompra a');
     $this->db->join('proveedor p', 'a.cuit = p.cuit');
     $this->db->order_by('fCarga', 'asc');
     $r = $this->db->get();

     return $r->result();
    }

//OBTIENE DATOS DE LA COMPRA, MUESTRA EN INFORMACION DE LA COMPRA
public function getDatosCompras($id){
    $this->db->select( 'a.fCarga fCarga, a.fComprobante fComprobante, a.comprobante comprobante, a.movimientos movimientos, a.total total,
                        a.ven ven , a.formaPago formaPago, a.saldo saldo, a.tipoFactura tipoFactura, a.puntoVenta puntoVenta, a.tipoComprobante tipoComprobante, a.fContab fContab,
                         p.apeynom apeynom, a.condicion condicion');
     $this->db->from('altacompra a');
     $this->db->join('proveedor p', 'a.cuit = p.cuit');
     $this->db->where('comprobante', $id);
     $r = $this->db->get();

     return $r->result();
}

//INSERTA REGISTROS DE LOS DETALLES DE LA COMPRA
public function addDetalleCompra($param){

      $campos = array(
            'numFac' => $param['numero'],
            'descripcion' => $param['producto'],
            'cantidad' => $param['cantidad'],
            'pUni' => $param['pesounitario'],
            'alicuota' => $param['alicuota'],
            'subTotal' => $param['subtotal']
      );

      $this->db->insert('detallecompra', $campos);

      return $this->db->insert_id();
   
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

      $campos = array(
            'comprobante' => $param['numero'],
            'fCarga' => $param['fCarga'],
            'fComprobante' => $param['fComprobante'],
            'movimientos' => $param['tipoProducto'],
            'cuit' => $param['proveedor'],
            'total' => $param['resultado'],
            'ven' => $param['vencimiento'],
            'saldo' => $param['resultado'],
            'tipoComprobante' => $param['tipoComprobante'],
            'tipoFactura' => $param['tipoFactura'],
            'formaPago' => $param['formaPago'],
            'fContab' => $param['fContab'],
            'puntoVenta' => $param['pVenta'],
            'condicion' => "Pendiente"
      );


 $this->db->insert('altacompra', $campos);
 return $this->db->affected_rows();  



}

//OBTIENE NOMBRE DEL PROVEEDOR
public function getNombre($nombre){
    
$this->db->like('apeynom', $nombre, 'both');
 $this->db->order_by('cuit', 'asc');
$this->db->limit(10);

return $this->db->get('proveedor')->result();
    }

//OBTIENE DETALES DE LA COMPRA, MUESTRA EN TABLAEDITAR
public function getDatosDetallesCompras($id){
     $this->db->select('cantidad, descripcion, pUni, subTotal');
     $this->db->from('detallecompra');
     $this->db->where('numFac', $id);
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
}
?>

