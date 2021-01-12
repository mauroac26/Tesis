<?php 
if(empty($this->session->userdata('s_usuario'))){
    header('location: ./');

    }

  //   if(isset($_COOKIE[session_name()])) { 
  //   $this->input->set_cookie(session_name(), '', time() - 42000, '/'); 
  //   $this->session->sess_destroy('s_idUsuario');
    
  // } 
  
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="assets/Estilo.css" rel="stylesheet" type="text/css" /> -->
         <!-- <link href="assets/tabla.css" rel="stylesheet" type="text/css" /> -->
        <!--  <link href="assets/ventanaModal.css" rel="stylesheet" type="text/css" /> -->

        <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/> -->
     <link rel="stylesheet" href="/resources/demos/style.css"/> 

     
<!--     <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

<!-- <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>

<script rel="stylesheet" src="js/jquery-ui.css"></script>
<script rel="stylesheet" src="js/jquery-ui.min.css"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script> -->
<!-- <script type="text/javascript" src="js/jquery.js"></script>-->
 <!-- <script type="text/javascript" src="js/jquery-ui.min.js"></script>  -->

<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">







<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
 

<style type="text/css">

.my-custom-scrollbar {
position: relative;
height: 160px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
    

i{
     
     padding: 5px;
}

label {
        font-size: 12px;
}


}



body { padding-bottom: 70px; }



.ui-autocomplete.ui-widget {
    font-size: 14px;
    
}

.ui-autocomplete{
    z-index: 9999 !important;
}

.tableSecundaria{
    font-size: 0.8em;
}

.tableSecundaria th{
    font-size: 1em;
}

/*#modalAltaProducto .modal-lg {
    max-width: 50% !important;
}*/
</style>


</head>
<body>




<!-- <header> -->
                
             <!-- / #logo-header -->
 <div class="wrapper"> <!-- fixed-top -->

    <header class="main-header">

                <nav class="navbar navbar-expand-md navbar-light navbar-static-top bg-light" >
                        <a class="navbar-brand" href="index"><img src="assets/cedal.png" width="50" height="50" class="d-inline-block" alt="">

    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#tercerNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="tercerNavbar">
                        <ul  class="nav navbar-nav navbar-right  text-decoration" >
                        <li class="nav-item"><a class="nav-link" href="Clientes">Clientes</a></li>
                            <li class="nav-item"> <a class="nav-link" href="Proveedores">Proovedores</a></li>
                            <li class="nav-item"> <a class="nav-link" href="Ventas">Ventas</a></li>
                            <li class="nav-item"> <a class="nav-link" href="Compras">Compras</a></li>
                            <li class="nav-item"> <a class="nav-link" href="Caja">Caja</a></li>
                                <!-- <li><a href="#">Banco</a></li> -->
                            <li class="nav-item"> <a class="nav-link" href="Producto">Productos</a></li>
                            <li class="nav-item"> <a class="nav-link" href="Stock">Stock</a></li>
                            <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-cog fa-lg fa-fw"></i></a></li>

                        </ul>
                    </div>
                <!-- / nav -->
 



                 <div class="dropdown">
                        <a href="#" class="dropdown-toggle badge badge-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="assets/<?php echo $this->session->userdata('s_foto');?>" class="rounded-circle" width="50" height="50" alt="User Image">
                            <span class="hidden-xs"><?php echo $this->session->userdata('s_usuario');?></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right bg-light" style="width: 220px; ">

                  
                            <!-- User image -->
                            <li>
                                <img src="assets/<?php echo $this->session->userdata('s_foto');?>"  class="rounded-circle mx-auto d-block border border-dark" width="100" height="100" alt="User Image">

                                <p class="text-center">
                                    <?php echo $this->session->userdata('s_usuario');?>
                                </p>


                            </li>
                            
                            <!-- Menu Footer-->
                            
                            
                             <div class="dropdown-divider"></div>
                                <li >
                                    <a href="#modalPerfil" data-toggle="modal" class="btn btn-primary btn-sm pull-left ml-1">Perfil</a>
                                
                                    <a href="clogin/logout" class="btn btn-primary btn-sm pull-right mr-1">Cerrar sesión</a>
                                </li> 

                        </ul>
                    
</div>

    </nav>
    </header>
    </div>

<!-- MODAL DETALLE PROVEEDOR -->
<div class="modal" id="modalpro">
    

</div>

<!-- MODAL DETALLE COMPRA -->
<div class="modal" id="modalCompra">
    

</div>

<!-- MODAL PROVEEDOR -->
<div class="modal" id="modalAltaProveedor">
    

</div>

<!-- MODAL Detalle Remito -->
<div class="modal" id="modalDRemito">
    

</div>

<!-- MODAL DETALLE PAGO -->
<div class="modal" id="modalDetallePago">
    

</div>

<!-- MODAL PRODUCTO -->
<div class="modal" id="modalAltaProducto">
    

</div>

<!-- MODAL DETALLE PRODUCTO -->
<div class="modal" id="modalProducto">
    

</div>

<!-- MODAL DETALLE COMPRA -->
<div class="modal" id="modalDetalleVenta">
    

</div>

<!-- ejemplo cerrar modal -->
<div class="modal"  id="cerrarModal">
   <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title text-primary">Advertencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body text-white">Si cierra esta ventana perderá todos los cambios que haya hecho en ella. Está seguro? </div>
      <div class="modal-footer float-left">
        <button id="delete" class="btn btn-primary btn-sm text-white">SI</button>
        <button type="button" class="btn btn-secondary btn-sm text-white" data-dismiss="modal">NO</button>
         </div>
    </div>
  </div>
</div>

<!-- Modal perfil usuarios -->
<div class="modal" id="modalPerfil">
        
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Editar Perfil</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                
                <div class="modal-body">
                    
                    <form action="" method="post">
                    <div class="form-row">
                        
                   <div class="col-sm-4">
                   <img src="assets/<?php echo $this->session->userdata('s_foto');?>"  class="border mx-auto d-block border border-dark" width="120" height="155" alt="User Image">
                   </div> 
                    
                    <span class="border border-top-0 border-right-0 border-buttom-0">
                        
                    </span>
                    
                    <div class="col-sm-6">
                        <h4 class="text-primary"><?php echo $this->session->userdata('s_usuario');?></h4>
                        <div><i class="fa fa-user-circle-o" aria-hidden="true"></i><label>Nombre de usuario: <?php echo $this->session->userdata('s_usuario');?></label></div>

                        <div><i class="fa fa-envelope" aria-hidden="true"></i><label>Email: <?php echo $this->session->userdata('s_email');?></label></div>

                        <div><i class="fa fa-key" aria-hidden="true"></i><label>Privilegios: Nivel <?php echo $this->session->userdata('rol');?></label></div>

                         <div><i class="fa fa-users" aria-hidden="true"></i><label>Puesto: Administrativo</label></div>
                    </div>

                    </div>
                    
                    <div class="m-3 float-right">
                        
                        <button class="btn btn-primary btn-sm" type="submit" >Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>