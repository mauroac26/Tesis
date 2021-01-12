<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');


class Stock extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mremito');
}


public function index(){
    
    $this->load->view('layout/header');
    $this->load->view('vstock');
    $this->load->view('layout/footerStock');
}

}