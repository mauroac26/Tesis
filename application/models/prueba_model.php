<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba_model extends CI_Model {

function __construct(){

parent::__construct();
$this->load->database();
}

function crearCurso($data){
	$this->db->insert('codigofacilito', array('nombre'=>$data['nombre'], 'edad'=>$data['edad']));
}

function obtenerCurso(){
$query = $this->db->get('codigofacilito');
if($query->num_rows() > 0) return $query;
else return false;

}

function obtenerCursos($id){
$this->db->where('id', $id);
$query = $this->db->get('codigofacilito');
if($query->num_rows() > 0) return $query;
else return false;

}

}
?>