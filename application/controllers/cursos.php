<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->helper('form');
$this->load->model('prueba_model');

}

function index(){
$data['segmento'] = $this->uri->segment(3);
$this->load->view('Prueba/headers');

if(!$data['segmento']){
$data['cursos'] = $this->prueba_model->obtenerCurso();

}else{
	$data['cursos'] = $this->prueba_model->obtenerCursos($data['segmento']);
}


$this->load->view('Cursos/cursos', $data);
}
function nuevo(){
	$this->load->view('Prueba/headers');
	$this->load->view('Cursos/formulario');
}

function recibirDatos(){

	$data = array('nombre' => $this->input->post('nombre') ,
                   'edad' => $this->input->post('edad'));

	$this->prueba_model->crearCurso($data);
	$this->load->view('Prueba/headers');
	$this->load->view('Prueba/hola');
}

}
?>