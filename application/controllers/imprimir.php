<?php
defined('BASEPATH') OR exit('No direct script access allowed');





class Imprimir extends CI_Controller {

function __construct(){
require_once('application/libraries/vendor/autoload.php');
parent::__construct();
$this->load->model('mcompras');
$this->load->model('mproveedores');
$this->load->library('export_excel');

}



public function impIvaCompra(){



    $param['tipoComprobante'] = $this->input->post('selectComp');
    $param['tipoFiltro'] = $this->input->post('selectFiltro');
    $param['fDesde'] = $this->input->post('fDesde');
    $param['fHasta'] = $this->input->post('fHasta');
    $param['Orden'] = $this->input->post('selectOrden');
    $param['selectF'] = $this->input->post('selectF');

    $var = $this->input->post('imprimir');

$fecha_desde = date("d/m/Y", strtotime($param['fDesde']));
$fecha_hasta = date("d/m/Y", strtotime($param['fHasta']));

$id = $this->mcompras->libroIvaCompra($param);

if ($var == 2) {
    

 
    
    $reporte="";
    $iva = "";
    $nGrav = "";
    $grav = "";
    $excento = "";
    $fecha = '';
    $totIva=0;
    $totnGrav=0;
    $totGrav = 0;
    $totExcento="0.00";
    $total = 0;
    $date = date("d/m/y H:i ");
    $header = "";


// $header = "<div><h3>Libro I.V.A Compras :: del ".$fecha_desde." al " .$fecha_hasta."  </h3></div></br>";

    $reporte .= "<table>
                    
                    <tr>
                     <th style='text-align: left;'>Fecha</th>
                     <th>Comprobante</th>
                     <th>Cuit</th>
                     <th>Proveedor</th>
                     <th>I.V.A</th>
                     <th>Excento</th>
                     <th>No gravado</th>
                     <th>Gravado</th>
                     <th>Total</th>
                    </tr>
                    
                    ";
foreach ($id as $row) {

                if ($row['alicuota'] != "No Gravado" and $row['alicuota'] != "Excento" ){
                      $iva = $row['total'];
                      $grav = $row['total'];
                      $totIva = $row['total'] + $totIva;
                      $totGrav = $row['total'] + $totGrav;

                }else{
                    $iva = "0,00";
                    $grav = "0,00";
                }

                if ($row['alicuota'] == "No Gravado"){
                      $nGrav = $row['total'];
                      $totnGrav = $row['total'] + $totnGrav;

                }else{
                    $nGrav = "0,00";
                }

                if ($row['alicuota'] == "Excento"){
                      $excento = $row['total'];
                      $totExcento = $row['total'] + (FLOAT)$totExcento;

                }else{
                    $excento = "0,00";
                }
                
                $comprobante = str_pad($row['comprobante'], 8, "0", STR_PAD_LEFT);
                $fecha = date("d/m/Y", strtotime($row['fecha']));
                $reporte .=
                 "<tr>
                <td>".$fecha."</td>
                <td>".$row['tipoComprobante']." ".$row['tipoFactura']." ".$comprobante."</td>
                <td>".$row['cuit']."</td>
                <td>".$row['apeynom']."</td>
                <td>".$iva."</td>
                <td>".$excento."</td>
                <td>".$nGrav."</td>
                <td>".$grav."</td>
                <td>".$row['total']."</td>
                </tr>";

            
                $total = $row['total'] + $total;
               
}




    $reporte .= "</table>";



    $reporte .= "<div id='contenedor'>
<div id='total'>Totales</div>
<div id='iva'>".$totIva."</div>
<div id='excento'>".$totExcento."</div>
<div id='nograv'>".$totnGrav."</div>
<div id='gravado'>".$totGrav."</div>
<div id='totales'>".$total."</div>
</div> ";

$x = "";
$y = "";
$formato = $this->input->post('formato');

if($formato == "a4"){
    $x = 210;
    $y = 297;

}else if($formato == "carta"){
    $x = 216;
    $y = 279;
}else{
    $x = 216;
    $y = 356;
}

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [$x, $y],
    
]);

$stylesheet = file_get_contents('assets/estiloPDF.css');
// $mpdf->SetHeader("$header||$date");
$mpdf->setFooter('{PAGENO}');
$mpdf->SetHeader("<div style='text-align: left; font-weight: bold; font-size: 11px;'>Libro I.V.A Compras :: del ".$fecha_desde." al " .$fecha_hasta."</div>||$date");
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($reporte);





// You could also do this using
// $mpdf->AddPage('','','','','on');



$mpdf->Output();


}else{
   // $result = $this->mcompras->libroIvaCompra($param);


$this->export_excel->to_excel($id, "LibroIvaCompras");
}
//  $id = $this->mcompras->libroIvaCompra($param);

 
    
//     $reporte="";
//     $iva = "";
//     $nGrav = "";
//     $grav = "";
//     $excento = "";
//     $fecha = '';
//     $totIva=0;
//     $totnGrav=0;
//     $totGrav = 0;
//     $totExcento="0.00";
//     $total = 0;
//     $date = date("d/m/y H:i ");
//     $header = "";


// // $header = "<div><h3>Libro I.V.A Compras :: del ".$fecha_desde." al " .$fecha_hasta."  </h3></div></br>";

//     $reporte .= "<table>
                    
//                     <tr>
//                      <th style='text-align: left;'>Fecha</th>
//                      <th>Comprobante</th>
//                      <th>Cuit</th>
//                      <th>Proveedor</th>
//                      <th>I.V.A</th>
//                      <th>Excento</th>
//                      <th>No gravado</th>
//                      <th>Gravado</th>
//                      <th>Total</th>
//                     </tr>
                    
//                     ";
// foreach ($id as $row) {

//                 if ($row['alicuota'] != "No Gravado" and $row['alicuota'] != "Excento" ){
//                       $iva = $row['total'];
//                       $grav = $row['total'];
//                       $totIva = $row['total'] + $totIva;
//                       $totGrav = $row['total'] + $totGrav;

//                 }else{
//                     $iva = "0,00";
//                     $grav = "0,00";
//                 }

//                 if ($row['alicuota'] == "No Gravado"){
//                       $nGrav = $row['total'];
//                       $totnGrav = $row['total'] + $totnGrav;

//                 }else{
//                     $nGrav = "0,00";
//                 }

//                 if ($row['alicuota'] == "Excento"){
//                       $excento = $row['total'];
//                       $totExcento = $row['total'] + (FLOAT)$totExcento;

//                 }else{
//                     $excento = "0,00";
//                 }
                
//                 $comprobante = str_pad($row['comprobante'], 8, "0", STR_PAD_LEFT);
//                 $fecha = date("d/m/Y", strtotime($row['fecha']));
//                 $reporte .=
//                  "<tr>
//                 <td>".$fecha."</td>
//                 <td>".$row['tipoComprobante']." ".$row['tipoFactura']." ".$comprobante."</td>
//                 <td>".$row['cuit']."</td>
//                 <td>".$row['apeynom']."</td>
//                 <td>".$iva."</td>
//                 <td>".$excento."</td>
//                 <td>".$nGrav."</td>
//                 <td>".$grav."</td>
//                 <td>".$row['total']."</td>
//                 </tr>";

            
//                 $total = $row['total'] + $total;
               
// }




//     $reporte .= "</table>";



//     $reporte .= "<div id='contenedor'>
// <div id='total'>Totales</div>
// <div id='iva'>".$totIva."</div>
// <div id='excento'>".$totExcento."</div>
// <div id='nograv'>".$totnGrav."</div>
// <div id='gravado'>".$totGrav."</div>
// <div id='totales'>".$total."</div>
// </div> ";

// $x = "";
// $y = "";
// $formato = $this->input->post('formato');

// if($formato == "a4"){
//     $x = 210;
//     $y = 297;

// }else if($formato == "carta"){
//     $x = 216;
//     $y = 279;
// }else{
//     $x = 216;
//     $y = 356;
// }

// $mpdf = new \Mpdf\Mpdf([
//     'mode' => 'utf-8',
//     'format' => [$x, $y],
    
// ]);

// $stylesheet = file_get_contents('assets/estiloPDF.css');
// // $mpdf->SetHeader("$header||$date");
// $mpdf->setFooter('{PAGENO}');
// $mpdf->SetHeader("<div style='text-align: left; font-weight: bold; font-size: 11px;'>Libro I.V.A Compras :: del ".$fecha_desde." al " .$fecha_hasta."</div>||$date");
// $mpdf->WriteHTML($stylesheet, 1);
// $mpdf->WriteHTML($reporte);





// // You could also do this using
// // $mpdf->AddPage('','','','','on');



// $mpdf->Output();


}


public function imprimirVencimiento(){


  
    $param['fechaHastaVen'] = $this->input->post('fechaHastaVen');
   // $param['formato'] = $this->input->post('formato');
    $param['orden'] = $this->input->post('selectOrden');



$fecha_hasta = date("d/m/Y", strtotime($param['fechaHastaVen']));


 $id = $this->mcompras->vencimientoProveedores($param);
    
    $reporte="";
    $fecha = '';
    $total = 0;
    $date = date("d/m/y H:i ");
    $date1= date("Y-m-d");
    $header = "";


// $header = "<div><h3>Libro I.V.A Compras :: del ".$fecha_desde." al " .$fecha_hasta."  </h3></div></br>";

    $reporte .= "<table>
                    
                    <tr>
                     <th style='width: 150px;'>Proveedor</th>
                     <th style='width: 150px;'>Comprobante</th>
                     <th style='width: 150px;'>Vencimiento</th>
                     <th style='width: 150px;'>Monto Comp.</th>
                     <th style='width: 120px;'>Saldo a Pagar</th>
                    </tr>
                    
                    ";
foreach ($id as $row) {

                $comprobante = str_pad($row['comprobante'], 8, "0", STR_PAD_LEFT);
                $fecha = date("d/m/Y", strtotime($row['vencimiento']));
                $resta = (strtotime($date1) - strtotime($row['vencimiento']) )  / 86400;

                //$diferencia = $row['vencimiento']->diff($$date1);
                $reporte .=
                 "<tr>
                 <td style='text-align: left;'>".$row['apeynom']."</td>
                 <td style='text-align: left;'>".$row['tipoComprobante']." ".$row['tipoFactura']." ".$comprobante."</td>
                 <td style='text-align: left;'>".$fecha." (hace ".$resta." dias)</td>
                <td style='text-align: right;'>$".$row['total']."</td>
                <td style='text-align: right;'>$".$row['total']."</td>
                </tr>";

            
                $total = $row['total'] + $total;
               
}




    $reporte .= "</table>";



    $reporte .= "<div id='contenedor' style='float: right; padding-top: 2px;'>
<p  style='font-size: 10px;'>Saldo a Pagar en pesos $".$total."</p>

</div> ";

$x = "";
$y = "";
$formato = $this->input->post('formato');

if($formato == "a4"){
    $x = 210;
    $y = 297;

}else if($formato == "carta"){
    $x = 216;
    $y = 279;
}else{
    $x = 216;
    $y = 356;
}

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [$x, $y],
    
]);

$stylesheet = file_get_contents('assets/estiloPDF.css');
// $mpdf->SetHeader("$header||$date");
$mpdf->setFooter('{PAGENO}');
$mpdf->SetHeader("<div style='text-align: left; font-weight: bold; font-size: 11px;'>Lista de vencimientos de proveedores al " .$fecha_hasta."</div>||$date");
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($reporte);





// You could also do this using
// $mpdf->AddPage('','','','','on');



$mpdf->Output();


}

public function listadoProveedores(){



  
   
    $param['orden'] = $this->input->post('selectOrden');



 $id = $this->mproveedores->listadoProveedores($param);
    
    $reporte="";
    $header = "";


// $header = "<div><h3>Libro I.V.A Compras :: del ".$fecha_desde." al " .$fecha_hasta."  </h3></div></br>";

    $reporte .= "<table>
                    
                    <tr>
                     <th style='width: 150px;'>Proveedor</th>
                     <th style='width: 150px;'>C.U.I.T</th>
                     <th style='width: 150px;'>Domicilio</th>
                     <th style='width: 100px;'>Localidad</th>
                     <th style='width: 120px;'>Telefono</th>
                    </tr>
                    
                    ";
foreach ($id as $row) {

               
              
                

                
                $reporte .=
                 "<tr>
                 <td style='text-align: left;'>".$row['apeynom']."</td>
                 <td style='text-align: left;'>".$row['cuit']."</td>
                 <td style='text-align: left;'>".$row['domicilio']."</td>
                <td style='text-align: left;'>".$row['localidad']."</td>
                <td style='text-align: left;'>".$row['telefono']."</td>
                </tr>";

            
                
               
}




    $reporte .= "</table>";



$x = "";
$y = "";
$formato = $this->input->post('formato');

if($formato == "a4"){
    $x = 210;
    $y = 297;

}else if($formato == "carta"){
    $x = 216;
    $y = 279;
}else{
    $x = 216;
    $y = 356;
}

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [$x, $y],
    
]);

$stylesheet = file_get_contents('assets/estiloPDF.css');
// $mpdf->SetHeader("$header||$date");
$mpdf->setFooter('{PAGENO}');
$mpdf->SetHeader("<div style='text-align: left; font-weight: bold; font-size: 11px;'>Lista de proveedores </div>||Cedal");
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($reporte);





// You could also do this using
// $mpdf->AddPage('','','','','on');



$mpdf->Output();


}


public function listadoCCProv(){



   $param['tipoFiltro'] = $this->input->post('selectFecha');
    $param['dtDesdeCC'] = $this->input->post('dtDesdeCC');
    $param['dtHastaCC'] = $this->input->post('dtHastaCC');
    $param['orden'] = $this->input->post('selectOrden');
    $param['rbProvSaldo'] = $this->input->post('rbProvSaldo');
     $param['saldos'] = $this->input->post('saldos');



$id = $this->mproveedores->listadoCuentaCorriente($param);

    $fecha_desde = date("d/m/Y", strtotime($param['dtDesdeCC']));
    $fecha_hasta = date("d/m/Y", strtotime($param['dtHastaCC']));

 
  
    $reporte="";
    $header = "";
$date = date("d/m/y H:i ");

// $header = "<div><h3>Libro I.V.A Compras :: del ".$fecha_desde." al " .$fecha_hasta."  </h3></div></br>";

    $reporte .= "<table>
                    
                    <tr>
                     <th style='width: 150px;'>Proveedor</th>
                     <th style='width: 150px;'>Anterior</th>
                     <th style='width: 150px;'>Compras</th>
                     <th style='width: 100px;'>Pagos</th>
                     <th style='width: 120px;'>Saldos</th>
                    </tr>
                    
                    ";
foreach ($id as $row) {

               
              
                
                if($row['debe'] == null){
                  $debe = "0.00";

                }else{
                  $debe = $row['debe'];
                }

                if($row['haber'] == null){
                  $haber = "0.00";

                }else{
                  $haber = $row['haber'];
                }
                
                $reporte .=
                 "<tr>
                 <td style='text-align: left;'>".$row['nombre']."</td>
                 <td style='text-align: right;'>".$row['saldo']."</td>
                 <td style='text-align: right;'>".$debe."</td>
                <td style='text-align: right;'>".$haber."</td>
                <td style='text-align: right;'>".$row['saldo']."</td>
                </tr>";

            
                
               
}




    $reporte .= "</table>";



$x = "";
$y = "";
$formato = $this->input->post('formato');

if($formato == "a4"){
    $x = 210;
    $y = 297;

}else if($formato == "carta"){
    $x = 216;
    $y = 279;
}else{
    $x = 216;
    $y = 356;
}

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [$x, $y],
    
]);

$stylesheet = file_get_contents('assets/estiloPDF.css');
// $mpdf->SetHeader("$header||$date");
$mpdf->setFooter('{PAGENO}');
$mpdf->SetHeader("<div style='text-align: left; font-weight: bold; font-size: 11px;'>Resumen de Cuenta Corriente de proveedores :: del ".$fecha_desde." al " .$fecha_hasta." </div>||$date");
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($reporte);





// You could also do this using
// $mpdf->AddPage('','','','','on');



$mpdf->Output();


}



}

?>