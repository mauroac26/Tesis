<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mproveedores');
}


public function index(){
    //if($this->session->userdata('rol') == 1){
    $this->load->view('layout/header');
    $this->load->view('vproveedores');
    $this->load->view('layout/footerProveedores');
//}else{
   // header('location: compras');
//}
}

public function getProveedores(){

    echo json_encode($this->mproveedores->getProveedores());
}


public function registrarProveedor(){

        $param['cuit'] = $this->input->post('cuit');
        $param['nombre'] = $this->input->post('nombre');
        $param['direccion'] = $this->input->post('direccion');
        $param['localidad'] = $this->input->post('localidad');
        $param['telefono'] = $this->input->post('telefono');
        

        $r = $this->mproveedores->registrarProveedor($param);

        echo $r;
}

// public function registrarDetalleProveedor(){
//  $param['numero'] = $this->input->post('numero');
//  $param['proveedor'] = $this->input->post('proveedor');
//  $param['fComprobante'] = $this->input->post('fComprobante');
//  $param['resultado'] = $this->input->post('resultado');
    
// $r = $this->mproveedores->registrarDetalleProveedor($param);

//    echo $r;
    

// }

public function getDetallesProveedor(){
     $id = $this->input->post('cuit');
echo json_encode($this->mproveedores->getDetallesProveedor($id));
}

public function getCtaProveedor()
{
     $cuit = $this->input->post('cuit');
echo json_encode($this->mproveedores->getCtaProveedor($cuit));
}

public function getCompraProveedor()
{
    $cuit = $this->input->post('cuit');
    echo json_encode($this->mproveedores->getCompraProveedor($cuit));
}

public function movimientoProveedor()
{
        $param['proveedor'] = $this->input->post('proveedor');
        $param['numero'] = $this->input->post('numero');
        // $param['comprobante'] = $this->input->post('comprobante');
        // $param['pVenta'] = $this->input->post('pVenta');
        // $param['tipoFactura'] = $this->input->post('tipoFactura');
        $param['resultado'] = $this->input->post('resultado');
        $param['fCarga'] = date("Y-m-d H:i:s");

    $r = $this->mproveedores->movimientoProveedor($param);

    echo $r;
}
}
?>