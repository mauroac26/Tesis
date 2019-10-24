<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

function __construct(){

parent::__construct();

}

public function index(){
    $this->load->view('layout/header');
    $this->load->view('Clientes');
    $this->load->view('layout/footer');
}
}