<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mcompras');
}


public function index(){

    
$this->load->library('tcpdf/tcpdf.php');

}




}


?>