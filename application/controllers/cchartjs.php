<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');


class Cchartjs extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mcompras');
}


public function index(){
    
    $this->load->view('layout/chartjs');
}

public function getGrafico(){

    echo json_encode($this->mcompras->getGrafico());
}
}

