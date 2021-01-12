<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproducto extends CI_Model {

function __construct(){

parent::__construct();

}

//OBTIENE NOMBRE DEL PROVEEDOR
public function getProducto($nombre){
        
$this->db->like('nombre', $nombre, 'both');
 $this->db->order_by('id', 'asc');
$this->db->limit(10);

return $this->db->get('producto')->result();
        }


public function datosProducto(){

    $this->db->select('p.*, m.nombre marca, c.categoria categoria');
         $this->db->from('producto p');
         $this->db->join('marcas m', 'm.id=p.marca');
         $this->db->join('categoria c', 'c.id=p.categoria');
         $r = $this->db->get();

         return $r->result();

}

public function getDatosProducto($param){

    $this->db->select( '*');
         $this->db->from('producto');
         $this->db->where('id', $param['id']);
         $r = $this->db->get();

         return $r->result();

}

//REGISTRA LA COMPRA
public function registrarProducto($param){


            $campos = array(

                'marca' => $param['marca'],
                'categoria' => $param['categoria'],
                'nombre' => $param['nombre'],
                'descripcion' => $param['descripcion'],
                'codInt' => $param['codigoInterno'],
                'codBarra' => $param['codigoBarra'],
                'precioCompra' => $param['precioCompra'],
                'alicuota' => $param['iva'],
                'margen'=> $param['margen'],
                'precioVenta'=> $param['precioVenta'],
                'moneda' => $param['moneda'],
                'afectaStock'=> $param['afectaStock'],
                'entregaStock'=> $param['entregaStock'],
                'minimo' => $param['minimo'],
                'critico'=> $param['critico'],
                'precioFinal'=> $param['final'],
                'stock' => 0
            );



 $this->db->insert('producto', $campos);
 return $this->db->affected_rows();  



}


public function registrarMarca($param){


            $campos = array(

                'nombre' => $param['marca'],
                'estado' => 1
            );



 $this->db->insert('marcas', $campos);
 return $this->db->affected_rows();  



}

public function mostrarMarcas(){

         $this->db->select('*');
         $this->db->from('marcas');
         $r = $this->db->get();

         return $r->result();

}

public function modificarEstadoMarca($param){
 
        if( $param["estado"] == 0){
            $estado = 1;
        }else{
            $estado = 0;
        }

            $campos = array(
                'estado' => $estado
            );


 
 $this->db->where('id', $param['id']);
 $this->db->update('marcas', $campos);
return $this->db->affected_rows();  





}


public function registrarCategoria($param){


            $campos = array(

                'categoria' => $param['categoria'],
                'estado' => 1
            );



 $this->db->insert('categoria', $campos);
 return $this->db->affected_rows();  



}

public function mostrarCategoria(){

         $this->db->select('*');
         $this->db->from('categoria');
         $r = $this->db->get();

         return $r->result();

}

public function modificarEstadoCategoria($param){
 
        if( $param["estado"] == 0){
            $estado = 1;
        }else{
            $estado = 0;
        }

            $campos = array(
                'estado' => $estado
            );


 
 $this->db->where('id', $param['id']);
 $this->db->update('categoria', $campos);
return $this->db->affected_rows();  





}


public function cargarComboMarcas(){

         $this->db->select('id, nombre');
         $this->db->from('marcas');
         $this->db->where('estado', 1);
         $r = $this->db->get();

         return $r->result();

}


public function cargarComboCategoria(){

         $this->db->select('id, categoria');
         $this->db->from('categoria');
         $this->db->where('estado', 1);
         $r = $this->db->get();

         return $r->result();

}

}