<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {

function __construct(){

parent::__construct();
// $this->load->helper('mihelper');
$this->load->helper('form');
$this->load->model('prueba_model');
}

function index(){
	$this->load->library('menu', array('Inicio', 'contacto', 'curso'));
	$data['mi_menu'] = $this->menu->construirMenu();
	$this->load->view('Prueba/headers');
	$this->load->view('Prueba/hola', $data);
}

function holaMundo(){
	$this->load->view('Prueba/headers');
	$this->load->view('Prueba/hola');
}

function nuevo(){
	$this->load->view('Prueba/headers');
	$this->load->view('Prueba/formulario');
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