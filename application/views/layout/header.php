<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="assets/Estilo.css" rel="stylesheet" type="text/css" /> -->
     <!-- <link href="assets/tabla.css" rel="stylesheet" type="text/css" /> -->
    <!--  <link href="assets/ventanaModal.css" rel="stylesheet" type="text/css" /> -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
   <link rel="stylesheet" href="/resources/demos/style.css"/> 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  


  


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">






<style type="text/css">
i{
   
   padding: 5px;
}

label {
    font-size: 12px;
}

  .selected{
    cursor: pointer;
     background-color: rgba(0, 0, 0, 0.1);
   transition: background-color 0.2s linear;
  }  

  .selected:hover{
    background-color: #C1EBF8;
    color: black;
    
  }  

.botonEli{
    float: left;
    /*margin-left: 10px;
    padding-top: -2px;*/
   color: white;
   border-radius: 10px;
   background-color: rgba(255, 0, 0, 0.1);
   transition: background-color 0.6s linear;
    margin-right: -60px;
}

.botonEli:hover{
    
   background-color: red;
  } 

  .botonEd{
    width: 60px;
   margin-left: 125px;
   color: white;
   border-radius: 10px;
   background-color: rgba(0, 128, 0, 0.2);
   transition: background-color 0.6s linear;
   text-decoration: none;
}

.botonEd:hover{
    
   background-color: green;
  } 

  .cerrar{
     width: 60px;
   margin-left: 125px;
   color: white;
   border-radius: 10px;
   background-color: blue;
   text-decoration: none;

  }

.navegacion
{
   color: black;
  width: 100%;
  height: 43px;
  background-color: #C9CACA;
  border-top: 1px solid #AEB6BF;
  position: fixed;
  bottom: 0;
  
}

.navbar {
  min-height: 40px;

}

body { padding-bottom: 70px; }

.ui-autocomplete.ui-widget {
  font-size: 12px;
  
}

.ui-autocomplete{
  z-index: 9999 !important;
}



</style>


<!-- <header> -->
        
       <!-- / #logo-header -->
 <div>
        <nav class="navbar navbar-expand-md navbar-light bg-light " >
            <a class="navbar-brand" href="#">
    Cedal
  </a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#tercerNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="tercerNavbar">
            <ul  class="nav navbar-nav navbar-right  text-decoration" >
            <li class="nav-item"><a class="nav-link" href="Clientes">Clientes</a></li>
              <li class="nav-item"> <a class="nav-link" href="#">Proovedores</a></li>
              <li class="nav-item"> <a class="nav-link" href="Ventas">Ventas</a></li>
              <li class="nav-item"> <a class="nav-link" href="Compras">Compras</a></li>
              <li class="nav-item"> <!-- <li><a href="#">Caja</a></li>
                <li><a href="#">Banco</a></li> -->
              <li class="nav-item"> <a class="nav-link" href="#">Productos</a></li>
              <li class="nav-item"> <a class="nav-link" href="#">Stock</a></li>
              <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-cog fa-lg fa-fw"></i></a></li>

            </ul>
          </div>
        <!-- / nav -->
 <?php if($this->session->userdata('s_idUsuario') == 1){?>
<div class="float-right">Usuario: <?php echo $this->session->userdata('s_usuario');?>
  <a href="clogin/logout">Cerrar sesión</a>
<?php } ?>
</div>

  </nav>
  </div>



    <!-- </header> --><!-- / #main-header -->

