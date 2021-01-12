<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<style type="text/css">






body {
  font-family: "Poppins", sans-serif;
/*  height: 100px;
background-image: url('assets/niebla.jpg');*/
background: url('assets/niebla.jpg') no-repeat fixed center;
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   height: 40%;
   width: 100% ;
   text-align: center;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}


.mt-5 {
  margin-top: 15% !important;
}


#icon {
  width:60%;
}
</style>
</head>
<body class="row vh-100 justify-content-center align-items-center ">

  <div id="formContent" class="container bg-white border rounded col-4 rounded-lg" >

  <!-- <div id="formContent" class="align-items-center"> -->
  
  
    <div class="text-center">
      <i class="fa fa-user-o fa-lg" alt="Iniciar Sesión" aria-hidden="true" >
        
        Iniciar Sesión
      </i>
      
    </div>

  
  
   <form>
    <div class="form-group col-8 mx-auto">
      <input type="text" id="login" class="form-control" name="txtUsuario" placeholder="Usuario" required>
      <!-- <div class="valid-feedback">
        Looks good!
      </div> -->
    </div>
    <div class="form-group col-8 mx-auto">
      <input type="password" id="password" class="form-control" name="txtClave" placeholder="Contraseña" required>
      </div>
      <input type="button" id="btn_login" class="btn btn-primary mb-2" value="Ingresar" onclick="ingresoUruario()">
    
    </form>

  <!-- </div> -->
</div>


</body>


</html>

<script type="text/javascript" src="js/operaciones.js"></script>