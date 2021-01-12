<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mcompras');
}


public function index(){
    $this->load->view('layout/header');
    $this->load->libraries('fpdf/fpdf');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');
$pdf->Output();
}

}

?>