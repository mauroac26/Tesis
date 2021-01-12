<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Cordoba');


class Compras extends CI_Controller {

function __construct(){

parent::__construct();
$this->load->model('mcompras');
}


public function index(){
    
        $this->load->view('layout/header');
    $this->load->view('vcompras');
    $this->load->view('layout/footerCompras');
        
}


public function getCompras(){

    echo json_encode($this->mcompras->getCompras());
}

public function getDatosCompras(){
    $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mcompras->getDatosCompras($param));
}

public function addDetalleCompra(){
    $param['idCompra'] = $this->input->post('idCompra');
    $param['cuit'] = $this->input->post('cuit');
    // $param['producto'] = $this->input->post('producto');
    $param['cantidad'] = $this->input->post('cantidad');
    $param['pesounitario'] = $this->input->post('pesounitario');
    // $param['alicuota'] = $this->input->post('alicuota');
    $param['subtotal'] = $this->input->post('subtotal');
    $param['idProducto'] = $this->input->post('idProducto');
    $param['comprobanteFacturar'] = $this->input->post('comprobanteFacturar');
    
    $id = $this->mcompras->addDetalleCompra($param);
   
    echo json_encode($id);
}

public function eliminarDetalleCompra(){
      $idCompra = $this->input->post('numero');

      $r = $this->mcompras->eliminarDetalleCompra($idCompra);

      echo $r;
}

public function registrarCompra(){

        $param['numero'] = $this->input->post('numero');
        $param['pVenta'] = $this->input->post('pVenta');
        $param['proveedor'] = $this->input->post('proveedor');
        $param['fContab'] = date("Y-m-d", strtotime($this->input->post('fContab')));
        $param['fComprobante'] = date("Y-m-d", strtotime($this->input->post('fComprobante')));
        $param['vencimiento'] = date("Y-m-d", strtotime($this->input->post('vencimiento')));
        // $param['fContab'] = $this->input->post('fContab');
        // $param['fComprobante'] = $this->input->post('fComprobante');
        // $param['vencimiento'] = $this->input->post('vencimiento');
        $param['tipoProducto'] = $this->input->post('tipoProducto');
        $param['tipoFactura'] = $this->input->post('tipoFactura');
        $param['tipoComprobante'] = $this->input->post('comprobante');
        $param['fCarga'] = date("Y-m-d H:i:s");
        // $param['fCarga'] = date("Y-m-d H:i:s", strtotime($this->input->post('fCarga')));
        $param['resultado'] = $this->input->post('resultado');
        $param['formaPago'] = $this->input->post('formaPago');
        $param['comprobanteFacturar'] = $this->input->post('comprobanteFacturar');

        $r = $this->mcompras->registrarCompra($param);

        echo $r;
}

public function getNombre(){


    if(isset($_GET['term'])){
        $result =$this->mcompras->getNombre($_GET['term']);
        if(count($result) > 0){
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->apeynom,
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

public function getDatosDetallesCompras(){
     $param['id'] = $this->input->post('id');
    $param['cuit'] = $this->input->post('cuit');
echo json_encode($this->mcompras->getDatosDetallesCompras($param));
}

public function actualizarCompra(){
    $param['eFcontabilizacion'] = date("m/d/Y", strtotime($this->input->post('eFcontabilizacion')));
    $param['eFComprobante'] = date("m/d/Y", strtotime($this->input->post('eFComprobante')));
    $param['eFormaPago'] = $this->input->post('eFormaPago');
     
    $id = $this->input->post('idCompra');

$r = $this->mcompras->actualizarCompra($id, $param);


if($r == 1){
    echo json_encode("La compra se actualizo con exito");
}else{
    echo json_encode("No se pudo actualizar la compra");
}

}

public function eliminarCompra(){
      $idCompra = $this->input->post('idCompra');

      $r = $this->mcompras->eliminarCompra($idCompra);

      if($r == 1){
    echo json_encode("La compra se ha eliminado correctamente");
}else{
    echo json_encode("No se pudo eliminar la compra");
}
}


/*public function getNombreSearch(){

    $nombre = $this->input->post('nombProv');
    
        $result =$this->mcompras->getNombreSearch($nombre);
        
        // if(count($result) > 0){
        //  foreach ($result as $row)
        //      $arr_result[] = array(
        //          'label' => $row->apeynom
        //      );
                
        //      echo json_encode($arr_result);
        // }else{
        //  $arr_result[] = "No se encontro";
        //  echo json_encode($arr_result);
        // }
    
echo json_encode($result);

}*/

public function mostrarProveedor()
{
    $this->load->view('modalDetalleProveedor');

    
}



public function getNombrePendiente(){



      $r = $this->mcompras->getNombrePendiente();

echo json_encode($r);
    
        
}


public function getRemitosPendientes(){
    
    $param['cuit'] = $this->input->post('cuit');

echo json_encode($this->mcompras->getRemitosPendientes($param));
}


public function getDetallesRemitosPendientes(){
    
    $param['cuit'] = $this->input->post('cuit');
    $param['comprobante'] = $this->input->post('comprobante');

echo json_encode($this->mcompras->getDetallesRemitosPendientes($param));
}

}
?>

 