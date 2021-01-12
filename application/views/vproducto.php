<!-- TABLA PRINCIPAL DE COMPRA -->
<div  class="col-lg-12" id="div_tablaProducto"><!-- style="margin-top: 80px;" -->
<div class=" table-responsive">
	<table class="table table-hover table-bordered table-striped table-sm" id="tablaProducto">
		<thead class="thead-light font-italic">
			<tr >
				<th style="width: 150px;">Categoria</th>
				<th>Marca</th>
				<th style="width: 600px;">Producto</th>
				<th style="width: 100px;">Stock</th>
				<th>Final (iva inc.)</th>
				<th style="width: 150px;">Neto</th>
				
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>

	
</div>

<!-- The Modal -->
<div class="modal" id="modalAdministrar" >
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Administrar</h4>
				<div class="alert alert-dismissible">
				<button type="button" class="close" data-toggle="modal" data-toggle="modal" data-target="#cerrarModal">&times;</button>
			</div>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
			
					<ul class="nav nav-tabs">
					<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#marca">Marcas</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#categoria">Categorias</a>
					</li>
					</ul>
						
					<div class="tab-content">
						<!-- panel marca -->
					  <div id="marca" class="container tab-pane active">
					   <div class="form-row  pt-1">
					   
					  <div class="col-sm-10">
							<label for="marca">Marca</label>
							<input id="txtMarca" class="form-control form-control-sm" type="text" name="txtMarca">

						</div>

						 <div class="col-sm-1">
							
							<button id="btnAñadirAdm" class="btn btn-primary btn-sm mt-4" type="button">Añadir</button> 
							
						</div>
					   </div>

						<div class="form-row">
					   
					  <div id="tablaM" class="col-sm-12 pt-3 ">
							
							<!-- <div id="divMarca"  class="border" style="height: 300px;"> -->
								
							 <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar border">
							<table id ="tablaMarca" class="table table-sm ">
								
							</table>
							
						</div>

							</div>
						</div>
					   
					   </div>

					   <!-- panel categoria -->
					   <div id="categoria" class="container tab-pane">

						<div class="form-row  pt-1">
					   
					  <div class="col-sm-10">
							<label for="categoria">Categoria</label>
							<input id="txtCategoria" class="form-control form-control-sm" type="text" name="txtCategoria">

						</div>

						 <div class="col-sm-1">
							
							<button id="btnAñadirCategoria" class="btn btn-primary btn-sm mt-4" type="button">Añadir</button> 
							
						</div>
					   </div>

						<div class="form-row">
					   
					  <div id="tablaCat" class="col-sm-12 pt-3 ">
						
								
							 <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar border">
							<table id ="tablaCategoria" class="table table-sm ">
								
							</table>
							
						</div>

							</div>
						</div>
					  
					  </div>
					   
					  </div>

						
				   </div>


				<div class="m-2 float-right" >

				<button id="btnAceptarAdm" class="btn btn-primary btn-sm" type="button">Aceptar</button>

				</div>

		</div>
			</div>

			

		</div>
	</div>


	