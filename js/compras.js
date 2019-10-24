//CARGA TABLA PRINCIPAL DEL MODULO COMPRA

var id = 0;
var fechaCarga ="";
var totalComprobante = 0;
var totalPVenta = 0;
$.post("compras/getCompras",
	function(data){

			var p = JSON.parse(data);
			var condicion;
			var estilo;
		 var ifv = 1;
		 var now = new Date();

		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear() + "-" + (month) +"-"+ (day);
			
		
							
			$.each(p, function(i, item){


					
			 fechaCarga = fechasFormato(item.fCarga);
			 var totalComprobante = agregarCeros(item.comprobante, 1);
			 var fComprobante = fechasFormato(item.fComprobante);
			 var fVencimiento = fechasFormato(item.ven);

			 $('#tablaCompras').append(
			 
				'<tr id="modal-btn'+item.comprobante+'" data-toggle="modal" href="#modalEditar">'+
					 '<td>'+fechaCarga+'</td>'+
					 '<td>'+fComprobante+'</td>'+
					 '<td>'+item.movimientos+'</td>'+
					 '<td>'+totalComprobante+'</td>'+
					 '<td>'+item.apeynom+'</td>'+
					 '<td>$'+item.total+'</td>'+
					 '<td id="'+ifv+'">'+fVencimiento+'</td>'+
					 '<td>$'+item.saldo+'</td>'+
					 '</tr>'
				
				 
	
				);

	 
				if(today < item.ven){
				
					 document.getElementById(ifv).style.background = "#CB4335";
							
							}    
						
ifv++;

			});

//MUSTRA INFORMACION DE LA COMPRA
$("tr").click(function() {
	 
	 $("#tablaEd").find("tr:gt(0)").remove();
								 
								 var oID = "#"+$(this).attr("id");

								
								var i = $('tr').index(this);
								 id = document.getElementById('tablaCompras').rows[i].cells[3].innerText;
								var cond = document.getElementById('tablaCompras').rows[i].cells[6].innerText;
								


								$.post("compras/getDatosCompras",
								{
									id:id
								},
	function(data){
			var p = JSON.parse(data);
			$.each(p, function(i, item){
			 
var totalPVenta = agregarCeros(item.puntoVenta, 2);
			 
			
			

			 $('#eFcomprobante').val(item.fComprobante);
			 $('#eFcontabilizacion').val(item.fContab);
			 $('#eFormaPago').val(item.formaPago);
			
			 document.getElementById("eProveedor").innerHTML = item.apeynom;
			 document.getElementById("eComprobante").innerHTML = item.tipoComprobante+''+item.tipoFactura+''+totalPVenta+'-'+id;
			document.getElementById("eFCarga").innerHTML = fechaCarga;
			document.getElementById("eTotal").innerHTML = "$"+item.total;
			document.getElementById("eCondicion").innerHTML = item.condicion;
				 

			 });
			});

//CARGA DETALLES DE LA COMPRA
					$.post("compras/getDatosDetallesCompras",
								{
									idFac:id
								},
	function(data){
			var pe = JSON.parse(data);
			$.each(pe, function(i, item){
			 
			 $('#tablaEd').append(
			 
				'<tr>'+
					 '<td>'+item.cantidad+'</td>'+
					 '<td>'+item.descripcion+'</td>'+
					 '<td style="text-align: right;">$'+item.pUni+'</td>'+
					'<td style="text-align: right;">$'+item.subTotal+'</td>'+
					 '</tr>'
			 

			 );
			});

});

		
			});  
			
	});

 


// Close Modal informacion de la compra
 function closeModal() {


	 // modal.style.display = 'none';
	window.location="compras";

 }

var cont;
var cantidad;
var pesounitario;
var total3 = 0;
var total1 = 0;
var total2 = 0; 
var total4 = 0;
var resultado = 0;
 var gravado = 0;
var fila = "";

//AÑADE PRODUCTOS DE LA COMPRA
 $("#btn_añadir").click(function(){
	var numero = $('#num').val();
	var producto =  $('#producto').val();
		cantidad = $('#cantidad').val();
		pesounitario = $('#uni').val();
		var alicuota = $('#alic').val();
		var subtotal = $('#uni').val() * cantidad;

if(cantidad == "" || alicuota == "" || pesounitario == "" || producto == "" || numero == ""){
	alert("Ingrese los campos solicitados");
}else{
		 $.post("compras/addDetalleCompra",
		 {
				numero: numero,
				producto: ''+producto+'',
				cantidad: cantidad,
				pesounitario: pesounitario,
				alicuota: ''+alicuota+'',
				subtotal: subtotal
			 
		 },
	function(data){

		var cont = eval(data);

 fila='<tr onMouseOver="activar(this.id)" onMouseOut="desactivar(this.id)" class="selected" id='+cont+'><td style="text-align: right;">'+cantidad+'</td><td>'+producto+'</td><td style="text-align: right;">'+alicuota+'</td><td style="text-align: right;">$'+pesounitario+'</td><td style="text-align: right;">$'+subtotal+'<button class="btn btn-danger btn-sm" type="button" id="btn_del'+cont+'" onclick="eliminar('+cont+','+cantidad+','+pesounitario+')">Eliminar</button></td></tr>';
				 
					$('#tablaAC').append(fila);
$("#btn_del"+cont).hide();



			});
 
	suma(cantidad, pesounitario);
	 }

});


	function activar(c){

 $('#btn_del'+c).show();

 }

 function desactivar(c){

 $('#btn_del'+c).hide();

 }

//ELIMINA DETALLES DE LA COMPRA
function eliminar(id, cantidad, puni){
 $.post("compras/eliminarDetalleCompra",
		 {
				numero: id
			 
		 },
	function(data){
var p = JSON.parse(data);

			$.each(p, function(i, item){
				
				if (item.alicuota == "No Gravado"){

total1 =   total1 - cantidad * puni;
document.getElementById("ivaNo").innerHTML = "$"+" "+parseFloat(total1).toFixed(2);
}


if (item.alicuota == "21,0%"){
 total2 =  parseFloat(total2) - ((cantidad * parseFloat(puni)) * 21.0) / 100  ;
gravado =  parseFloat(gravado) - (cantidad * parseFloat(puni)) ;
document.getElementById("iva2").innerHTML = "$"+" "+parseFloat(total2).toFixed(2);


}

if (item.alicuota == "10,5%"){
 total3 =parseFloat(total3) - ((cantidad * parseFloat(puni)) * 10.5) / 100  ;
gravado = parseFloat(gravado) - (cantidad * parseFloat(puni));
document.getElementById("iva1").innerHTML = "$"+" "+parseFloat(total3).toFixed(2);

}

if (item.alicuota == "27,0%"){
 total4 = parseFloat(total4) - ((cantidad * parseFloat(puni) * 27.0) / 100) ;
gravado = parseFloat(gravado) - (cantidad * parseFloat(puni));
document.getElementById("iva3").innerHTML = "$"+" "+parseFloat(total4).toFixed(2);

}

document.getElementById("grav").innerHTML = "$"+" "+parseFloat(gravado).toFixed(2);




resultado = parseFloat(total4) + parseFloat(total2) + parseFloat(total3) + parseFloat(gravado) + parseFloat(total1);


 document.getElementById("tot").innerHTML = "$"+" "+parseFloat(resultado).toFixed(2);



			});

			});
 
 $('#'+id).remove();

 }


//REGISTRA UNA COMPRA
function registrarCompras(id){
	var numero = "";
	var pVenta = "";
	var proveedor = "";


		var now = new Date();

		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today =  now.getFullYear() + "-" + (month) +"-"+ (day);
		

				 numero=$('#num').val();
				 pVenta=$('#puntoVenta').val();
				 proveedor=$('#proveedor').val();
				var fContab=$('#datepicker2').val();
				var fComprobante=$('#fComprobante').val();
				var vencimiento=$('#datepicker1').val();
				var tipoProducto=$('#tipoP').val();
				var comprobante=$('#comprobante').val();
				var tipoFactura=$('#tipoF').val();
				var formaPago =$('#formaPago').val();

if(fila != "" && proveedor != "" && pVenta != "" && numero != ""){

		 $.post("compras/registrarCompra",
		 {

					numero: numero,
					pVenta: pVenta,
					proveedor: ''+idProveedor+'',
					fContab: ''+fContab+'',
					fComprobante: ''+fComprobante+'',
					vencimiento: ''+vencimiento+'',
					tipoProducto: ''+tipoProducto+'',
					tipoFactura: ''+tipoFactura+'',
					comprobante: ''+comprobante+'',
					fCarga: ''+today+'',
					resultado: resultado.toFixed(2),
					formaPago: ''+formaPago+''

			 
		 },
	function(data){

		if(data == 1){
			alert("La compra se guardo con exito");

			if(id == "btnAceptarNuevo"){
			 document.getElementById("proveedor").value = "";
document.getElementById("fComprobante").value = "";
document.getElementById("datepicker1").value = "";
document.getElementById("num").value = "";
document.getElementById("datepicker2").value = "";
document.getElementById("producto").value = "";
document.getElementById("uni").value = "";
document.getElementById("cantidad").value = "";
document.getElementById("comprobante").value = "";
document.getElementById("puntoVenta").value = "";
 $('.selected').remove();
 document.getElementById("ivaNo").innerHTML = "$0,00";
document.getElementById("iva1").innerHTML = "$0,00";
document.getElementById("iva2").innerHTML = "$0,00";
document.getElementById("iva3").innerHTML = "$0,00";
document.getElementById("grav").innerHTML = "$0,00";
document.getElementById("tot").innerHTML = "$0,00";
		 }else{

				 window.location="compras";

}
		}else{
	alert("No se pudo guardar la compra");
}
	

			});
	

		 }else{
	alert("Faltan completar campos")
}


}


	//HABILITA CAJA DE TEXT Y BOTON PARA ACTUALIZAR COMPRA      
 $("#btn_editarCompra").click(function(){
	 
	habilitar();
	});


//ACTUALIZA COMPRA
 $("#btn_editarAceptar").click(function(){

		var eFcontabilizacion=$('#eFcontabilizacion').val();
	var eFComprobante=$('#eFcomprobante').val();
		var eFormaPago=$('#eFormaPago').val();
		var idCompra = id;

if(eFcontabilizacion == "" || eFComprobante == "" || eFormaPago == ""){
	alert("Ingrese los campos solicitados");
}
else{
		$.post("compras/actualizarCompra",
		 {
				idCompra:idCompra,
				eFComprobante:''+eFComprobante+'',
				eFcontabilizacion:''+eFcontabilizacion+'',
				eFormaPago:''+eFormaPago+''
		 },
	function(data){

		alert(data);

			});

		desabilitar()
		}
	});


 function habilitar(){
	document.getElementById("btn_editarAceptar").disabled = false;
	document.getElementById("eFcomprobante").disabled = false;
	document.getElementById("eFcontabilizacion").disabled = false;
	document.getElementById("eFormaPago").disabled = false;
 }

 function desabilitar(){
	document.getElementById("btn_editarAceptar").disabled = true;
	document.getElementById("eFcomprobante").disabled = true;
	document.getElementById("eFcontabilizacion").disabled = true;
	document.getElementById("eFormaPago").disabled = true;
 }

//ELIMINA UNA COMPRA
 $("#btn_editarEliminar").click(function(){

	var idCompra = id;

 $.post("compras/eliminarCompra",
		 {
				idCompra:idCompra
		 },
	function(data){

		alert(data);
$('#eFcomprobante').val("");
			 $('#eFcontabilizacion').val("");
			 $('#eFormaPago').val("");
			 document.getElementById("eProveedor").innerHTML = "";
			 document.getElementById("eComprobante").innerHTML = "";
			document.getElementById("eFCarga").innerHTML = "";
			document.getElementById("eTotal").innerHTML = "";
			document.getElementById("eCondicion").innerHTML = "";

			
			$("#tablaEd").find("tr:gt(0)").remove();

			});
 });



//AGREGA CEROS EN COMPROBANTE Y PUNTO DE VENTA
function agregarCeros(numero, tipo){
	var result = 0;
	var lengthComp = numero.length
if(tipo == 1 && lengthComp < 8){
				

			 result = numero.padStart(8, "0");

			 }else if(tipo == 2 && lengthComp < 4){
				result = numero.padStart(4, "0");
			 } else{
				result = numero;
			 }
 return result;
}



function fechasFormato(fechas){

	 var cadena = fechas.split('-').reverse().join('/');

		return cadena;
}

$("#Imprimir").click(function() {
	
	var tipoFiltro = $('#tipoFiltro').val();
	var tipoComprobante = $('#compLib').val();
	var fechaDesde = $('#dtDesdeLib').val();
	var fechaHasta = $('#dtHastaLib').val();
	var orden = $('#ordenar').val();
	
 $.post("imprimir/index",
		 {
			
		 },
	function(data){

		 

			});
window.location = "imprimir";

});