<?php


class Clogin extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->library('session');
$this->load->model('mlogin');

}

public function index(){
    
    $this->load->view('login');
    
}

public function ingresarUsuario(){
    $usuario = $this->input->post('txtUsuario');
    $pass = $this->input->post('txtClave');



    $res = $this->mlogin->ingresarUsuarios($usuario, $pass);

    
    echo $res;
}

public function logout(){

    $this->session->unset_userdata('s_idUsuario');
    return redirect('clogin');
   } 
}

?>