<?php


class Mlogin extends CI_Model {

	public function ingresarUsuarios($usu, $pass){

		$this->db->select('l.idUsuario, u.nombre nom, u.apellido ape, u.foto foto, l.rol rol, u.email email');
		$this->db->from('login l');
		$this->db->join('usuarios u', 'u.idUsuario = l.idUsuario');
		$this->db->where('l.usuario',$usu);
		$this->db->where('l.pass',$pass);
		
		$resultado = $this->db->get();

		if($resultado->num_rows() == 1){
			$r = $resultado->row();

			$s_usuario = array(
			   's_idUsuario' => $r->idUsuario,
			   's_usuario' => $r->nom." ".$r->ape,
			   's_email' => $r->email,
			   's_foto' => $r->foto,
			   'rol' => $r->rol
			   //'active' => true
			   
			);

			$this->session->set_userdata($s_usuario);

			return true;
		}else{
			return false;
		}
		

		
	}

   

}

?>