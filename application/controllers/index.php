<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');

class Index extends CI_Controller
{

	function __construct(){

	parent::__construct();
$this->load->model('mcompras');
$this->load->model('mventas');

	}

	public function index()
	{   
		$this->load->view('layout/header');
		$this->load->view('index');
		//$this->load->view('layout/chartjs');
	}

public function getGrafico(){

	echo json_encode($this->mcompras->getGrafico());
}

public function getGraficoCompra(){
   
	echo json_encode($this->mcompras->getGraficoCompra());
}

public function getGraficoPrueba(){
   
	echo json_encode($this->mcompras->getGraficoPrueba());
}

public function getGraficoVentas(){

	echo json_encode($this->mventas->getGraficoVentas());
}


}

?>