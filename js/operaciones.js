var total3 = 0;
var total1 = 0;
var total2 = 0;
var total4 = 0;
var resultado = 0;
var gravado = 0;
var total = 0;
 


function suma(cantidad, pesounitario, alicuota) {

                           
				//     //DATOS DE LOS TOTALES
				if (alicuota == "No Gravado") {

								total1 = (cantidad * parseFloat(pesounitario)) + parseFloat(total1);
								document.getElementById("ivaNo").innerHTML = "$" + " " + parseFloat(total1).toFixed(2);

				} else {

					         //total = ((cantidad * parseFloat(pesounitario)) * parseFloat(alicuota)) / 100;
					         //total1 = total + parseFloat(total1);
                             gravado = (cantidad * parseFloat(pesounitario)) + parseFloat(gravado);

								if (alicuota == "21") {


									total2 = ((cantidad * parseFloat(pesounitario)) * 21.0) / 100 + parseFloat(total2);
									//gravado = (cantidad * parseFloat(pesounitario)) + parseFloat(gravado);
									document.getElementById("iva2").innerHTML = "$" + " " + parseFloat(total2).toFixed(2);;


								}

								if (alicuota == "10.5") {
									total3 = ((cantidad * parseFloat(pesounitario)) * 10.5) / 100 + parseFloat(total3);
									//gravado = (cantidad * parseFloat(pesounitario)) + parseFloat(gravado);
									document.getElementById("iva1").innerHTML = "$" + " " + parseFloat(total3).toFixed(2);;

								}

								if (alicuota == "27") {
									total4 = ((cantidad * parseFloat(pesounitario) * 27.0) / 100) + parseFloat(total4);
									//gravado = (cantidad * parseFloat(pesounitario)) + parseFloat(gravado);
									document.getElementById("iva3").innerHTML = "$" + " " + parseFloat(total4).toFixed(2);;

								}

								document.getElementById("grav").innerHTML = "$" + " " + parseFloat(gravado).toFixed(2);;
                               // resultado = parseFloat(gravado) + parseFloat(total1);
                               // alert(resultado);
				}


				resultado = parseFloat(total4) + parseFloat(total2) + parseFloat(total3) + parseFloat(gravado) + parseFloat(total1);
				


}

function validar(id) {

				var valor = document.getElementById(id).value;

				if (isNaN(valor)) {
								alert("Debe ingresar un número");


								// $('input[rel="num"]').tooltip();

								// $("<style type='text/css'> .tooltip .tooltipError{visibility: visible;} </style>").appendTo("#"+id);
								// document.getElementById(id).style.visibility = "visible";
								document.getElementById(id).value = "";

				}




}

//Iniciar sesion
//
$('#formContent').keypress(function (event) {
		 if (event.keyCode == 10 || event.keyCode == 13) {
		 

		   event.preventDefault();
		   document.getElementById("btn_login").click();
		 }
	   });


function ingresoUruario(){
	
	 var txtclave = $('#password').val();
				var txtUsuario = $('#login').val();
			   
				$.post("clogin/ingresarUsuario", {
												txtUsuario: '' + txtUsuario + '',
												txtClave: '' + txtclave + ''
								},
								function(data) {

												if (data == true) {
																window.location = "index";

												} else {
																alert("usuario o contraseña mal ingresados");

																document.getElementById("login").value = "";
																document.getElementById("password").value = "";
												}

								});
}
// $("#btn_login").click(function(event) {
//       if (event.keyCode == 10 || event.keyCode == 13) {
// 				var txtclave = $('#password').val();
// 				var txtUsuario = $('#login').val();
			   
// 				$.post("clogin/ingresarUsuario", {
// 												txtUsuario: '' + txtUsuario + '',
// 												txtClave: '' + txtclave + ''
// 								},
// 								function(data) {

// 												if (data == 1) {
// 																window.location = "index";

// 												} else {
// 																alert("usuario o contraseña mal ingresados");

// 																document.getElementById("login").value = "";
// 																document.getElementById("password").value = "";
// 												}

// 								});
//  event.preventDefault();
//   		 }

// });

function doSearch(tabla) {

				const tableReg = document.getElementById(tabla);

				const searchText = document.getElementById('idSearch').value;

				let total = 0;

				// Recorremos todas las filas con contenido de la tabla
				for (let i = 1; i < tableReg.rows.length; i++) {
								// Si el td tiene la clase "noSearch" no se busca en su cntenido
								if (tableReg.rows[i].classList.contains("noSearch")) {
												continue;
								}

								let found = false;
								const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
								// Recorremos todas las celdas
								for (let j = 0; j < cellsOfRow.length && !found; j++) {
												const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
												// Buscamos el texto en el contenido de la celda
												if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
																found = true;
																total++;
												}
								}
								if (found) {
												tableReg.rows[i].style.display = '';
								} else {
												// si no ha encontrado ninguna coincidencia, esconde la
												// fila de la tabla
												tableReg.rows[i].style.display = 'none';
								}


								// mostramos las coincidencias
								const lastTR = tableReg.rows[tableReg.rows.length - 1];
								const td = lastTR.querySelector("td");



				}
}


//AGREGA CEROS EN COMPROBANTE Y PUNTO DE VENTA
// function agregarCeros(numero, tipo) {
	
// 				var result = 0;
// 				var lengthComp = numero.length;
// 				if (tipo == 1 && lengthComp < 8) {


// 								result = numero.padStart(8, "0");

// 				} else if (tipo == 2 && lengthComp < 4) {
// 								result = numero.padStart(4, "0");
								
// 				} else {
// 								result = numero;
// 				}
// 				return result;
// }

function agregarCeros(numero, tipo) {
	
				var result = 0;
	
					result = numero.padStart(tipo, "0");
								
				
				return result;
}



//CREA MODAL DETALLE PROVEEDOR
function modalDetalleProveedor(cuit) {

				$("#modalpro").empty();
				$("#modalpro").append(



								'<div class="modal-dialog modal-lg">' +
								'<div class="modal-content">' +


								'<div class="modal-header">' +
								'<h4 class="modal-title">Detalle Proveedor</h4>' +
								'<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
								'</div>' +


								'<div class="modal-body">' +

								'<ul class="nav nav-tabs">' +
								'<li class="nav-item">' +
								'<a class="nav-link active" data-toggle="tab" href="#detalle">Detalle</a>' +
								'</li>' +
								'<li class="nav-item">' +
								'<a class="nav-link" data-toggle="tab" href="#ctacte">Cta.Cte</a>' +
								'</li>' +
								'<li class="nav-item">' +
								'<a class="nav-link" data-toggle="tab" href="#compras">Compras</a>' +
								'</li>' +
								'</ul>' +

								'<div class="tab-content">' +
								'<div id="detalle" class="container tab-pane active">' + '<br>' +
								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Nombre y Apellido o Razon Social' +
								'<label class="float-right" id="eProveedor1"></label>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Datos Fiscales' +
								'<label class="float-right" id="cuit"></label>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Domicilio' +
								'<label class="float-right" id="domicilio"></label>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Localidad' +
								'<label class="float-right" id="localidad"></label>' +

								'</div>' +

								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Telefono' +
								'<label class="float-right" id="telefono"></label>' +

								'</div>' +

								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Cta.Cte :: Saldo' +
								'<label class="float-right text-danger" id="saldo"></label>' +

								'</div>' +
								'</div>' +
								'</div>' +

								'<div id="ctacte" class="container tab-pane fade">' + '<br>' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Proveedor' +
								'<label class="float-right" id="ctaProveedor"></label>' +
								'</div>' +

								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'<small> Detalle Cta.Cte</small>' +
								'</div>' +

								'<div id="contenidoTabla" class="row-sm-5">' +
								'<div class="table-responsive" style="height: 180px;">' +

								'<table id ="tablacta" class="table table-hover table-bordered table-sm table-striped tableSecundaria">' +
								'<thead class="bg-dark text-white">' +

								'<tr>' +
								'<th>Fecha</th>' +
								'<th>Comprobante</th>' +
								'<th>Monto Orig.</th>' +
								'<th>Debe</th>' +
								'<th>Haber</th>' +
								'<th>Saldo</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody style="overflow-y: scroll;">' +


								'</tbody>' +
								'</table>' +

								'</div>' +
								'</div>' +




								'</div>' +


								'<div id="compras" class="container tab-pane fade">' + '<br>' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Proveedor' +
								'<label class="float-right" id="compraProveedor"></label>' +
								'</div>' +

								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'<small> Detalle Compras</small>' +
								'</div>' +

								'<div id="contenidoTablaCompras" class="row-sm-5">' +
								'<div class="table-responsive" style="height: 180px;">' +

								'<table id ="tablaComprasProveedor" class="table table-hover table-bordered table-sm table-striped tableSecundaria">' +
								'<thead class="bg-dark text-white">' +

								'<tr>' +
								'<th>Fecha</th>' +
								'<th>Comprobante</th>' +
								'<th>Total</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody style="overflow-y: scroll;">' +


								'</tbody>' +
								'</table>' +

								'</div>' +
								'</div>' +
								'</div>' +

								'</div>' + '</br>' +







								'<div class="m-2 float-right">' +
								'<button id="btn_editarProveedor" class="btn btn-primary btn-sm" type="button">Editar</button>  ' +
								'<button id="btn_editarAceptarP" class="btn btn-primary btn-sm" type="button" disabled="">Aceptar</button>  ' +
								'<button id="btn_editarEliminarP" class="btn btn-primary btn-sm" type="button">Eliminar</button>  ' +
								'<button id="close-btn" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal" >Salir</button>' +

								'</div>' +




								'</div> ' +
								'</div>' +

								'</div>'




				);

				$("#tablacta").find("tr:gt(0)").remove();

				$("#tablaComprasProveedor").find("tr:gt(0)").remove();



				$.post("proveedores/getDetallesProveedor", {
												cuit: cuit
								},
								function(data) {

												var pe = JSON.parse(data);
												$.each(pe, function(i, item) {


																//document.getElementById("ctaProveedor").innerHTML = item.apeynom;
																document.getElementById("eProveedor1").innerHTML = item.apeynom;
																document.getElementById("cuit").innerHTML = item.cuit;
																document.getElementById("domicilio").innerHTML = item.domicilio;
																document.getElementById("localidad").innerHTML = item.localidad;
																document.getElementById("telefono").innerHTML = item.telefono;
																document.getElementById("saldo").innerHTML = "$" + item.saldo;




												});

								});




				//CARGA DETALLES DE CUENTA CORRIENTE PROVEEDOR
				$.post("proveedores/getCtaProveedor", {
												cuit: cuit
								},
								function(data) {

												var pe = JSON.parse(data);
												$.each(pe, function(i, item) {

																totalComprobante = agregarCeros(item.comprobante, 8);  
																let comp = item.comprobante.substr(8);
                                                                
                                                                
																let monto;

																if(item.tipoComp == "fac"){
																	monto = item.debe;
																}else{
																	monto = item.haber;
																}

																$('#tablacta').append(

																				'<tr>' +
																				'<td>' + item.fechaCarga + '</td>' +
																				'<td>' +
																				'<a href="" onclick="detalle(\'' + cuit + '\', ' + comp + ', \'' + item.tipoComp + '\'); return false;">' + item.comprobante + '</a>' +
																				'</td>' +
																				'<td class="text-success"style="text-align: right;">$' + monto + '</td>' +
																				'<td style="text-align: right;">$' + item.debe + '</td>' +
																				'<td style="text-align: right;">$' + item.haber + '</td>' +
																				'<td style="text-align: right;">$' + item.saldo + '</td>' +
																				'</tr>'


																);
																document.getElementById("ctaProveedor").innerHTML = item.apeynom;
												});

								}); //fin funcion carga tabla cuenta corriente

				//CARGA COMPRAS PROVEEDOR
				$.post("proveedores/getCompraProveedor", {
												cuit: cuit
								},
								function(data) {

												var pe = JSON.parse(data);
												$.each(pe, function(i, item) {

																totalComprobante = agregarCeros(item.comprobante, 8);

																$('#tablaComprasProveedor').append(

																				'<tr>' +
																				'<td>' + item.fComprobante + '</td>' +
																				'<td><a href="" onclick="modalDetalleCompra(\'' + cuit + '\', ' + item.comprobante + '); return false;">' + item.tipoComprobante + '' + item.tipoFactura + '' + totalComprobante + '</a></td>' +
																				'<td style="text-align: right;">$' + item.total + '</td>' +
																				'</tr>'


																);

																document.getElementById("compraProveedor").innerHTML = item.apeynom;
												});

								}); //fin funcion carga tabla cuenta corriente



				$("#modalpro").modal("show");
				$("#modalCompra").modal("hide");

}


//CREA MODAL DETALLE COMPRA
function modalDetalleCompra(cuit, numero) {
	

				$("#modalCompra").empty();
				$("#modalCompra").append(

								'<div class="modal-dialog modal-lg" role="document">' +
								'<div class="modal-content">' +

								// <!-- Modal Header -->
								'<div class="modal-header">' +
								'<h4 class="modal-title">Informacion de compras</h4>' +
								'<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
								'</div>' +

								// <!-- Modal body -->
								'<div class="modal-body">' +


								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Proveedor' +
								'<a href="" class="float-right" id="eProveedor" onclick="modalDetalleProveedor(document.getElementById(\'cuitProveedor\').innerText); return false;"></a>' +

								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'CUIT' +
								'<label class="float-right" id="cuitProveedor"></label>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Comprobante / Fecha Comprobante' +
								'<span class="float-right">' +
								'<label id="eComprobante"></label>' +
								'--' +
								'<label id="eFcomprobante"></label>' +
								'<a href="#modalEditar" data-toggle="modal">[editar]<i class="fa fa-pencil fa-fw"></i></a>' +
								'</span>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Fecha Carga / Fecha Contabilizacion' +
								'<span class="float-right">' +
								'<label id="eFCarga"></label>' +
								'--' +
								'<label id="eFcontabilizacion"></label>' +
								'<a href="#modalEditarFcon" data-toggle="modal">[editar]<i class="fa fa-pencil fa-fw"></i></a>' +
								'</span>' +
								'</div>' +

								'</div>' +
								'</br>' +


								'<div id="tablaEditar" class="row-sm-5 pt-3">' +
								'<div class="table-responsive" style="height: 140px;">' +

								'<table id ="tablaEd" class="table table-hover table-bordered table-sm table-striped tableSecundaria">' +
								'<thead class="bg-info">' +

								'<tr>' +
								'<th>Cant.</th>' +
								'<th>Descripción</th>' +
								'<th>P.Unitario</th>' +
								'<th>SubTotal</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody style="overflow-y: scroll;">' +


								'</tbody>' +
								'</table>' +

								'</div>' +
								'</div>' + '</br>' +

								'<div class="form-row">' +

								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Total' +
								'<label class="float-right" id="eTotal"></label>' +
								'</div>' +

								'<div class="col-sm-12 pt-1 border border-top-0 border-right-0 border-left-0" >' +
								'Condicion' +
								'<span class="float-right">' +
								'<label class="font-weight-bold" id="eCondicion"></label>' +
								'<a href="#modalEditarCondicion" id="cambiar_condicion" class="d-none float-right" data-toggle="modal" ><small>[cambiar]</small><i class="fa fa-pencil fa-fw"></i></a>' +
								'</span>' +
								'</div>' +
								'</div>' +


								'<div class="m-2 float-right">' +
								'<button id="btn_editarCompra" class="btn btn-primary btn-sm" type="button">Editar</button>  ' +
								'<button id="btn_editarAceptar" class="btn btn-primary btn-sm" type="button" disabled="">Aceptar</button>  ' +
								'<button id="btn_editarEliminar" class="btn btn-primary btn-sm" type="button">Eliminar</button>  ' +
								'<button id="close-btn" class="btn btn-primary btn-sm" type="button" class="close" data-toggle="modal" data-target="#cerrarModal" >Salir</button>' +

								'</div>' +




								'</div>' +
								'</div>' +

								'</div>' +

								'</div>'


				);




				$("#tablaEd").find("tr:gt(0)").remove();





				$.post("compras/getDatosCompras", {
												id: numero,
												cuit: '' + cuit + ''

								},
								function(data) {
												var condicion = "";
												var now = new Date();

												var day = ("0" + now.getDate()).slice(-2);
												var month = ("0" + (now.getMonth() + 1)).slice(-2);
												var today = now.getFullYear() + "-" + (month) + "-" + (day);

												var p = JSON.parse(data);
												$.each(p, function(i, item) {

																var totalPVenta = agregarCeros(item.puntoVenta, 4);
																var fechaCarga = fechasFormato(item.fCarga);
																var totalComprobante = agregarCeros(item.comprobante, 8);
																var fechaVen = fechasFormato(item.ven);
																var fContab = fechasFormato(item.fContab);
																var fComprobante = fechasFormato(item.fComprobante);


																if (item.formaPago == "Contado") {
																				document.getElementById("eCondicion").innerHTML = item.formaPago;
																				document.getElementById("cambiar_condicion").className = "d-block float-right";
																} else if (item.condicion == "impaga") {
																				document.getElementById("eCondicion").innerHTML = item.formaPago + '::' + 'Saldo' + ' ' + '$' + item.total + '::' +
																								'Vencimiento' + ' ' + fechaVen;
																				document.getElementById("cambiar_condicion").className = "d-block float-right";
																				if (today > item.ven) {
																								document.getElementById("eCondicion").className = "font-weight-bold text-danger";
																				}
																} else {
																				document.getElementById("eCondicion").innerHTML = item.formaPago + '::' + item.condicion;

																}

																document.getElementById("eProveedor").innerHTML = item.apeynom;
																document.getElementById("cuitProveedor").innerHTML = cuit;
																document.getElementById("eComprobante").innerHTML = item.tipoComprobante + '' + item.tipoFactura + '' + totalPVenta + '-' + totalComprobante;
																document.getElementById("eFCarga").innerHTML = fechaCarga;
																document.getElementById("eTotal").innerHTML = "$" + item.total;
																document.getElementById("eFcomprobante").innerHTML = fComprobante;
																document.getElementById("eFcontabilizacion").innerHTML = fContab;
																document.getElementById("eProvv").innerHTML = item.apeynom;
																document.getElementById("eProvv1").innerHTML = item.apeynom + ' - ' + item.tipoComprobante + '' + item.tipoFactura + '' + totalComprobante;
																document.getElementById("eProvv2").innerHTML = item.apeynom + ' - ' + item.tipoComprobante + '' + item.tipoFactura + '' + totalComprobante;
																$('#eComm').val(item.comprobante);
																$('#epta').val(item.puntoVenta);
																$('#eFcom').val(item.fComprobante);
																$('#eFven').val(item.ven);
																$('#eFcontab').val(item.fContab);

												});

								});


				//CARGA DETALLES DE LA COMPRA
				$.post("compras/getDatosDetallesCompras", {
												id: numero,
												cuit: '' + cuit + ''
								},
								function(data) {

												var pe = JSON.parse(data);
												$.each(pe, function(i, item) {

																$('#tablaEd').append(

																				'<tr>' +
																				'<td>' + item.cantidad + '</td>' +
																				'<td>' + item.nombre + '</td>' +
																				'<td style="text-align: right;">$' + item.precio + '</td>' +
																				'<td style="text-align: right;">$' + item.subTotal + '</td>' +
																				'</tr>'


																);
												});

								});



				$("#modalCompra").modal("show");
				$("#modalpro").modal("hide");

}

function fechasFormato(fechas) {

				// var cadena = fechas.split('-').reverse().join('/');

				// return cadena;

				var now = new Date(fechas);
				var day = ("0" + now.getDate()).slice(-2);
				var month = ("0" + (now.getMonth() + 1)).slice(-2);
				var fechas = (day) + "/" + (month) + "/" + now.getFullYear();

				return fechas;
}

//MODAL ALTA PROVEEDOR
function modalAltaProveedor() {

				$("#modalAltaProveedor").empty();
				$("#modalAltaProveedor").append(

								//ALTA PROVEEDOR 

								'<div class="modal-dialog modal-mb">' +
								'<div class="modal-content">' +

								//Modal Header
								'<div class="modal-header">' +
								'<h4 class="modal-title">Alta Proveedor</h4>' +
								'<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
								'</div>' +

								//Modal body
								'<div class="modal-body">' +

								'<div class="form-row">' +

								'<div class="col-sm-3">' +
								'<label for="dtRem">C.U.I.T:</label>' +
								'<input class="form-control form-control-sm" type="text" name="cuitProveedor" id="cuitProveedor">' +
								'</div>' +

								'<div class="col-sm-9">' +
								'<label for="provRem">Nombre y Apellido/Razon social:</label>' +
								'<input type="text" class="form-control form-control-sm" name="pro" id="nombreProveedor" size="69" required>' +
								'</div>' +



								'</div>' +


								'<div class=" form-row">' +


								'<div  class="col-sm-4">' +
								'<label for="comprobobanteRem">Domicilio:</label>' +
								'<input type="text" class="form-control form-control-sm" name="domicilioProv" id="domicilioProveedor" required>' +
								'</div>' +


								'<div class="col-sm-4">' +
								'<label for="tipoFrem">Localidad:</label>' +
								'<input type="text" class="form-control form-control-sm" name="localidadProveedor" id="localidadProveedor" required>' +
								'</div>' +



								'<div class="col-sm-4">' +
								'<label for="pv">Telefono:</label>' +
								'<input id="telefonoProveedor" class="form-control form-control-sm" type="text" name="telefonoProveedor">' +
								'</div> ' +

								'</div>' +


								'</br>' +



								'<div class="m-2 float-right" >' +

								'<button type="button" class="btn btn-primary btn-sm" name="aceptarNuevoRem" onclick="registrarProveedor();">Aceptar</button>  ' +

								'<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal">Cerrar</button>' +
								'</div>' +

								'</div>' +
								'</div>' +
								'</div>'



				);

				$("#modalAltaProveedor").modal("show");
				$("#myModal").modal("hide");
}

function registrarProveedor() {


				var cuit = $('#cuitProveedor').val();
				var nombre = $('#nombreProveedor').val();
				var direccion = $('#domicilioProveedor').val();
				var localidad = $('#localidadProveedor').val();
				var telefono = $('#telefonoProveedor').val();


				// if(cuit != "" && nombre != "" && localidad != "" && direccion != "" && telefono != "" ){

				$.post("proveedores/registrarProveedor", {

												cuit: '' + cuit + '',
												nombre: '' + nombre + '',
												localidad: '' + localidad + '',
												direccion: '' + direccion + '',
												telefono: '' + telefono + ''


								},
								function(data) {

												if (data == 1) {
																alert("EL proveedor se guardo con exito");



																window.location = "proveedores";


												} else {
																alert("No se pudo guardar");
												}


								});


				//       }else{
				//  alert("Faltan completar campos")
				// }




}



$(document).on("click", "#delete", function() {
	//document.getElementById("pago").reset();
	location.reload();
				$('.modal').modal('hide');


});


//MULTI MODALS
$('.modal').on('show.bs.modal', function(event) {
				var idx = $('.modal:visible').length;
				$(this).css('z-index', 1040 + (10 * idx));
});
$('.modal').on('shown.bs.modal', function(event) {
				var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
				$('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
				$('.modal-backdrop').not('.stacked').addClass('stacked');
});

function graficar() {
				window.location = "cchartjs";
}

$("#btn_filtros").click(function() {

	
		var mydiv = document.getElementById('div_filtros');
		if (mydiv.style.display === 'block' || mydiv.style.display === ''){
		  mydiv.style.display = 'none';
		  document.getElementById("div_tabla").className = "col-lg-12";
		}
		else{
		  mydiv.style.display = 'block';
		  document.getElementById("div_tabla").className = "col-lg-10 float-right";
		}


});

//CREA MODAL DETALLE COMPRA
function modalDetallePago(cuit, numero) {
				
				$("#modalDetallePago").empty();
				$("#modalDetallePago").append(

								'<div class="modal-dialog modal-lg" role="document">' +
								'<div class="modal-content">' +

								// <!-- Modal Header -->
								'<div class="modal-header">' +
								'<h4 class="modal-title">Detalle Pago</h4>' +
								'<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
								'</div>' +

								// <!-- Modal body -->
								'<div class="modal-body">' +


								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Proveedor' +
								'<a href="" class="float-right" id="pagoProveedor" onclick="modalDetalleProveedor(\'' + cuit + '\'); return false;"></a>' +

								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Pago' +
								'<label class="float-right" id="comprobantePago"></label>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Fecha' +
								'<label class="float-right" id="fechaPago"></label>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Efectivo' +
								'<label class="float-right" id="efectivoPago"></label>' +
								'</div>' +

								'</div>' +

								'<div class="form-row">' +

								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Total' +
								'<label class="float-right" id="totalPago"></label>' +
								'</div>' +
								'</div>' +


								'<div class="m-2 float-right">' +
								'<button id="btn_editarEliminar" class="btn btn-primary btn-sm" type="button">Eliminar</button>  ' +
								'<button id="close-btn" class="btn btn-primary btn-sm" type="button" class="close" data-toggle="modal" data-target="#cerrarModal" >Salir</button>' +

								'</div>' +




								'</div>' +
								'</div>' +

								'</div>' +

								'</div>'


				);





				$.post("caja/getDatosPago", {
												id: numero,
												cuit: '' + cuit + ''

								},
								function(data) {
											

												let p = JSON.parse(data);
												$.each(p, function(i, item) {

																let totalPagoPV = agregarCeros(item.puntoVenta, 4);
																let fecha = fechasFormato(item.fecha);
																let totalPago = agregarCeros(item.comprobante, 8);
															

																document.getElementById("pagoProveedor").innerHTML = item.apeynom;
																document.getElementById("comprobantePago").innerHTML = 'ODP [B]'+ '' + totalPagoPV + '-' + totalPago;
																document.getElementById("fechaPago").innerHTML = fecha;
																document.getElementById("totalPago").innerHTML = "$" + item.total;
																document.getElementById("efectivoPago").innerHTML = "$" + item.efectivo;
																
															

												});

								});



				$("#modalDetallePago").modal("show");
				$("#modalpro").modal("hide");

}

function detalle(cuit, numero, tipo){

	if(tipo == 'fac'){
		modalDetalleCompra(cuit, numero);
	}else{
		modalDetallePago(cuit, numero);
	}
}



//MODAL ALTA PRODUCTO
function modalAltaProducto() {

				$("#modalAltaProducto").empty();
				$("#modalAltaProducto").append(

								//ALTA PRODUCTO

								'<div class="modal-dialog modal-lg">' +
								'<div class="modal-content">' +

								//Modal Header
								'<div class="modal-header">' +
								'<h4 class="modal-title">Alta Producto</h4>' +
								'<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
								'</div>' +

								//Modal body
								'<div class="modal-body">' +

								'<div class="form-row">' +

								'<div class="col-3">' +
								'<label for="marca">Marca</label>' +
								//'<input class="form-control form-control-sm" type="text" name="marca" id="marca">' +

								'<select id="cboMarca" class="custom-select custom-select-sm" name="marca">'+
									// '<option id="peso" value="peso">Peso</option>'+
									// '<option id="dolar" value="dolar">Dolar</option>'+
									
								'</select>'+
								'</div>' +

								'<div class="col-3">' +
								'<label for="categoria">Categoria</label>' +
								//'<input type="text" class="form-control form-control-sm" name="pro" id="categoria" size="69" required>' +
								'<select id="categoria" class="custom-select custom-select-sm" name="categoria">'+
									// '<option id="peso" value="peso">Peso</option>'+
									// '<option id="dolar" value="dolar">Dolar</option>'+
									
								'</select>'+
								'</div>' +

								'<div class="col-6">' +
								'<label for="producto">Producto</label>' +
								'<input type="text" class="form-control form-control-sm" name="producto" id="producto" size="69" required>' +
								'</div>' +

								'</div>' +


								'<div class="p-1 form-row">' +


								'<div  class="col-sm-12">' +
								'<label for="desc">Descripcion</label>' +
								'<textarea class="form-control" id="desc" rows="2"></textarea>'+
								'</div>' +

								'</div>' +

 
								'<div class="p-1 form-row">' +

								'<div class="col-sm-3 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'<div class="pt-4">Identificacion' +
								'</div>' +
								'</div>' +


								'<div class="col-sm-4">' +
								'<label for="codInt">Codigo interno</label>' +
								'<input id="codInt" class="form-control form-control-sm" type="text" name="codInt">' +
								'</div> ' +
								
								'<div class="col-sm-5">' +
								'<label for="codBarra">Codigo de barra</label>' +
								'<input id="codBarra" class="form-control form-control-sm" type="text" name="codBarra">' +
								'</div> ' +

								'</div>' +

								 '<div class="p-1 form-row">' +

								 '<div class="col-sm-2">'+
								 '<label for="moneda">Moneda</label>'+
								 '<select id="cboMoneda" class="custom-select custom-select-sm" name="moneda">'+
									'<option id="peso" value="peso">Peso</option>'+
									'<option id="dolar" value="dolar">Dolar</option>'+
									
								'</select>'+
								
								 '</div>'+

								 '<div class="col-sm-2">' +
								'<label for="precioCompra">Precio de Compra</label>' +
								'<input id="precioCompra" class="form-control form-control-sm" type="text" name="precioCompra">' +
								'</div> ' +
								

								'<div class="col-sm-2">'+
								 '<label for="iva">Alic. IVA</label>'+
								 '<select id="cboIva" class="custom-select custom-select-sm" name="iva">'+
									'<option id="exento" value="exento">Exento</option>'+
									'<option id="iva2" value="2.5">2.5%</option>'+
									'<option id="iva3" value="3">3.0%</option>'+
									'<option id="iva5" value="5">5.0%</option>'+
									'<option id="iva10" value="10.5">10.5%</option>'+
									'<option id="iva21" value="21">21.0%</option>'+
									'<option id="iva27" value="27">27.0%</option>'+
									
								'</select>'+
								
								 '</div>'+

								'<div class="col-sm-2">' +
								'<label for="margen">Margen Producto</label>' +
								'<input id="margen" class="form-control form-control-sm" type="text" name="margen">' +
								'</div> ' +

								'<div class="col-sm-3">' +
								'<label for="precioVenta">Precio Vta. Fijo (Neto)</label>' +
								'<input id="precioVenta" class="form-control form-control-sm text-right" type="text" name="precioVenta" onchange="modificarPrecio(this.value);">' +
								'</div> ' +


								'</div>' +


								  '<div class="p-1 form-row">' +

								'<div class="col-sm-4 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'<div class="pt-4">Stock' +
								'</div>' +
								'</div>' +
								
								'<div class="col-sm-2">'+
							   '<label for="provRem">Afecta Stock</label></br>'+
							
						
							  '<div class="border"> '+                   
							  '<div class="form-check form-check-inline ml-2 mt-2 ">'+
							  '<input class="form-check-input" type="radio" name="rbAfectaStock" id="asSi" value="0" checked>'+
							  '<label class="form-check-label" for="asSi">Si</label>'+
							  '</div>'+
							  '<div class="form-check form-check-inline">'+
							  '<input class="form-check-input" type="radio" name="rbAfectaStock" id="asNo" value="1">'+
							  '<label class="form-check-label" for="asNo">No</label>'+
							  '</div>'+
							  '</div>'+
							  '</div> '+    

							  '<div class="col-sm-2">'+
							   '<label for="provRem">Entrega sin Stock</label></br>'+
							
						
							  '<div class="border"> '+                   
							  '<div class="form-check form-check-inline ml-2 mt-2 ">'+
							  '<input class="form-check-input" type="radio" name="rbEntregaStock" id="esSi" value="0" checked>'+
							  '<label class="form-check-label" for="esSi">Si</label>'+
							  '</div>'+
							  '<div class="form-check form-check-inline">'+
							  '<input class="form-check-input" type="radio" name="rbEntregaStock" id="esNo" value="1">'+
							  '<label class="form-check-label" for="esNo">No</label>'+
							  '</div>'+
							  '</div>'+
							  '</div> '+  
							  
							  '<div class="col-sm-2">' +
								'<label for="Minimo">Minimo</label>' +
								'<input id="minimo" class="form-control form-control-sm" type="text" name="Minimo">' +
								'</div> ' +

								'<div class="col-sm-2">' +
								'<label for="critico">Critico</label>' +
								'<input id="critico" class="form-control form-control-sm" type="text" name="critico">' +
								'</div> ' +

								'</div>' +
								
								'<div class="pt-2 text-white form-row">' +

								'<div class="col-sm-9 bg-success">' +
								'<label for="">Precio calculado</label>' +
								'<p class ="" >Precio de compra x margen de categoria</p>' +
								'</div> ' +

								'<div class="bg-success ml-3 col-sm-1">' +
								'<label class="ml-1" for="neto">Neto</label>' +
								'<p id="neto" class="float-right" >0,00</p>' +
								'</div> ' +

								'<div class=" bg-success ml-3 col-sm-1">' +
								'<label class="ml-1 for="final">Final</label>' +
								'<p id="final" class="float-right">0,00</p>' +
								'</div> ' +

								'</div>' +
							

								'<div class="m-2  float-right" >' +
								   
								'<button type="button" class="btn btn-primary btn-sm" name="aceptarNuevoProducto" onclick="registrarProducto();">Aceptar y Nuevo</button>  ' +
								
								'<button type="button" class="btn btn-primary btn-sm" name="aceptarProducto" onclick="registrarProducto();">Aceptar </button>  ' +
								'<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal">Cerrar</button>' +
								'</div>' +

								'</div>' +
								'</div>' +
								'</div>'



				);

				$("#modalAltaProducto").modal("show");
				$("#AltaRemito").modal("hide");
}

function modificarPrecio(precio){

let final;
let iva = $("#cboIva").val();


final = (parseFloat(precio) * iva / 100) + parseFloat(precio);


document.getElementById("neto").innerHTML  = parseFloat(precio).toFixed(2);
document.getElementById("final").innerHTML  = parseFloat(final).toFixed(2);
}

function modalDetalleProducto(id){

				$("#modalProducto").empty();
				$("#modalProducto").append(

								'<div class="modal-dialog modal-lg" role="document">' +
								'<div class="modal-content">' +

								// <!-- Modal Header -->
								'<div class="modal-header">' +
								'<h4 class="modal-title">Detalle de Producto</h4>' +
								'<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
								'</div>' +

								// <!-- Modal body -->
								'<div class="modal-body">' +


								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Producto' +
								'<a href="" class="float-right" id="dProducto" ></a>' +

								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Marca :: Categoria' +
								'<span class="float-right">' +
								'<label id="dMarca"></label>' +
								' :: ' +
								'<label id="dCategoria"></label>' +
								'</span>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12  border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Descripcion' +
								
								'<label class="float-right" id="dDescripcion"></label>' +
								
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Afecta Stock / Entega sin Stock' +
								'<span class="float-right">' +
								'<label id="dAfectaStock"></label>' +
								' :: ' +
								'<label id="dEntregaStock"></label>' +
								'</span>' +
								'</div>' +

								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Precio Neto (sin IVA) / Precio Final (con IVA)' +
								'<span class="float-right">' +
								'<label id="dPrecioNeto"></label>' +
								' :: ' +
								'<label id="dPrecioFinal"></label>' +
								'</span>' +
								'</div>' +

								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Stock' +
								
								'<label class="float-right" id="dStock"></label>' +
								
								'</div>' +
								'</div>' +
								'</br>' +


								'<div class="m-2 float-right">' +
								'<button id="btn_editarProducto" class="btn btn-primary btn-sm" type="button">Editar</button>  ' +
								'<button id="btn_editarEliminar" class="btn btn-primary btn-sm" type="button">Eliminar</button>  ' +
								'<button id="close-btn" class="btn btn-primary btn-sm" type="button" class="close" data-toggle="modal" data-target="#cerrarModal" >Salir</button>' +

								'</div>' +




								'</div>' +
								'</div>' +

								'</div>' +

								'</div>'


				);



				$.post("producto/getDatosProducto", {
												id: id,
						
								},
								function(data) {
												let afectaStock = "";
												let entregaStock = "";
											
												var p = JSON.parse(data);
												$.each(p, function(i, item) {

															

																if (item.afectaStock == 0) {
																				document.getElementById("dAfectaStock").innerHTML = "Afecta stock";
																				
																} else {
																				document.getElementById("dAfectaStock").innerHTML = "No afecta stock";

																}

																if (item.entregaStock == 0) {
																				document.getElementById("dEntregaStock").innerHTML = "Permite entrega sin stock";
																				
																} else {
																				document.getElementById("dEntregaStock").innerHTML = "No permite entrega sin stock";

																}

																document.getElementById("dProducto").innerHTML = item.nombre;
																document.getElementById("dMarca").innerHTML = item.marca;
																document.getElementById("dCategoria").innerHTML = item.categoria;
																document.getElementById("dDescripcion").innerHTML = item.descripcion;
																document.getElementById("dPrecioNeto").innerHTML = "$" + item.precioVenta;
																document.getElementById("dPrecioFinal").innerHTML = "$" + item.precioFinal;
																document.getElementById("dStock").innerHTML = item.stock;
															

												});

								});



				$("#modalProducto").modal("show");
				$("#modalAltaProducto").modal("hide");



}


$("#altaProducto").click(function(){

	$.post("producto/cargarComboMarcas",

 
		function(data) {
					
					var marca = JSON.parse(data);

					$.each(marca, function(i, item) {
						
					  $("#cboMarca").append('<option value="'+item.id+'">'+item.nombre+'</option>');
			   
						

				});

	});


	$.post("producto/cargarComboCategoria",

 
		function(data) {
					
					var categoria = JSON.parse(data);

					$.each(categoria, function(i, item) {
						
					  $("#categoria").append('<option value="'+item.id+'">'+item.categoria+'</option>');
			   
						

				});

	});

});

  var agregar;
        var idProducto = "";
        var ali;
        // var precio;
        var idNombreProducto;
        var pu;
    function autocompletarProd(idProd) {
        
    
    
                $("#" + idProd).autocomplete({
                 
    //source: "<?php //echo site_url('producto/getProducto/?')?>",
    source: "producto/getProducto",
    minLength: 1,
    select: function(event, ui){

                
    
agregar = ui.item.n;

if(agregar == 1){

modalAltaProducto();
    
    }
    else{
          
         $("#" + idProd).val(ui.item.label);
        
        document.getElementById(idProd).value = ui.item.value;
       idProducto = ui.item.id;
       ali = ui.item.alicuota;
       pu = ui.item.precioVenta;
       idNombreProducto = ui.item.value;
    
       document.getElementById("alic").value = ali;
      //document.getElementById("uniVenta").value = pu;
}
  }
    
         }).data('ui-autocomplete')._renderItem = function(ul, item) {
        
    
    
//      var item = $('<li class="list-group-item d-flex justify-content-between align-items-center">'+ item.label + '<span class="float-right badge badge-primary badge-pill">' + item.stock + '</span></li>')
        
        return $("<li>").append(item.label).appendTo(ul);
        
    };
    
    
    

  
    
    // appendTo: $("#" + idModal)
    
    //});
    
}

//ELIMINA DETALLES DE LA COMPRA
function eliminarFC(id, cant, puni, alicuotaTabla) {
   
                if (alicuotaTabla == "No Gravado") {
                                total1 = total1 - (cant * puni);
                                document.getElementById("ivaNo").innerHTML = "$" + " " + parseFloat(total1).toFixed(2);
                }else{
                       
                	 //total = ((cantidad * parseFloat(puni)) * parseFloat(alicuotaTabla)) / 100;
					         //total1 =  parseFloat(total1) - total;
                             

                if (alicuotaTabla == "21") {

                                total2 = parseFloat(total2) - ((cant * parseFloat(puni)) * 21.0) / 100;
                                gravado = parseFloat(gravado) - (cant * parseFloat(puni));
                                
                                document.getElementById("iva2").innerHTML = "$" + " " + parseFloat(total2).toFixed(2);
                }
                if (alicuotaTabla == "10.5") {
                                total3 = parseFloat(total3) - ((cant * parseFloat(puni)) * 10.5) / 100;
                                gravado = parseFloat(gravado) - (cant * parseFloat(puni));
                                document.getElementById("iva1").innerHTML = "$" + " " + parseFloat(total3).toFixed(2);
                }
                if (alicuotaTabla == "27") {
                                total4 = parseFloat(total4) - ((cant * parseFloat(puni) * 27.0) / 100);
                                gravado = parseFloat(gravado) - (cant * parseFloat(puni));
                                document.getElementById("iva3").innerHTML = "$" + " " + parseFloat(total4).toFixed(2);
                }

                
                document.getElementById("grav").innerHTML = "$" + " " + parseFloat(gravado).toFixed(2);

                //resultado = parseFloat(gravado) + parseFloat(total1);
                               // alert(resultado);

}
                
                
            
                
                resultado = parseFloat(total4) + parseFloat(total2) + parseFloat(total3) + parseFloat(gravado) + parseFloat(total1);

                // document.getElementById("tot").innerHTML = "$" + " " + parseFloat(resultado).toFixed(2);
                
                //Elimina una fila de la tabla TablaAC
                $('#fila' + id).remove();


}

function activarC(c) {
                $('#btn_del' + c).show();
}

function desactivarC(c) {
                $('#btn_del' + c).hide();
}


//CREA MODAL DETALLE VENTAS
function modalDetalleVenta(cuit, numero) {
	
    let unidades = 0;
				$("#modalDetalleVenta").empty();
				$("#modalDetalleVenta").append(

								'<div class="modal-dialog modal-lg" role="document">' +
								'<div class="modal-content">' +

								// <!-- Modal Header -->
								'<div class="modal-header">' +
								'<h4 class="modal-title">Detalle Venta</h4>' +
								'<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
								'</div>' +

								// <!-- Modal body -->
								'<div class="modal-body">' +


								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Cliente' +
								'<a href="" class="float-right" id="eCliente" onclick="modalDetalleCliente(document.getElementById(\'cuitCliente\').innerText); return false;"></a>' +
                                '<label class="float-right" id="eCliente"></label>' +
								'</div>' +
								'</div>' +


								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Venta' +
								'<span class="float-right">' +

								'<label id="eVenta"></label>' +
								'--' +
								'<label id="eFecha"></label>' +
								'</span>' +
								'</div>' +
								'</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Fecha de Carga' +
								
								'<label class="float-right" id="eFCarga"></label>' +
								'</div>' +

								'</div>' +
								'</br>' +


								'<div id="tablaEditarV" class="row-sm-5 pt-3">' +
								'<div class="table-responsive" style="height: 140px;">' +

								'<table id ="tablaEdVenta" class="table table-hover table-bordered table-sm table-striped tableSecundaria">' +
								'<thead class="bg-info">' +

								'<tr>' +
								'<th>Cant.</th>' +
								'<th>Detalle</th>' +
								'<th>I.V.A</th>' +
								'<th>P.Unitario</th>' +
								'<th>SubTotal</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody style="overflow-y: scroll;">' +


								'</tbody>' +
								'</table>' +

								'</div>' +
								'</div>' + '</br>' +

								'<div class="form-row">' +

								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
								'Cantidades' +
								'<span class="float-right">' +
								'<label id="items"></label>'+
                                 ' '+
								'<label >Items</label>' +
								' -- ' +
								'<label id="unidades"></label>'+
                                ' '+
								'<label >Unidades</label>' +
								'</span>' +
								'</div>' +
                                '</div>' +

								'<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Total' +
								
								'<label class="float-right"  id="eTotalVenta"></label>' +
								'</div>' +
                                 '</div>' +

                                 '<div class="form-row">' +
								'<div class="col-sm-12 pt-1 border border-top-0 border-right-0 border-left-0" >' +
								'Condicion' +
								'<span class="float-right">' +
								'<label id="eCondicionVenta"></label>' +
								'--' +
								'<label>Saldo:</label> <label id="eSaldo"></label>' +
								//'<a href="#modalEditarCondicion" id="cambiar_condicion" class="d-none float-right" data-toggle="modal" ><small>[cambiar]</small></a>' +
								'</span>' +
								'</div>' +
								'</div>' +
                                
                                '<div class="form-row">' +
								'<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
								'Vencimiento' +
								
								'<label class="float-right" id="eVencimiento"></label>' +
								'</div>' +
                                '</div>' +

								'<div class="m-2 float-right">' +
								'<button id="btn_editarAceptar" class="btn btn-primary btn-sm" type="button" >Aceptar</button>  ' +
								'<button id="close-btn" class="btn btn-primary btn-sm" type="button" class="close" data-toggle="modal" data-target="#cerrarModal" >Salir</button>' +

								'</div>' +




								'</div>' +
								'</div>' +

								'</div>' +

								'</div>'


				);




				$("#tablaEdVenta").find("tr:gt(0)").remove();

            
          

               //CARGA DETALLES DE LA COMPRA
				$.post("ventas/getDatosDetallesVentas", {
												id: numero,
												cuit: '' + cuit + ''
								},
								function(data) {

												var pe = JSON.parse(data);
												$.each(pe, function(i, item) {
                                                            
                                                            
																$('#tablaEdVenta').append(

																				'<tr>' +
																				'<td>' + item.cantidad + '</td>' +
																				'<td>' + item.nombre + '</td>' +
																				'<td>' + item.iva + '</td>' +
																				'<td style="text-align: right;">$' + item.precio + '</td>' +
																				'<td style="text-align: right;">$' + item.subTotal + '</td>' +
																				'</tr>'


																);

																//unidades = Number(item.cantidad) + unidades;
                                                            
												});

								});



				$.post("ventas/getDatosVentas", {
												id: numero,
												cuit: '' + cuit + ''

								},
								function(data) {
		
												var condicion = "";
												var now = new Date();

												var day = ("0" + now.getDate()).slice(-2);
												var month = ("0" + (now.getMonth() + 1)).slice(-2);
												var today = now.getFullYear() + "-" + (month) + "-" + (day);

												var p = JSON.parse(data);
												$.each(p, function(i, item) {

																
																var fechaCarga = fechasFormato(item.fecha);
																var totalComprobante = agregarCeros(item.comprobante, 8);
																var fechaVen = fechasFormato(item.vencimiento);
																


																// if (item.formaPago == "Contado") {
																// 				document.getElementById("eCondicion").innerHTML = item.formaPago;
																// 				document.getElementById("cambiar_condicion").className = "d-block float-right";
																// } else if (item.condicion == "impaga") {
																// 				document.getElementById("eCondicion").innerHTML = item.formaPago + '::' + 'Saldo' + ' ' + '$' + item.total + '::' +
																// 								'Vencimiento' + ' ' + fechaVen;
																// 				document.getElementById("cambiar_condicion").className = "d-block float-right";
																// 				if (today > item.ven) {
																// 								document.getElementById("eCondicion").className = "font-weight-bold text-danger";
																// 				}
																// } else {
																// 				document.getElementById("eCondicion").innerHTML = item.formaPago + '::' + item.condicion;

																//}

																document.getElementById("eCliente").innerHTML = item.nombre;
																document.getElementById("eVenta").innerHTML = item.puntoVenta + '-' + totalComprobante;
																document.getElementById("eFecha").innerHTML = fechaCarga;
																document.getElementById("eFCarga").innerHTML = fechaCarga;
																document.getElementById("items").innerHTML = item.items;
																document.getElementById("eTotalVenta").innerHTML = "$" + item.total;
																document.getElementById("eCondicionVenta").innerHTML = item.condicion;
																document.getElementById("eSaldo").innerHTML ="$" + item.total;
                                                                document.getElementById("unidades").innerHTML = item.unidades;
                                                                document.getElementById("eVencimiento").innerHTML = fechaVen;
																// $('#eComm').val(item.comprobante);
																// $('#epta').val(item.puntoVenta);
																// $('#eFcom').val(item.fComprobante);
																// $('#eFven').val(item.ven);
																// $('#eFcontab').val(item.fContab);

												});

								});






				$("#modalDetalleVenta").modal("show");
				//$("#modalpro").modal("hide");

}

function modificarLabelCantidad(i){
        let cantidad = document.getElementById("txtCantidad"+i).value;
        document.getElementById("pd"+i).innerHTML = cantidad;


}
