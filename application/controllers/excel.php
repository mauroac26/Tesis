<?php
defined('BASEPATH') OR exit('No direct script access allowed');





class Excel extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mcompras');
$this->load->model('mproveedores');
$this->load->library('export_excel');

}

public function exportar_excel(){

//post jquery
 // $param['tipoComprobante'] = $this->input->post('selectComp');
 //    $param['tipoFiltro'] = $this->input->post('selectFiltro');
 //    $param['fDesde'] = $this->input->post('fDesde');
 //    $param['fHasta'] = $this->input->post('fHasta');
 //    $param['Orden'] = $this->input->post('selectOrden');
 //    $param['selectF'] = $this->input->post('selectF');

//post php
    $param['tipoComprobante'] = $this->input->post('tipoComprobante');
    $param['tipoFiltro'] = $this->input->post('tipoFiltro');
    $param['fDesde'] = $this->input->post('fDesde');
    $param['fHasta'] = $this->input->post('fHasta');
    $param['Orden'] = $this->input->post('Orden');
    $param['selectF'] = $this->input->post('selectF');


// $fecha_desde = date("d/m/Y", strtotime($param['fDesde']));
// $fecha_hasta = date("d/m/Y", strtotime($param['fHasta']));


 $result = $this->mcompras->libroIvaCompra($param);


$this->export_excel->to_excel($result, "LibroIvaCompras");

 }

//  public function exportar_excel1(){
// $param = $this->input->post('imprimir');
//  	if ($param == 1) {
//  		$result = $this->mcompras->getGrafico(); 	
//  	}else{
//  		$result = $this->mcompras->getCompras();
//  	}
// //  	$result = $this->mcompras->getCompras();

//  $this->export_excel->to_excel($result, "LibroIvaCompras");

//  }

}