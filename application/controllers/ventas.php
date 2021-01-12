<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');


class Ventas extends CI_Controller
{

	function __construct(){

   parent::__construct();
  $this->load->model('mventas');
}

	public function index()
	{
		
		 $this->load->view('layout/header');
    $this->load->view('vventas');
    $this->load->view('layout/footerVentas');
	}

  public function getVentas(){

    echo json_encode($this->mventas->getVentas());
}

public function getDatosVentas(){
    $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mventas->getDatosVentas($param));
}

public function getDatosDetallesVentas(){
     $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mventas->getDatosDetallesVentas($param));
}

public function registrarVenta(){

       $param['numero'] = $this->input->post('numero');
       $param['pVenta'] = $this->input->post('pVenta');
       $param['cliente'] = $this->input->post('cliente');
        //$param['fecha'] = date("Y-m-d", strtotime($this->input->post('fecha')));
        $param['fecha'] = date("Y-m-d H:i:s");
        //$param['fecha'] = date("Y-m-d H:i:s", strtotime($this->input->post('fecha')));
        $param['resultado'] = $this->input->post('resultado');
        $param['formaPago'] = $this->input->post('formaPago');
        $param['comprobanteFacturar'] = $this->input->post('comprobanteFacturar');

        $r = $this->mventas->registrarVenta($param);

        echo $r;
}

public function addDetalleVenta(){
    $param['idVenta'] = $this->input->post('idVenta');
   // $param['cuit'] = $this->input->post('cuit');
    
    $param['cantidad'] = $this->input->post('cantidad');
    $param['pesounitario'] = $this->input->post('pesounitario');
    // $param['alicuota'] = $this->input->post('alicuota');
    $param['subtotal'] = $this->input->post('subtotal');
    $param['idProducto'] = $this->input->post('idProducto');
    //$param['comprobanteFacturar'] = $this->input->post('comprobanteFacturar');
    
    $id = $this->mventas->addDetalleVenta($param);
   
    echo $id;
}


public function getNombre(){


    if(isset($_GET['term'])){
        $result =$this->mventas->getNombre($_GET['term']);
        if(count($result) > 0){
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->nombre,
                    'cuit' => $row->cuit
                );
                
                echo json_encode($arr_result);
        }else{
        
            $arr_result[] = array(
                    'label' => "Dar alta proveedor >>",
                    'n' => 1);
             echo json_encode($arr_result);

             
            
        }
    

}
}


public function getNombrePendiente(){



      $r = $this->mventas->getNombrePendiente();

echo json_encode($r);
    
        
}



public function getRemitosPendientes(){
    
    $param['cuit'] = $this->input->post('cuit');

echo json_encode($this->mventas->getRemitosPendientes($param));
}

}

?>
