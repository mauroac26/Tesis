<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');


class Caja extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mcaja');
}


public function index(){
    
    $this->load->view('layout/header');
    $this->load->view('vcaja');
    $this->load->view('layout/footerCaja');
}


public function getCtaProveedor()
{
     $cuit = $this->input->post('cuit');
echo json_encode($this->mcaja->getCtaProveedor($cuit));
}


public function registrarOrdenPago(){

        $param['numero'] = $this->input->post('numero');
        $param['pVenta'] = $this->input->post('pVenta');
        $param['proveedor'] = $this->input->post('proveedor');
        $param['saldo'] = $this->input->post('saldo');
        $param['fCarga'] = date("Y-m-d H:i:s");

        $r = $this->mcaja->registrarOrdenPago($param);

        echo $r;
}

public function getCaja(){

    echo json_encode($this->mcaja->getCaja());
}

public function modificarCondicion()
{
    $param['comprobante'] = $this->input->post('comprobante');
    $param['cuit'] = $this->input->post('cuit');

    $this->mcaja->modificarCondicion($param);
}

public function getDatosPago(){
    $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mcaja->getDatosPago($param));
}


}

