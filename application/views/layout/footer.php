 <div class="">

 	<nav class="navbar navbar-expand-sm navbar-light bg-secondary fixed-bottom">
 		<i class="fa fa-search"></i>
 		<div class="col-sm-2">

 			<input type="text" id="idSearch" class="form-control form-control-sm" style="height: 25px;"
 				onkeyup="doSearch();">
 		</div>
 		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#cNavbar">
 			<span class="navbar-toggler-icon"></span>
 		</button>
 		<div class="collapse navbar-collapse font-weight-bolder" id="cNavbar">
 			<ul class="nav navbar-nav navbar-right">

 				<li class="nav-item"><a href="#myModal" class="nav-link" data-toggle="modal" data-toggle="tooltip"
 						data-placement="top" title="Alta Compra"><img src="assets/add.png" width="25" height="25"
 							class="d-inline-block align-center" alt=""></a></li>

 				<li class="nav-item "><a class="nav-link" data-toggle="modal" href="#AltaRemito">Remito</a></li>

 				<div class="dropup">
 					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown"
 							aria-haspopup="true" aria-expanded="false" href="#">Imprimir</a>

 						<div class="dropdown-menu bg-light">
 							<h5 class="dropdown-header bg-dark">INFORMES</h5>
 							<a class="dropdown-item" id="modalIVAcompra" data-toggle="modal"
 								href="#modalIVAcompra">Libro IVA compra</a>
 							<a class="dropdown-item" id="modalVencimiento" href="#modalVencimiento"
 								data-toggle="modal">Listado de vencimientos de proveedores</a>
 						</div>
 					</li>
 				</div>



 			</ul>



 		</div>
 		<ul class="pagination pagination-sm justify-content-end" style="margin:5px 0;">
 			<li class="page-item"><a class="page-link" href="#">Previous</a></li>
 			<li class="page-item"><a class="page-link" href="#">1</a></li>
 			<li class="page-item"><a class="page-link" href="#">2</a></li>
 			<li class="page-item"><a class="page-link" href="#">3</a></li>
 			<li class="page-item"><a class="page-link" href="#">Next</a></li>
 		</ul>
 	</nav>
 </div>
 <!-- </div> -->
 <script type="text/javascript" src="js/compras.js"></script>
 <script type="text/javascript" src="js/operaciones.js"></script>
 <script type="text/javascript" src="js/proveedores.js"></script>

 <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
 <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->


 </body>


 </html>
