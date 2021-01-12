<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');


class Remito extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mremito');
}


public function registrarRemito(){

$param['numero'] = $this->input->post('numero');
$param['pVenta'] = $this->input->post('pVenta');
$param['proveedor'] = $this->input->post('proveedor');
$param['fecha'] = date("Y-m-d", strtotime($this->input->post('fecha')));
$param['fechaRemito'] = date("Y-m-d", strtotime($this->input->post('fechaRemito')));
$param['comprobante'] = $this->input->post('comprobante');
$param['tipoRemito'] = $this->input->post('tipoRemito');
$param['cantidad'] = $this->input->post('cantidad');
$param['obsRemito'] = $this->input->post('obsRemito');
$param['pfRemito'] = $this->input->post('pfRemito');


$r = $this->mremito->registrarRemito($param);

echo $r;
}

public function detalleRemito(){
    $param['idRemito'] = $this->input->post('idRemito');
    $param['cuit'] = $this->input->post('cuit');
    $param['idProducto'] = $this->input->post('idProducto');
    $param['cantidad'] = $this->input->post('cantidad');

    $id = $this->mremito->detalleRemito($param);
   
    echo json_encode($id);
}

public function getRemito(){

    echo json_encode($this->mremito->getRemito());
}

public function getDatosRemito(){
    $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mremito->getDatosRemito($param));
}

public function getCompraRemito(){
    $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mremito->getCompraRemito($param));
}

public function getDatosDetallesRemito(){
     $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mremito->getDatosDetallesRemito($param));
}


public function registrarRemitoVenta(){

$param['numero'] = $this->input->post('numero');
$param['pVenta'] = $this->input->post('pVenta');
$param['proveedor'] = $this->input->post('proveedor');
$param['fecha'] = date("Y-m-d", strtotime($this->input->post('fecha')));
$param['fechaRemito'] = date("Y-m-d", strtotime($this->input->post('fechaRemito')));
$param['comprobante'] = $this->input->post('comprobante');
$param['tipoRemito'] = $this->input->post('tipoRemito');
$param['cantidad'] = $this->input->post('cantidad');
$param['obsRemito'] = $this->input->post('obsRemito');
$param['pfRemito'] = $this->input->post('pfRemito');


$r = $this->mremito->registrarRemitoVenta($param);

echo $r;
}

public function detalleRemitoVenta(){
    $param['idRemito'] = $this->input->post('idRemito');
    $param['cuit'] = $this->input->post('cuit');
    $param['idProducto'] = $this->input->post('idProducto');
    $param['cantidad'] = $this->input->post('cantidad');

    $id = $this->mremito->detalleRemitoVenta($param);
   
    echo json_encode($id);
}


public function getDatosDetallesRemitoVenta(){
     $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mremito->getDatosDetallesRemitoVenta($param));
}

}
?>