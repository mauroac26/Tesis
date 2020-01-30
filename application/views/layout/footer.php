 
 <div class="">

				<nav class="navbar navbar-expand-md navbar-light bg-secondary fixed-bottom">
					<i class="fa fa-search"></i>
					<div class="col-sm-2">
					
		<input type="text" id="idSearch" class="form-control form-control-sm" style="height: 25px;" onkeyup="doSearch();">
</div>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#cNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="cNavbar">
						<ul  class="nav navbar-nav navbar-right" >

				<li class="nav-item"><a href="#myModal" class="nav-link" data-toggle="modal" ><img data-toggle="tooltip" title="Alta Compra"  src="assets/add.png" width="25" height="25" class="d-inline-block align-center" alt=""></a></li>
				 
						<li class="nav-item"><a class="nav-link" data-toggle="modal" href="#AltaRemito">Remito</a></li>

						<div class="dropup">
							<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Imprimir</a>

							<div class="dropdown-menu bg-light">
								<h5 class="dropdown-header bg-dark">INFORMES</h5>
								<a class="dropdown-item" id="modalIVAcompra" data-toggle="modal" href="#modalIVAcompra">Libro IVA compra</a>
								<a class="dropdown-item" id="modalVencimiento" href="#modalVencimiento" data-toggle="modal">Listado de vencimientos de proveedores</a>
							</div>
							</li>
							</div>

							
							
						</ul>
					</div>
				
			</nav>
			</div>
<!-- </div> -->
<script type="text/javascript" src="js/compras.js"></script>
<script type="text/javascript" src="js/operaciones.js"></script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>


</html>