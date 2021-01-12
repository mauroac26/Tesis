<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');


class Producto extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mproducto');
}


public function index(){
    
    $this->load->view('layout/header');
    $this->load->view('vproducto');
    $this->load->view('layout/footerProducto');
}


public function getProducto(){
    // $result =$this->mproducto->getProducto($_GET['term']);
  

    if(isset($_GET['term'])){
        $result =$this->mproducto->getProducto($_GET['term']);
        if(count($result) > 0){
                    
            foreach ($result as $row){
                
                if($row->stock > $row->minimo){
      $color = "badge-success";
    }elseif($row->stock <= $row->minimo && $row->stock > $row->critico){
    $color = "badge-warning";
    }elseif($row->stock <= $row->critico){
    $color = "badge-danger";
    }

                $arr_result[] = array(
                    'label' => '<li class="list-group-item d-flex justify-content-between align-items-center"><div class="col-sm-4">'.$row->nombre.'</div><span class="badge '.$color.' badge-pill text-white">'.$row->stock.'</span><span class="float-right">$'.$row->precioVenta.'</span></li>',
                    //'label' => $row->nombre,
                    'value' => $row->nombre,
                    'id' => $row->id,
                    'alicuota' => $row->alicuota,
                    'stock' => $row->stock,
                    'precioVenta' => $row->precioVenta
                    //'color' => $color
                    
                );
                }
                echo json_encode($arr_result);

        }else{
        
            $arr_result[] = array(
                    'label' => '<li class="list-group-item d-flex justify-content-between align-items-center">Dar alta producto >></li>',
                    'value' => "Dar alta producto >>",
                    'n' => 1);
             echo json_encode($arr_result);

             
            
        }
    

}
}

public function datosProducto(){

    echo json_encode($this->mproducto->datosProducto());
}

public function getDatosProducto(){
    $param['id'] = $this->input->post('id');
    
echo json_encode($this->mproducto->getDatosProducto($param));
}



public function registrarProducto(){

        $param['marca'] = $this->input->post('marca');
        $param['categoria'] = $this->input->post('categoria');
        $param['nombre'] = $this->input->post('nombre');
        $param['descripcion'] = $this->input->post('descripcion');
        $param['codigoInterno'] = $this->input->post('codigoInterno');
        $param['codigoBarra'] = $this->input->post('codigoBarra');
        $param['precioCompra'] = $this->input->post('precioCompra');
        $param['iva'] = $this->input->post('iva');
        $param['margen'] = $this->input->post('margen');
        $param['precioVenta'] = $this->input->post('precioVenta');
        $param['moneda'] = $this->input->post('moneda');
        $param['afectaStock'] = $this->input->post('afectaStock');
        $param['entregaStock'] = $this->input->post('entregaStock');
        $param['minimo'] = $this->input->post('minimo');
        $param['critico'] = $this->input->post('critico');
        $param['final'] = $this->input->post('final');

        $r = $this->mproducto->registrarProducto($param);

        echo $r;

}

public function registrarMarca(){

        $param['marca'] = $this->input->post('marca');

        $r = $this->mproducto->registrarMarca($param);

        echo $r;

}

public function mostrarMarcas(){

    echo json_encode($this->mproducto->mostrarMarcas());
}

public function modificarEstadoMarca(){

        $param['id'] = $this->input->post('id');
        $param['estado'] = $this->input->post('estado');

        $r = $this->mproducto->modificarEstadoMarca($param);

        echo $r;

}


public function registrarCategoria(){

        $param['categoria'] = $this->input->post('categoria');

        $r = $this->mproducto->registrarCategoria($param);

        echo $r;

}

public function mostrarCategoria(){

    echo json_encode($this->mproducto->mostrarCategoria());
}

public function modificarEstadoCategoria(){

        $param['id'] = $this->input->post('id');
        $param['estado'] = $this->input->post('estado');

        $r = $this->mproducto->modificarEstadoCategoria($param);

        echo $r;

}


public function cargarComboMarcas(){

    echo json_encode($this->mproducto->cargarComboMarcas());
}

public function cargarComboCategoria(){

    echo json_encode($this->mproducto->cargarComboCategoria());
}

}
