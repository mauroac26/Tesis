<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mremito extends CI_Model {

function __construct(){

parent::__construct();

}

//REGISTRA LA COMPRA
public function registrarRemito($param){

          $campos = array(
                'comprobante' => $param['numero'],
                'fecha' => $param['fecha'],
                'fechaRemito' => $param['fechaRemito'],
                'cuit' => $param['proveedor'],
                'tipoComprobante' => $param['comprobante'],
                'tipo' => $param['tipoRemito'],
                'totalCantidad' => $param['cantidad'],
                'puntoVenta' => $param['pVenta'],
                'observaciones' => $param['obsRemito'],
                'estado' => $param['pfRemito']

          );
    
    
             
     $this->db->insert('remito', $campos);
     return $this->db->affected_rows();  
    
    // return $this->db->insert_id();
    
    }

    //INSERTA REGISTROS DE LOS DETALLES DEL REMITO
public function detalleRemito($param){
 
          $campos = array(
                'remito_comprobante' => $param['idRemito'],
                'remito_cuit' => $param['cuit'],
                'id_producto' => $param['idProducto'],
                'cantidad' => $param['cantidad'],
                'imputar'  => 0
          );
    
         $r = $this->db->insert('detalleremito', $campos);
    
          return $this->db->insert_id();
       // return $this->db->affected_rows();
    }

//OBTIENE DATOS DEL REMITO, MUESTRA DATOS EN LA TABLAREMITO
public function getRemito(){

     // $this->db->select( 'r.fecha fecha, r.comprobante comprobante, r.totalCantidad total, r.tipo tipo, r.tipoComprobante tipoComprobante, r.estado estado, p.apeynom apeynom, r.cuit cuit, p.domicilio domicilio');
     // $this->db->from('remito r');
     // $this->db->join('proveedor p', 'r.cuit = p.cuit');
     // $this->db->order_by('fecha', 'desc');


     // $r = $this->db->get();

     // return $r->result();
     
     $query = 'select r.fecha fecha, p.apeynom apeynom, r.comprobante comprobante, r.totalCantidad total, r.tipo tipo, r.tipoComprobante tipoComprobante, r.estado estado, r.cuit cuit, p.domicilio domicilio 
        from remito r
        inner join proveedor p
        on r.cuit = p.cuit
        union all
        select rv.fecha fecha, c.nombre apeynom, rv.comprobante comprobante, rv.totalCantidad total, rv.tipo tipo, rv.tipoComprobante tipoComprobante, rv.estado estado,  c.cuit cuit, c.domicilio domicilio
        from remitoVenta rv
        inner join clientes c
        on rv.cuit = c.cuit
        order by fecha';
         
         $resultados = $this->db->query($query);
    return $resultados->result();

//     $this->db->select('r.fecha fecha, r.comprobante comprobante, r.totalCantidad total, r.tipo tipo, r.tipoComprobante tipoComprobante, r.estado estado, p.apeynom apeynom, r.cuit cuit, p.domicilio domicilio');
// $this->db->from('remito r');
// $this->db->join('proveedor p', 'p.cuit = r.cuit');
// $this->db->order_by('fecha', 'asc');
// $query1 = $this->db->get()->result();

// $this->db->select('rv.fecha fecha, c.nombre apeynom, rv.totalCantidad total, rv.puntoVenta pv, rv.estado estado, rv.comprobante comprobante, rv.fecha fecha, rv.tipoComprobante tipoComprobante, c.cuit cuit, rv.tipo tipo, c.domicilio domicilio');
// $this->db->from('remitoventa rv');
// $this->db->join('clientes c', 'c.cuit = rv.cuit');
// $this->db->order_by('rv.fecha', 'asc');
// $query2 = $this->db->get()->result();


//$query = array_merge($query1, $query2);


//$query = $this->db->query($query1 . ' UNION ALL' . $query2);
   
       // return $query;
    
    }

//OBTIENE DATOS DEL REMITO, MUESTRA EN INFORMACION DEL REMITO
public function getDatosRemito($param){
    $this->db->select( 'r.fecha fecha, r.comprobante comprobante, r.totalCantidad total, r.tipo tipo, r.tipoComprobante tipoComprobante, r.estado estado, p.apeynom apeynom, r.cuit cuit, p.domicilio domicilio, r.fechaRemito fechaRemito, r.puntoVenta puntoVenta');
     $this->db->from('remito r');
     $this->db->join('proveedor p', 'r.cuit = p.cuit');
     $this->db->where('r.comprobante', $param['id']);
     $this->db->where('r.cuit', $param['cuit']);
     $r = $this->db->get();

     return $r->result();
}

//OBTIENE DETALES DEL REMITO, MUESTRA EN TABLADETALLEREMITO
public function getDatosDetallesRemito($param){


     $this->db->select('d.cantidad cantidad, p.nombre nombre, p.alicuota alicuota, p.id id');
     $this->db->from('detalleremito d');
     $this->db->join('producto p', 'p.id = d.id_producto');
     $this->db->where('d.remito_comprobante', $param['id']);
     $this->db->where('d.remito_cuit', $param['cuit']);
     $this->db->where('d.imputar', 0);
     $r = $this->db->get();

     return $r->result();
    }


//OBTIENE DATOS DEL REMITO, MUESTRA EN INFORMACION DEL REMITO
public function getCompraRemito($param){
    $this->db->select( 'a.tipoComprobante tipoComprobanteCompra, a.tipoFactura tipoFcompra, a.comprobante comprobanteCompra, a.fCarga fechaCarga');
    $this->db->from('altacompra a');
     //$this->db->from('remito r');
    // $this->db->join('altacompra a', 'a.comprobante = r.id_compra');
     $this->db->where('a.id_remito', $param['id']);
     $this->db->where('a.cuit', $param['cuit']);
     $r = $this->db->get();

     return $r->result();
}


//REGISTRA LA COMPRA
public function registrarRemitoVenta($param){

          $campos = array(
                'comprobante' => $param['numero'],
                'fecha' => $param['fecha'],
                'fechaRemito' => $param['fechaRemito'],
                'cuit' => $param['proveedor'],
                'tipoComprobante' => $param['comprobante'],
                'tipo' => $param['tipoRemito'],
                'totalCantidad' => $param['cantidad'],
                'puntoVenta' => $param['pVenta'],
                'observaciones' => $param['obsRemito'],
                'estado' => $param['pfRemito']

          );
    
    
             
     $this->db->insert('remitoVenta', $campos);
     return $this->db->affected_rows();  
    
    // return $this->db->insert_id();
    
    }

    //INSERTA REGISTROS DE LOS DETALLES DEL REMITO
public function detalleRemitoVenta($param){
 
          $campos = array(
                'remito_comprobanteV' => $param['idRemito'],
                'remito_cuitV' => $param['cuit'],
                'id_producto' => $param['idProducto'],
                'cantidad' => $param['cantidad'],
                'imputar'  => 0
          );
    
         $r = $this->db->insert('detalleremitoVenta', $campos);
    
          return $this->db->insert_id();
       // return $this->db->affected_rows();
    }

//OBTIENE DETALES DEL REMITO VENTA, MUESTRA EN TABLADETALLEREMITO
public function getDatosDetallesRemitoVenta($param){


     $this->db->select('dv.cantidad cantidad, p.nombre nombre, p.alicuota alicuota, p.id id');
     $this->db->from('detalleremitoventa dv');
     $this->db->join('producto p', 'p.id = dv.id_producto');
     $this->db->where('dv.remito_comprobanteV', $param['id']);
     $this->db->where('dv.remito_cuitV', $param['cuit']);
     $this->db->where('dv.imputar', 0);
     $r = $this->db->get();

     return $r->result();
    }

}
?>