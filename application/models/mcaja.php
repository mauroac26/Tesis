<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcaja extends CI_Model {

function __construct(){

parent::__construct();

}

public function getCtaProveedor($cuit)
{
    $this->db->select( 'a.fCarga fecha, a.comprobante comprobante, a.total total,
                        a.tipoFactura tipoFactura,a.tipoComprobante tipoComprobante,
                         p.apeynom apeynom');
     $this->db->from('altacompra a');
     $this->db->join('proveedor p', 'a.cuit = p.cuit');
     $this->db->where('a.cuit', $cuit);
     $this->db->where('a.formaPago', "Cuenta corriente");
     $this->db->where('a.condicion', "impaga");
     $this->db->order_by('fCarga', 'asc');
     $r = $this->db->get();

     return $r->result();
}

//REGISTRA LA COMPRA
public function registrarOrdenPago($param){

$this->db->select('saldo');
  $this->db->from('movimientosproveedor');
  $this->db->where('cuit', $param['proveedor']);
  $this->db->order_by('fechaCarga', 'desc');
  $this->db->limit(1);
  $query = $this->db->get();
   foreach ($query->result() as $row) {
 $resultado = $row->saldo;
}

$saldo =  $resultado - $param['saldo'] ;

$campos1 = array(
            'fechaCarga' => $param['fCarga'],
            'cuit' => $param['proveedor'],
            'comprobante' => $param['pVenta'].'-'.str_pad($param['numero'], 8, "0", STR_PAD_LEFT),
            'debe' => 0,
            'haber' => $param['saldo'],
            'saldo' => $saldo,
            'tipoComp' => "odp"
      );


$array = array(
            'saldo' => $saldo
      );

$this->db->where('cuit', $param['proveedor']);
$this->db->update('proveedor', $array);



      $campos = array(
            'cuit' => $param['proveedor'],
            'fecha' => $param['fCarga'],
            'comprobante' => $param['numero'],
            'efectivo' => -$param['saldo'],
            'movimientos' => "Pago",
            'puntoVenta' => $param['pVenta'],
            'banco' => "Pago",
            'tarjeta' => "Pago",
            'total' => -$param['saldo']
      );

$this->db->insert('movimientosproveedor', $campos1);
 $this->db->insert('caja', $campos);
 return $this->db->affected_rows();  


}

public function getCaja(){

     $this->db->select( 'c.fecha fecha, c.comprobante comprobante, c.movimientos movimientos, c.total total,
                     c.puntoVenta puntoVenta, c.efectivo efectivo, c.banco banco, c.tarjeta tarjeta,
                         p.apeynom apeynom, c.cuit cuit');
     $this->db->from('caja c');
     $this->db->join('proveedor p', 'c.cuit = p.cuit');
     $this->db->order_by('fecha', 'desc');
     $r = $this->db->get();

     return $r->result();
    }

//MODIFICA LA CONDICION DE LA COMPRA
public function modificarCondicion($param){
    $campos = array(
            'condicion' => "pagado"
            
            );



    $this->db->where('comprobante', $param['comprobante']);
    $this->db->where('cuit', $param['cuit']);
    $this->db->update('altacompra', $campos);

    // return $this->db->affected_rows();


}

//OBTIENE DATOS DEL PAGO, MUESTRA EN INFORMACION
public function getDatosPago($param){
        $this->db->select( 'c.fecha fecha, c.comprobante comprobante, c.total total, c.efectivo efectivo, c.puntoVenta puntoVenta, p.apeynom apeynom, c.cuit cuit');
         $this->db->from('caja c');
         $this->db->join('proveedor p', 'c.cuit = p.cuit');
         $this->db->where('c.comprobante', $param['id']);
         $this->db->where('c.cuit', $param['cuit']);
         $r = $this->db->get();

         return $r->result();
}

}

?>