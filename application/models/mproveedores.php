<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproveedores extends CI_Model {

function __construct(){

parent::__construct();

}

public function getProveedores(){

     $this->db->select('*');
     // $this->db->select('p.cuit, p.apeynom, p.domicilio, p.localidad, p.telefono');
     // $this->db->from('altacompra a');
     $this->db->from('proveedor');
     // $this->db->join('proveedor p', 'a.cuit = p.cuit');
     // $this->db->where('a.formaPago', "Cuenta corriente");
     // $this->db->group_by('a.cuit');
     $r = $this->db->get();

     return $r->result();
    }


//REGISTRA LA COMPRA
public function registrarProveedor($param){

      $campos = array(
            'cuit' => $param['cuit'],
            'apeynom' => $param['nombre'],
            'domicilio' => $param['direccion'],
            'localidad' => $param['localidad'],
            'telefono' => $param['telefono'],
            'saldo' => 0
      );

 //     $campo1 = array(
    //      'cuit' => $param['cuit'],
    //      'saldo' => 0
    //   );

 // $this->db->insert('movimientosproveedor', $campos);
 $this->db->insert('proveedor', $campos);
 return $this->db->affected_rows();  



}

// public function registrarDetalleProveedor($param){

//      //SELECCIONA SALDO DEL PROVEEDOR
//   $this->db->select('saldoProveedor');
//   $this->db->from('proveedor');
//   $this->db->where('cuit', $param['proveedor']);
//   $consulta = $this->db->get();
//    foreach ($consulta->result() as $row) {
//  $resultado = $row->saldoProveedor;
// }
   
     
//      //INSERTA DATOS EN TABLA DETALLEPROVEEDOR
//   $campos = array(
//          'cuit' => $param['proveedor'],
//          'comprobante' => $param['numero'],
//          'fechacomprobante' => $param['fComprobante'],
//          'debe' => $param['resultado'],
//          'haber' => 0
//    );

     



//  $saldop = $param['resultado'] + $resultado;


  
//              $cuit = $param['proveedor'];
//          $saldoProveedor = array(
//              'saldoProveedor' => $saldop
//      );

//    $this->db->where('cuit', $cuit);
//  $this->db->update('proveedor', $saldoProveedor);


//  $this->db->insert('detalleproveedor', $campos);
 
// }

// OBTIENE DETALES DE LOS PROVEEDORES
// public function getDetallesProveedor($cuit){
//   $this->db->select('p.apeynom apeynom, p.cuit cuit, p.localidad localidad, p.direccion direccion, p.telefono telefono, sum(a.total) saldo');
//   $this->db->from('altacompra a');
//    $this->db->join('proveedor p', 'a.cuit = p.cuit');
//   $this->db->where('p.cuit', $cuit);
//   // $this->db->group_by('p.cuit');
//   $r = $this->db->get();

//   return $r->result();
//  }


public function getCtaProveedor($cuit)
{
    // $this->db->select( 'a.fCarga fecha, a.fComprobante fComprobante, a.comprobante comprobante, a.total total,
    //                  a.tipoFactura tipoFactura,a.tipoComprobante tipoComprobante,
    //                   p.apeynom apeynom');
    $this->db->select('mp.*, p.apeynom');
     // $this->db->from('altacompra a');
     $this->db->from('movimientosproveedor mp');
     $this->db->join('proveedor p', 'mp.cuit = p.cuit');
     $this->db->where('mp.cuit', $cuit);
     // $this->db->where('a.formaPago', "Cuenta corriente");
     $this->db->order_by('mp.fechaCarga', 'asc');
     $r = $this->db->get();

     return $r->result();
}


public function getCompraProveedor($cuit)
{
    $this->db->select( 'a.fCarga fCarga, a.fComprobante fComprobante, a.comprobante comprobante, a.total total,
                        a.tipoFactura tipoFactura,a.tipoComprobante tipoComprobante,
                         p.apeynom apeynom');
     $this->db->from('altacompra a');
     $this->db->join('proveedor p', 'a.cuit = p.cuit');
     $this->db->where('a.cuit', $cuit);
     $this->db->order_by('fCarga', 'desc');
     $r = $this->db->get();

     return $r->result();
}



public function getDetallesProveedor($cuit){

     $this->db->select('*');
     $this->db->from('proveedor');
     // $this->db->join('proveedor p', 'a.cuit = p.cuit');
     $this->db->where('cuit', $cuit);
     // $this->db->group_by('cuit');
     $r = $this->db->get();

     return $r->result();
    }



    public function movimientoProveedor($param)
    {

             //SELECCIONA SALDO DEL PROVEEDOR
//   $this->db->select('saldo');
//   $this->db->from('movimientosproveedor');
//   $this->db->order_by('fCarga', 'asc');
//   $this->db->limit(0, 1);
//   $consulta = $this->db->get();
//    foreach ($consulta->result() as $row) {
//  $resultado = $row->saldo;
// }

// $saldo = $resultado + $param['resultado'];

        $campos = array(
            'fechaCarga' => $param['fCarga'],
            'cuit' => $param['proveedor'],
            'comprobante' => $param['numero'],
            'debe' => $param['resultado'],
            'haber' => 0,
            'saldo' => $param['resultado']
      );


 $this->db->insert('movimientosproveedor', $campos);
 return $this->db->affected_rows();  
    }


function listadoProveedores($param){

          $orden = $param['orden'];


        $this->db->select('*');
         $this->db->from('proveedor');
         $this->db->order_by($orden, 'asc');
         $r = $this->db->get();

         return $r->result_array();
}   

public function listadoCuentaCorriente($param)
{   
    $fdesde = $param['dtDesdeCC'];
    $fhasta = $param['dtHastaCC'];
    $tipo_filtro = $param['tipoFiltro'];
    $orden = $param['orden'];
    $saldos =  $param['saldos'];

   
    
    $this->db->select('round(sum(mp.debe), 2) debe, round(sum(mp.haber), 2) haber, p.saldo saldo, p.apeynom nombre');
     $this->db->from('movimientosproveedor mp');
    
    // $this->db->join('proveedor p', 'mp.cuit = p.cuit', 'inner');
     
      //$this->db->join('altacompra a', 'a.cuit = mp.cuit');
    $this->db->join('proveedor p', 'p.cuit = mp.cuit AND mp.fechaCarga >= "'.$fdesde.'" AND mp.fechaCarga <= "'.$fhasta.'" ', 'right');
     if($param['rbProvSaldo'] != 0){
        $this->db->where('p.saldo >',  0);
    }
     $this->db->where('p.saldo >',  0);
   // $this->db->where(''.$tipo_filtro.'<=',  $fhasta);
     $this->db->group_by('p.cuit');
     $this->db->order_by($orden, 'desc');
     $r = $this->db->get();

     return $r->result_array();
}

}



?>