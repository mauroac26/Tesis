
<!-- <section id="main-content"> -->
	
<!-- TABLA PRINCIPAL DE COMPRA -->
	<div class="table-responsive">
	<table class="table table-hover table-bordered table-sm" id="tablaCompras">
		<thead class="bg-secondary">
			<tr >
				<th>F.Carga</th>
				<th>F.comprobante</th>
				<th>Movimientos</th>
				<th>Comprobante</th>
				<th>Proveedor</th>
				<th>Total</th>
				<th>Vencimiento</th><th>Saldo</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>

	</table>
	</div>



<!-- </section> -->

<!-- MODAL ALTA COMPRA -->


<!-- The Modal -->
<div class="modal" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Alta compra</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
			
					<!-- FILA 1  -->
					<form class="needs-validation" novalidate>
						<div class="form-row">
							<div class="col-sm-7 bg-primary ">
				<span class="bg-primary">Proveedor:</span>
				<br/>
						<input class="form-control form-control-sm" type="text" name="nProveedor" id="proveedor" size="60" required>
					</div>
				 
				 <div class="col-auto">
				<label for="moneda">Moneda:</label>
				<br>
						<select class="custom-select custom-select-sm"  id="moneda">
														<option id="peso" value="peso">Peso</option>
														<option id="dolar" value="dolar">Dolar</option>
												</select>
					</div>

					<div class="col-sm-1">
			 <label for="">Cotiz.:</label>
					 <input class="form-control form-control-sm"  type="text" name="cot" value="1,00"> 
					</div>
					
					<div style="width: 170px;">
					<label for="fComprobante">F.Comprobante:</label>
								 <input class="form-control form-control-sm" type="date" name="fec" id="fComprobante" value="<?php echo date("Y-m-d"); ?>">
					</div>

					</div>
				 
				 <!-- FILA 2 -->
				 
				 <div class="form-row">
					<div class="col-sm-2">
					<label for="formaPago">Forma&nbspde&nbsppago:</label>
												<select class="custom-select custom-select-sm" id="formaPago">
														<option value="Cuenta corriente">Cuenta corriente</option>
														<option value="Contado">Contado</option>
												</select>
								</div>

								<div class="col-sm-2">
								<label for="datepicker1">Vencimiento:</label>
												<input  class="form-control form-control-sm" type="date" name="ven" id="datepicker1" value="<?php echo date("Y-m-d"); ?>">
						</div> 

						<div  class="col-sm-2">
								<label for="comprobante">Comprobante:</label>
												<select class="custom-select custom-select-sm" id="comprobante">
														<option id="c1" value="[FAC]">Factura</option>
														<option id="c2" value="com">Recibo</option>
														<option id="c3" value="com">Nota Debito</option>
														<option id="c4" value="com">Nota Credito</option>
														<option id="c5" value="com">Sin Comprobante</option>
														<option id="c6" value="com">Resumen Bancario</option>
														<option id="c7" value="com">Pago Impuestos y Tasa</option>
												</select>
						</div>

						<div class="col-sm-1">
								<label for="tipoF">Tipo:</label>
								<select class="custom-select custom-select-sm" id="tipoF" name="selectF">
											<option id="tf1" value="[A]">A</option>
											<option id="tf2" value="tipof2">B</option>
											<option id="tf3" value="tipof3">C</option>
											<option id="tf4" value="tipof4">M</option>
											<option id="tf5" value="tipof5">X</option>
									</select>
												
						</div>

						<div style="width: 80px;">
								<label for="puntoVenta">Punto Venta:</label>
									 
												<input class="form-control form-control-sm" id="puntoVenta" type="text" name="num" maxlength="4" onkeyup="validar(this.id)" required>
								
						</div> 

						<div class="col-sm-1">
								 <label for="num">Numero:</label>
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
												<input class="form-control form-control-sm" id="num" type="text" name="num" maxlength="8" onkeyup="validar(this.id)">
												</span>
						</div> 
					 
			
	 
						<div style="width: 170px;">
								<label for="datepicker2">F.Contabilizacion:</label>
										<input class="form-control form-control-sm" type="date" id="datepicker2" value="<?php echo date("Y-m-d"); ?>">
						</div> 
				 </div>

				 <!-- FILA 3 -->
				 <div class="form-row">

						<div class="col-auto">
						
								 <label for="tipoP">Tipo:</label>
									 <select class="custom-select custom-select-sm" id="tipoP" name="selectP">
														<option id="tp1" value="Producto">Producto</option>
														<option id="tp2" value="Gasto">Gasto</option>
														<option id="tp3" value="Bien de uso">Bien de uso</option>
														<option id="tp4" value="Servicio">Servicio</option>
												</select>
								</div>

								<div class="col-sm-5">
									 <label for="producto">Producto:</label>
									 <input class="form-control form-control-sm" id="producto" type="text" name="nProducto">
								</div> 

								<div class="col-auto">
									 <label for="alic">I.V.A:</label>
												<select class="custom-select custom-select-sm" id="alic">
														<option id="nogra" value="No Gravado" name="iva">No Gravado</option>
														<option id="ex" value="e" name="iva">Exento</option>
														<option id="iva10" value="10,5%" name="iva">10,5%</option>
														<option id="iva21" value="21,0%" name="iva">21,0%</option>
														<option id="iva27" value="27,0%" name="iva">27,0%</option>
												</select>
								</div>

						<div class="col-sm-1">
								<label for="cantidad">Cantidad:</label>
								<div class= "tooltip">
										<span  class="tooltipError">Ingresar solo numeros</span> </div>
									 <input class="form-control form-control-sm" type="text" id="cantidad" name="cantidad" size="7" onkeyup="validar(this.id)">
						</div>

						<div style="width: 75px;">
								 <label for="uni">P.Unitario:</label>
												<input class="form-control form-control-sm" id="uni" type="text" name="uni" size="7.5" onkeyup="validar(this.id)">
						</div> 

				 </div>

				 
				 <div class="m-2 ">
						
					 <input id="btn_añadir" class="btn btn-primary btn-sm float-right" type="button" value ="Añadir">
						
				 </div>

				<div class="row-sm-5 pt-5">
				<div class="table-responsive" style="height: 160px;">
					 <table class="table table-hover table-bordered table-sm table-striped " id="tablaAC">
						 <thead class="bg-info">
								<tr>
									<th>Cant.</th>
									<th>Descripción</th>
									<th>Alicuota</th>
									<th>P.Unitario</th>
									<th>SubTotal</th>
								</tr>
						</thead>
						<tbody style="overflow-y: scroll;">
			
						</tbody>

					</table>
				</div>
				</div>
				
<!-- datos de iva -->
<div class="form-row m-2">
<div  class="col-sm-2">
	<label> IVA 10,5% </label><br>
	<div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
							
<label id="iva1">$0,00</label>
						</div>
</div>

						
	
<div class="col-sm-2">
<label>IVA 21%</label><br>

						<div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
<label id="iva2">$0,00</label>
						</div>
	</div>    

		
<div class="col-sm-2">
<label>IVA 27%</label><br>

						<div style="border-bottom: 1px solid black; border-left: 1px solid black;text-align: right;">
<label id="iva3">$0,00</label>
						</div>
	</div>   


<div class="col-sm-2">
<label>Gravado</label>

						<div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
<label id="grav">$0,00</label>
						</div>
		</div>  

<div class="col-sm-2">
<label>No Gravado</label>

						<div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
<label id="ivaNo">$0,00</label>
						</div>
</div>

<div class="col-sm-2">
<label>Excento</label>

						<div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
<label id="exc">$0,00</label>
						</div>
</div>

</div>

<div class="m-2 float-right">

	<input type="button" class="btn btn-primary btn-sm" id="btnAceptarNuevo" name="aceptarNuevo" onclick="registrarCompras(this.id);" value="Aceptar y Nuevo">

<input type="button" id="btnAceptarCompra" class="btn btn-primary btn-sm" name="aceptar" onclick="registrarCompras(this.id);" value="Aceptar">

<button class="btn btn-light btn-sm" type="button" data-dismiss="modal">Cerrar</button>

						</div>
</form>
		</div>
			</div>

			

		</div>
	</div>

<!-- MODAL INFORMACION DE COMPRA -->

<div class="modal fade" id="modalEditar">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Informacion de compras</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
							 
		 
					<div class="form-row">
						<div class="col-sm-12" style="border-bottom: 0.2px solid #7F817F;">
								 Proveedor
								<label class="float-right" id="eProveedor"></label>
								</div>
					</div>

					 <div class="form-row">
								<div class="col-sm-12 " style="border-bottom: 0.2px solid #7F817F;">
								Comprobante
						<label class="float-right" id="eComprobante"></label>
						</div>
					 </div>
					 
					<div class="form-row">
						<div class="col-sm-12" style="border-bottom: 0.2px solid #7F817F;">
								Fecha Carga
					 <label class="float-right" id="eFCarga"></label>
					
						</div>

						</div>
            
             <div class="form-row">
						<div class="col-sm-12" style="border-bottom: 0.2px solid #7F817F;">
								 Fecha comprobante
								 <a class="stretched-link float-right" style="font-size: 12px;"t  data-toggle="modal" href="#modalCalen">Cambiar</a>
								<label class="float-right" id="fc"></label>
								</div>
					</div>

					 <div class="form-row">
								<div class="col-sm-12 " style="border-bottom: 0.2px solid #7F817F;">
								Fecha Contabilizacion
								<a class="stretched-link float-right" style="font-size: 12px;" data-toggle="modal" href="#modalCalen">Cambiar</a>
						<label class="float-right" id="fc1"></label>
						</div>
					 </div>
					 
					 <div class="form-row">
						<div class="col-sm-12" style="border-bottom: 0.2px solid #7F817F;">
								Forma de pago
								<a class="stretched-link float-right" style="font-size: 12px;"t  data-toggle="modal" href="">Cambiar</a>
					 <label class="float-right" id="fp"></label>
					
						</div>

						</div>
						</br>
	
						
					 <!-- <div class="form-row">
						<div class="col-sm-3">
								
								Fecha Comprobante
					 <input type="date" class="form-control form-control-sm" id="eFcomprobante" name="fechass" value="" required disabled>
					
					</div> -->
						<!-- <div class="col-sm-3 ml-5">
								Fecha Contabilizacion
								<input type="date" class="form-control form-control-sm" id="eFcontabilizacion" value="" required disabled>
								</div> -->

								<!-- <div class="col-sm-3 ml-5">
								Forma de pago
								<input type="text" class="form-control form-control-sm" id="eFormaPago" required disabled>
								</div>
						
						</div> -->
						
				 <div id="tablaEditar" class="row-sm-5 pt-2">
						<div class="table-responsive" style="height: 160px;">

					 <table id ="tablaEd" class="table table-hover table-bordered table-sm table-striped ">
						<thead class="bg-info">
								
							<tr>
							 <th>Cant.</th>
							 <th>Descripción</th>
							 <th>P.Unitario</th>
							 <th>SubTotal</th>
						 </tr>
						</thead>
					 <tbody style="overflow-y: scroll;">
						

					 </tbody>
					 </table>
				 
					 </div>
					</div></br>

					<div class="form-row">

						<div class="col-sm-12" style="border-bottom: 0.2px solid #7F817F;">
								 Total
								<label class="float-right" id="eTotal"></label>
								</div>

								<div class="col-sm-12" style="border-bottom: 0.2px solid #7F817F;">
								Condicion
						<label class="float-right" id="eCondicion"></label>
						</div>
					</div>
				

<div class="m-2 float-right"> 
	
	<button id="btn_editarCompra" class="btn btn-primary btn-sm" type="button">Editar</button>
	<button id="btn_editarAceptar" class="btn btn-primary btn-sm" type="button" disabled="">Aceptar</button>
	<button id="btn_editarEliminar" class="btn btn-primary btn-sm" type="button">Eliminar</button>
	<button class="btn btn-light btn-sm" type="button" data-dismiss="modal">Cerrar</button>

</div>

		
			
	
		 </div> 
	</div>

</div>

	</div>
	

<!-- ALTA REMITO -->
<div class="modal" id="AltaRemito">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Alta Remito</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">

					<div class="form-row">
						
							<div class="col-sm-3">
								<label for="dtRem">Fecha:</label>
								 <input class="form-control form-control-sm" type="date" name="fec" id="dtRem">
						</div>

						<div class="col-sm-9">
								 <label for="provRem">Proveedor:</label>
								<input type="text" class="form-control form-control-sm" name="pro" id="provRem" size="69" required>
								</div>
							 
						
						
						</div>


						<div class=" form-row">
						
														
						<div  class="col-sm-3">
								<label for="comprobobanteRem">Comprobante:</label>
												<select id="comprobobanteRem" class="custom-select custom-select-sm">
														<option id="c1" value="[FAC]">Remito</option>
														<option id="c2" value="com">Sin Comprobante</option>
														
												</select>
						</div>

						<div class="col-sm-2">
								<label for="tipoFrem">Tipo:</label>
								<select id="tipoFrem" class="custom-select custom-select-sm" name="selectF">
											<option id="tf1" value="[A]">A</option>
											<option id="tf2" value="tipof2">B</option>
											<option id="tf3" value="tipof3">C</option>
											<option id="tf4" value="tipof4">M</option>
											<option id="tf5" value="tipof5">X</option>
									</select>
												
						</div>

						<div class="col-sm-2">
								 <label for="pv">Punto de venta:</label>
												<input id="pv" class="form-control form-control-sm" type="text" name="num">
						</div> 

						<div class="col-sm-2">
								<label for="numcom"> Numero:</label>
												<input id="numcom" type="text" class="form-control form-control-sm" name="num" size="15" onkeyup="validar(this.id)">
						</div> 

						<div class="col-sm-3">
								<label for="dt1">Fecha de remito:</label>
										<input type="date" class="form-control form-control-sm" id="dt1">
						</div> 
						</div>

						<div class="form-row">
						<div class="col-sm-3" >
								 <label for="tipoPrem">Tipo:</label>
									 <select id="tipoPrem" class="custom-select custom-select-sm" name="selectP">
														<option id="tp1" value="Producto">Producto</option>
														<option id="tp2" value="Gasto">Gasto</option>
														<option id="tp3" value="Bien de uso">Bien de uso</option>
														<option id="tp4" value="Servicio">Servicio</option>
												</select>
								</div>

								<div class="col-sm-7">
									<label for="productoRem">Producto:<br></label>
									 <input id="productoRem" class="form-control form-control-sm" type="text" name="producto" size="45">
						</div> 
				
						<div class="col-sm-2">
								<label for="cantidadRem">Cantidad:</label>
									 <input type="text" id="cantidadRem" name="cantidad" class="form-control form-control-sm">
						</div>
						</div>

						<div class="m-2 float-right">
						
							 <button id="btn_add" class="btn btn-primary btn-sm" type="button" onclick="registrar();">Añadir</button>
						</div>
					


<!--tabla-->

					 <div id="tablaCom" class="row-sm-5 pt-5">
						 <div class="table-responsive" style="height: 160px;">

							 <table id ="tablaAC" class="table table-hover table-bordered table-sm table-striped ">
								 <thead class="bg-info">
								
									<tr>
										<th>Cant.</th>
										<th>Descripción</th>
										<th>P.Unitario</th>
									</tr>
								 </thead>
						 <tbody style="overflow-y: scroll;">
						

						</tbody>
					 </table>
				 
					 </div>
					</div></br>


					
						<div class="m-2 float-right">
						
							<button type="button" class="btn btn-primary btn-sm" name="aceptarNuevoRem" onclick="registrarRemito();">Aceptar y Nuevo</button>

							<button id="close-btn" class="btn btn-primary btn-sm" type="button" onclick="closeModal();">Cerrar</button>
						</div>

					 </div>
			 </div>
</div>
</div>

<!-- MODAL LIBRO IVA COMPRA -->
<div class="modal" id="modalIVAcompra">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Informes Libro IVA Compra</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">              
					 
					 <div class="form-row">
						<div class="col-sm-6 pt-4" style="border-bottom: 1px solid black;">
						 <h6>Tipo de Informe</h6>
						 </div>  
							 <div class="col-sm-3">
								 <label for="tipoFitro">Tipo de filtro:</label>
								<select id="tipoFiltro" class="custom-select custom-select-sm" name="selectF">
											<option id="tf1" value="fcon">Fecha Contabilizacion</option>
											<option id="tf2" value="fcom">Fecha Comprobante</option>
											
									</select>
								
								</div>

								<div class="col-sm-3">
									 <label for="compLib" >Tipo Comprobante:</label>
								<select id="compLib" class="custom-select custom-select-sm" name="selectF">
											<option id="tf1" value="[A]">A</option>
											<option id="tf2" value="[B]">B</option>
											<option id="tf2" value="[C]">C</option>
											<option id="tf2" value="[otro]">Todos</option>
									</select>
								 
								 </div>
					 </div><br>

					 <div class="form-row">
						<div class="col-sm-6 pt-4" style="border-bottom: 1px solid black;">
							<h6>Ingrese rango de fecha a imprimir</h6>
						 </div>  
							 <div class="col-sm-3">
								 <label for="dtDesdeLib">Fecha desde:</label>
								
											<input id="dtDesdeLib" class="form-control form-control-sm" type="date" name="">
											
								
								
								</div>

								<div class="col-sm-3">
									<label for="dtHastaLib">Fecha hasta:</label>
								<input id="dtHastaLib" class="form-control form-control-sm" type="date">
								 
								 </div>
						</div> <br>

						<div class="form-row">
						<div class="col-sm-6 pt-4" style=" border-bottom: 1px solid black;">
							 <h6>Impresión</h6>
						 </div>  
							 <div class="col-sm-3">
								 <label for="tipoFechaLibro">Fecha:</label>
								<select id="tipoFechaLibro" class="custom-select custom-select-sm" name="selectF">
											<option id="tf1" value="fcon1">De Contabilización</option>
											<option id="tf2" value="fcom1">De Comprobante</option>
											
									</select>
								 
								 </div>

								<div class="col-sm-3">
										<label for="ordenar">Ordenar:</label>
								
								 <select id="ordenar" class="custom-select custom-select-sm" name="selectF">
											<option id="tf1" value="fecha">Fecha</option>
											<option id="tf2" value="monto">Monto</option>
											<option id="tf2" value="prov">Proveedor</option>
										 
									</select>
								 </div>
							</div>

					 <div class="m-3 float-right">
						
					<button id="Imprimir" class="btn btn-primary btn-sm" type="button" >Imprimir</button>


						</div>
						 

						

 
						
			</div>
						</div>
</div>
</div>


<!-- MODAL IVA VENCIMIENTO -->
<div class="modal" id="modalVencimiento">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Informes Libro IVA Compra</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">              
					 
					 <div class="form-row">
						<div class="col-sm-8 pt-4" style="border-bottom: 1px solid black;">
						 <h6>Incluir vencimiento hasta el</h6>
						 </div>  
							 <div class="col-sm-4">
								 <label for="fechaHastaVen">Fecha Hasta:</label>
								 <input id="fechaHastaVen" class="form-control form-control-sm" type="date" name="">
								
								</div>

					 </div><br>

					 <div class="form-row">
						<div class="col-sm-8 pt-4" style="border-bottom: 1px solid black;">
							<h6>Oprciones de página</h6>
						 </div>  
							 <div class="col-sm-4">
								 <label for="ordenaPor">Ordenar por</label>
									<select id="ordenaPor" class="custom-select custom-select-sm" name="selectF">
											<option id="tf1" value="[A]">De Contabilización</option>
											<option id="tf2" value="comp">De Comprobante</option>
											<option id="tf2" value="monto">Monto</option>
									</select>
											
											
								
								
								</div>

								
						</div> <br>

						

					 <div class="m-3 float-right">
						
					<button id="ImprimirVen" class="btn btn-primary btn-sm" type="button" >Imprimir</button>


						</div>
						 

						

 
						
			</div>
						</div>
</div>
</div>

<script type="text/javascript">
	var baseurl = "<?php echo base_url();?>";
</script>
 
<!-- SCRIPT AUTOCOMPLETE NOMBRE PROVEEDOR -->


 <script type="text/javascript">
	
	var idProveedor = "";
	$(document).ready(function(){

			$("#proveedor").autocomplete({

source: "<?php echo site_url('compras/getNombre/?')?>",
select: function(event, ui){
		 var agregar = 0;
			
			agregar = ui.item.n;

			if(agregar == 1){

				location.href = "#AltaRemito";
			 
			}else{
				$('[name="nProveedor"]').val(ui.item.label);
			
			idProveedor = ui.item.cuit;

			}


},
 appendTo: $("#myModal")
				
});
		});

</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
	'use strict';
	window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
})();
</script>

<script>
$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
});
</script>

<!-- <script >
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})
</script> -->

<div class="modal" id="modalCalen">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Cambiar Fecha</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">              
					 
					 <div class="form-row">
						
          <input type="date" class="form-control form-control-sm" id="calen">
						
			</div>

			<button id="btn_AceptarFecha" class="btn btn-primary btn-sm" type="button" disabled="">Aceptar</button>
	    <button class="btn btn-light btn-sm" type="button" data-dismiss="modal">Cerrar</button>

						</div>
</div>
</div>
</div>


	