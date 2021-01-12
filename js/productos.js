//CARGA TABLA PRINCIPAL DEL MODULO PRODUCTOS
var id = 0;

$.post("producto/datosProducto",
		function(data) {
			
				var p = JSON.parse(data);
				
				//var ifv = 1;
				

				$.each(p, function(i, item) {
						
	
						$('#tablaProducto').append(


								'<tr id="' + item.id + '">' +
								'<td>' + item.categoria + '</td>' +
								'<td>' + item.marca + '</td>' +
								'<td >' + item.nombre + '</td>' +
								'<div  class="row">'+
								'<td>'+
								
								'<div id=divTD'+item.id+' style="width:50px; height:15px; font-size: 10px;" class="d-none ">Sin stock</div>' +
								'<div class="text-right">' + item.stock +'</div>'+
								'</div>'+
								'</td>' +
								'<td class="text-right">$' + item.precioFinal + '</td>' +
								'<td class="text-right">$' + item.precioVenta + '</td>' +
								'</tr>'



						);
						if (item.stock == 0) {

								document.getElementById(item.id).className = "table-danger";
								document.getElementById("divTD"+item.id).className = " d-block bg-danger pl-1 mt-1 opacity-5 float-left text-white";

						}

						//ifv++;
				});

//                              //MUSTRA INFORMACION DEL PRODUCTO
				$("#tablaProducto tr").click(function() {

						let idProducto = $(this).attr("id");
						
						modalDetalleProducto(idProducto);

				});

		});


function registrarProducto(){

	   let marca =$('#cboMarca').val();
	   let categoria =$('#categoria').val();
	   let nombre =$('#producto').val();
	   let descripcion =$('#desc').val();
	   let codigoInterno =$('#codInt').val();
	   //let codigoBarra =$('#codBarra').val();
	   let precioCompra =$('#precioCompra').val();
	   let iva =$('#cboIva').val();
	   let margen =$('#margen').val();
	   let precioVenta =$('#precioVenta').val();
	   let moneda =$('#cboMoneda').val();
	   let afectaStock =$('input:radio[name=rbAfectaStock]:checked').val();
	   let entregaStock =$('input:radio[name=rbEntregaStock]:checked').val();
	   let minimo =$('#minimo').val();
	   let critico =$('#critico').val();
	   let final = parseFloat($('#final').text());

	 alert(marca);

$.post("producto/registrarProducto",{

		marca: marca,
		categoria: categoria,
	   nombre: nombre,
	   descripcion: descripcion,
	   codigoInterno: codigoInterno,
		precioCompra: precioCompra,
		iva: iva,
		margen: margen,
		precioVenta: precioVenta,
		moneda: moneda,
		afectaStock: afectaStock,
		entregaStock: entregaStock,
		minimo: minimo,
		critico: critico,
		final: final

		},
		function(data) {
			
				  if (data == 1) {
					  
					  alert("El producto se guardo con exito"); 
					  window.location = "producto";

				  }else{
					alert("Error al guardar el producto");
				  }
						
	



				});
				  

}

//HABILITA CAJA DE TEXT Y BOTON PARA ACTUALIZAR COMPRA
$("#btnAñadirAdm").click(function() {

		let marca = $("#txtMarca").val();
	   
	   $.post("producto/registrarMarca",{

		marca: marca

		},
		function(data) {
			
				  if (data == 1) {
					  
					  alert("Se añadio la marca con exito con exito"); 
					  cargarMarcas();

				  }else{
					alert("Error al añadir la marca");
				  }
						
	



				});

});

$("#linkAdministrar").click(function(){

cargarMarcas();
cargarCategoria();


});



function cargarMarcas(){
	  
	  $("#tablaMarca").find("tr").remove();
	
	$.post("producto/mostrarMarcas",


		function(data) {
			
				  if (data != "[]") {
					  
					var marca = JSON.parse(data);
					let valor;
				   
				

				$.each(marca, function(i, item) {
						
					   valor = item.estado == 0 ? "Habilitar" : "Desabilitar";
				
						
					 

						$('#tablaMarca').append(
							
					  
							'<tr>' +
								'<td><small>' + item.nombre + '</small></td>' +
								'<td><input  id=btn'+item.id+' class="btn btn-danger btn-sm float-right" data-estado='+item.estado+' type="button" value='+valor+' onClick=cambiarValor('+item.id+');></td>' +
							'</tr>'
							
	   //                      '</div>'

						);

				});
					  

				  }
				  else{
					alert("No hay marcas cargadas");
				  }
						
	



				});

}


function cambiarValor(id){
	
	let estado = $("#btn"+id).data("estado");
   

  

	$.post("producto/modificarEstadoMarca",{

		id: id,
		estado: estado

		},
		function(data) {
			
				
					  
					
					  cargarMarcas();

				  
	



				});
	
}


//HABILITA CAJA DE TEXT Y BOTON PARA ACTUALIZAR COMPRA
$("#btnAñadirCategoria").click(function() {

		let categoria = $("#txtCategoria").val();
	   
	   $.post("producto/registrarCategoria",{

		categoria: categoria

		},
		function(data) {
			
				  if (data == 1) {
					  
					  alert("Se añadio la categoria con exito con exito"); 
					  cargarCategoria();

				  }
				  else{
					alert("Error al añadir la categoria");
				  }
						
	



				});

});



function cargarCategoria(){
	  
	  $("#tablaCategoria").find("tr").remove();
	
	$.post("producto/mostrarCategoria",


		function(data) {
			
				  if (data != "[]") {
					  
					var categoria = JSON.parse(data);
					let valor;
				   
				

				$.each(categoria, function(i, item) {
						
					   valor = item.estado == 0 ? "Habilitar" : "Desabilitar";
				
						
					 

						$('#tablaCategoria').append(
							
					  
							'<tr>' +
								'<td><small>' + item.categoria + '</small></td>' +
								'<td><input  id=btnc'+item.id+' class="btn btn-danger btn-sm float-right" data-estado='+item.estado+' type="button" value='+valor+' onClick=cambiarValorCategoria('+item.id+');></td>' +
							'</tr>'
							

						);

				});
					  

				  }
				 //  else{
					// alert("No hay categoria cargadas");
				 //  }
						
	



				});

}


function cambiarValorCategoria(id){
	
	let estado = $("#btnc"+id).data("estado");
   

  

	$.post("producto/modificarEstadoCategoria",{

		id: id,
		estado: estado

		},
		function(data) {
			
				 
					  
					
					  cargarCategoria();

				 
	



				});
	
}