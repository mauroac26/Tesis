//CARGA TABLA PRINCIPAL DEL MODULO VENTAS

var id = 0;
var fechaCarga = "";
var totalComprobante = 0;
var totalPVenta = 0;
var cuitProveedor = "";
var ir;
$.post("ventas/getVentas",
                function(data) {
                        
                                var p = JSON.parse(data);
                                var condicion;
                                var estilo;
                                var ifv = 1;
                                var now = new Date();
                                var day = ("0" + now.getDate()).slice(-2);
                                var month = ("0" + (now.getMonth() + 1)).slice(-2);
                                var today = now.getFullYear() + "-" + (month) + "-" + (day);



                                $.each(p, function(i, item) {
                                                fechaCarga = fechasFormato(item.fecha);

                                                var totalComprobante = agregarCeros(item.comprobante, 8);
                                                
                                                var fVencimiento = fechasFormato(item.vencimiento);
                                                var fPago = "";
                                                var saldotabla = "";

                                                if (item.formaPago == "Cuenta corriente") {
                                                                fPago = 'Vto.' + ' ' + fVencimiento;
                                                                if (item.condicion == "no cobrado") {
                                                                                saldotabla ='$' + item.total;
                                                                } else {
                                                                                saldotabla = "cobrado";
                                                                                fPago = item.formaPago
                                                                }
                                                } else {
                                                                fPago = item.formaPago;
                                                                saldotabla = item.condicion;
                                                }
                                                $('#tablaVentas').append(


                                                                '<tr id="' + ifv + '" data-cuit="' + item.cuit + '">' +
                                                                '<td>' + fechaCarga + '</td>' +

                                                                 '<td>' + item.nombre + '</td>' +
                                                                '<td>' + item.puntoVenta + '-' + totalComprobante + '</td>' +
                                                               
                                                                '<td>$' + item.total + '</td>' +
                                                                '<td>'+ fPago + '</td>' +
                                                                '<td>' + saldotabla + '</td>' +
                                                                '</tr>'



                                                );
                                                if (today > item.vencimiento && fPago != "Contado" && item.condicion != "pagado") {

                                                                document.getElementById(ifv).className = "table-danger";

                                                }

                                                ifv++;
                                });
//                              //MUSTRA INFORMACION DE LA VENTA
                                $("#tablaVentas tr").click(function() {


                                                let cuit = $(this).data("cuit");
                                                let i = $(this).attr("id");
                                                let numero = document.getElementById('tablaVentas').rows[i].cells[2].innerText.substr(13);
                                                modalDetalleVenta(cuit, numero);
                                               

                                });

                });



var cantidad;
var fila = "";
var i = 0;
//AÑADE PRODUCTOS DE LA COMPRA
// $("#btn_añadir").click(function() {
function agregarProductoVenta(idProducto, producto, cantidad, alicuota){
                
                
                let subtotal = 0;
                // var producto = $('#producto').val();
                // cantidad = $('#cantidad').val();
                precio = $('#uniVenta').val();
                // alicuota = $('#alic').val();
                subtotal = precio * cantidad;
                

                if (cantidad == "" || alicuota == "" || producto == "") {
                                alert("Ingrese los campos solicitados");
 
                                
                } else {


                                
                                i += 1;


                                // fila = '<tr onMouseOver="activarC(' + i + ')" onMouseOut="desactivarC(' + i + ')" class="selected" id=fila' + i +'><td data-producto =' + idProducto +' style="text-align: right;">' + cantidad + '</td><td>' + producto + 
                                // '</td><td style="text-align: right;">' + alicuota + '</td><td>$'+precio+' </td>'+
                                // '<td><div style="position: relative;"><div style="text-align: right;">$' + subtotal + 
                                // '<div style="position: absolute; top:-5px; opacity: 0.8;" class="m-1"><button  class="btn btn-danger btn-sm" style="padding:1px;" type="button"  id="btn_del'+i+'" onclick="eliminarFC('+ i +', '+ cantidad +', '+ precio +', \'' + alicuota + '\')">Eliminar</button></div></div></div></td></tr>';
                                 
                                 fila = '<tr onMouseOver="activarC(' + i + ')" onMouseOut="desactivarC(' + i + ')" class="selected" id=fila' + i +'><td data-producto =' + idProducto +' style="text-align: right;">' + cantidad + '</td><td>' + producto + 
                                '</td><td style="text-align: right;">' + alicuota + '</td><td><label class="d-block float-right" ondblclick="modificarPrecioCompra(' + i +');" id="p' + i +'">$'+precio +' </label><input class="d-none float-right form-control-sm col-sm-2" style="height: 20px;" onchange="modificarLabel(' + i +');" type="text" id=textPrecio' + i +' value="">'+
                                '<td><div style="position: relative;"><div style="text-align: right;">$' + subtotal + 
                                '<div style="position: absolute; top:-5px; opacity: 0.8;" class="m-1"><button  class="btn btn-danger btn-sm" style="padding:1px;" type="button"  id="btn_del'+i+'" onclick="eliminarFC('+ i +', '+ cantidad +', '+ precio +', \'' + alicuota + '\')">Eliminar</button></div></div></div></td></tr>';


                                $('#tablaAV').append(fila);
                                $("#btn_del" + i).hide();
                                
                                
                                      
                                //suma(cantidad, precio, alicuota);
                                
                                     if(precio != ""){
                                      
                                suma(cantidad, precio, alicuota);
                                }else{
                                        
                                        document.getElementById("p"+i).innerHTML = "$0,00";
                                        document.getElementById('tablaAV').rows[i].cells[4].innerText = "$0,00";
                                        document.getElementById('tablaAV').rows[i].cells[4].style.cssText = "text-align: right;";
                                }       
                                
                }

// // });
}

function modificarPrecioCompra(i){

let precio = document.getElementById("p"+i).innerText.substr(1);
document.getElementById("textPrecio"+i).className = "float-right col-sm-2 d-block form-control-sm";
document.getElementById("p"+i).className = "d-none float-right";
document.getElementById("textPrecio"+i).value = precio;

}

function modificarLabel(i){

        let precio = document.getElementById("textPrecio"+i).value;
        document.getElementById("p"+i).innerHTML = "$"+precio;
        document.getElementById("textPrecio"+i).className = "float-right col-sm-2 d-none form-control-sm";
document.getElementById("p"+i).className = "d-block float-right";
let cantidad = document.getElementById('tablaAV').rows[i].cells[0].innerText.toString();
let alicuota = document.getElementById('tablaAV').rows[i].cells[2].innerText;

let subtotal = precio * cantidad;


document.getElementById('tablaAV').rows[i].cells[4].innerText = "$"+subtotal;
suma(cantidad, precio, alicuota);

}

//REGISTRA UNA COMPRA
function registrarVenta(id) {
    
                var numero = "";
                var pVenta = "";
                var cliente = "";
                
                numero = $('#numVenta').val();
                pVenta = $('#puntoVentaV').val();
                cliente = $('#cliente').val();
               // var vencimiento = $('#datepicker1').val();
               var fecha = $('#fechaVenta').val();
                var formaPago = $('#formaPagoVenta').val();
                


                if (fila != "" && cliente != "" && pVenta != "" && numero != "") {
                                $.post("ventas/registrarVenta", {
                                                               numero: numero,
                                                               pVenta: ''+pVenta+'',
                                                                cliente: '' + idCliente + '',
                                                                fecha: '' + fecha + '',
                                                                //vencimiento: '' + vencimiento + '',
                                                                resultado: resultado.toFixed(2),
                                                                formaPago: '' + formaPago + '',
                                                                comprobanteFacturar: comprobanteFacturar
                                                },
                                                function(data) {
                                                                 
                                                                if (data == 1) {
                                                                        
                                                                              
                                                                                let filaTablaAV = $('#tablaAV tr').length;
               
                                                                                for (i = 1; i <= filaTablaAV; i++) {

                                                                                                var cantidadTabla = document.getElementById('tablaAV').rows[i].cells[0].innerText;
                                                                                                // var descripcionTabla = document.getElementById('tablaAV').rows[i].cells[1].innerText;
                                                                                                // var aliTabla = document.getElementById('tablaAV').rows[i].cells[2].innerText;
                                                                                                var punitarioTabla = document.getElementById('tablaAV').rows[i].cells[3].innerText.substr(1);
                                                                                                var subTotalTabla = document.getElementById('tablaAV').rows[i].cells[4].innerText.substr(1);
                                                                                                // parseFloat(punitarioTabla);
                                                                                                parseFloat(subTotalTabla);
                                                                                                  var idp = $('#tablaAV tr:eq('+i+')').find("td:first-child").data('producto');   
                                                                                                  
                                                                                       

                                                                                                $.post("ventas/addDetalleVenta", {

                                                                                                                idVenta: numero,
                                                                                                                //cuit: '20-31987654-4',
                                                                                                                // producto: '' + descripcionTabla + '',
                                                                                                                cantidad: cantidadTabla,
                                                                                                                pesounitario: punitarioTabla,
                                                                                                                // alicuota: '' + aliTabla + '',
                                                                                                                subtotal: subTotalTabla,
                                                                                                                idProducto: idp
                                                                                                               // comprobanteFacturar: comprobanteFacturar
                                                                                        },
                                                                                               function(data) {
                                                                            
                                                                                                });

                                                                                                if(i == filaTablaAV -1){
                                                                                                                if (id == "btnAceptarNuevo") {
                                                                                        
                                                                                                document.getElementById("cliente").value = "";
                                                                                                
                                                                                                document.getElementById("fechaVenta").value = "";
                                                                                                document.getElementById("numVenta").value = "";
                                                                                               
                                                                                                document.getElementById("productoVenta").value = "";
                                                                                                document.getElementById("uniVenta").value = "";
                                                                                                document.getElementById("cantidadVenta").value = "";
                                                                                                
                                                                                                document.getElementById("puntoVenta").value = "";
                                                                                                // $('.selected').remove();
                                                                                                document.getElementById("ivaNo").innerHTML = "$0,00";
                                                                                                document.getElementById("iva1").innerHTML = "$0,00";
                                                                                                document.getElementById("iva2").innerHTML = "$0,00";
                                                                                                document.getElementById("iva3").innerHTML = "$0,00";
                                                                                                document.getElementById("grav").innerHTML = "$0,00";
                                                                                                
                                                                                                alert("La venta se guardo con exito"); 
                                                                                                $("#tablaAV").find("tr:gt(0)").remove();
                                                                                } else {
                                                        
                                                                                                alert("La venta se guardo con exito"); 
                                                                                                $("#tablaAV").find("tr:gt(0)").remove();
                                                                                                window.location = "ventas";
                                                                                }
                                                                                        
                                                                                                                                                                                
                                                                             }



                                                                                }


                                                                                

                                                
                                                                              
                                                                                
                                                                       
                                                                } else {

                                                                                alert("No se pudo guardar la venta");
                                                                }

                                                });

                } else {
                                alert("Faltan completar campos");
                }
                
                                                                                    
} 

//REMITOS VENTA PENDIENTES

var valor;
var compRem;
var nomProveedor;

$.post("ventas/getNombrePendiente",
                                 
                                 

                                 function(data) {

                                        $('#cboClientes').append(

                                        '<option value="0">Seleccionar Clientes</option>'

                                     
                                                                
                                                );
                                         var p = JSON.parse(data);
                                         $.each(p, function(i, item) {
                                             

                                                $('#cboClientes').append(


                                        '<option value='+item.cuit+'>'+item.nombre+' :: '+item.cuenta+' remitos pendientes</option>'
                                                                
                                                );

                                       
                                        
                                         });

                                });
                                

        $('#cboClientes').change(function(){ 
    valor = $(this).val();

   $("#tablaRem").find("tr:gt(0)").remove();

   $.post("ventas/getRemitosPendientes",{
                                 
                                 cuit: valor
                                 },
                                 function(data) {
                                        
                                         var ifv = 1;
                                         var p = JSON.parse(data);
                                         $.each(p, function(i, item) {

                                         fechaCarga = fechasFormato(item.fecha);
                                         comprobante = agregarCeros(item.comprobante, 8);
                                        nomProveedor = item.nombre;

                                         $('#tablaRem').append(
                                           
                                           '<tr style="height:15px;">'+
                                           '<td>'+
                                           '<input data-id='+ifv+' type="checkbox" id='+item.comprobante+' class=cboV>'+
                                           '</td>' +
                                           '<td class="text-right">'+
                                           '<small>' + fechaCarga + '<small>'+
                                           '</td>'+
                                           '<td>' + 
                                           '<small>'+item.tipoComprobante + '' + item.tipo + '' + comprobante + '<small>'+
                                           '</td>' +
                                           '</tr>'



                                        );

                                       ifv++;
                                        
                                         });


 $( '.cboV').on( 'click', function() {
       
       
        $("#tablaDetalleRem").find("tr:gt(0)").remove();
        
      
        
        if( $(this).is(':checked') ){
                
                compRem =$(this).attr("id");
                ir =$(this).data("id");

                var fecha = document.getElementById('tablaRem').rows[ir].cells[1].innerText;
                var comp = document.getElementById('tablaRem').rows[ir].cells[2].innerText;
                document.getElementById('tablaRem').rows[ir].style.cssText  = 'background-color: #03A703;';

               $.post("remito/getDatosDetallesRemitoVenta",{
                                 
                                 id: compRem,
                                 cuit: valor
                                 },
                                 function(data) {
                                        
                                          $('#tablaDetalleRemImputar').append(
                                           
                                           '<tr>'+
                                           '<td class="bg-secondary text-white" colspan=3>'+
                                          
                                           '<small>'+fecha+" " + "::" + " " + comp+ '<small>'+
                                           '</td>' +
                                           '</tr>'



                                        );

                                         let i = 1;

                                         var p = JSON.parse(data);
                                         $.each(p, function(i, item) {
                                         
                                         
                                             
                                         $('#tablaDetalleRemImputar').append(
                                           
                                           '<tr style="background-color: #03A703;">'+
                                           '<td class="text-right" style="width:40px;">'+
                                           '<small>' + item.cantidad + '<small>'+
                                           '</td>' +
                                           '<td style="width:40px;">'+
                                           '<input style="height: 18px; width:40px; font-size: 13px; text-align: right;" onchange="modificarLabelCantidad(' + i +');" type="text" id=txtCantidad' + i +' value='+item.cantidad+'>'+
                                           '</td>'+
                                           '<td>'+ 
                                           '<small>'+item.nombre + '</small>'+
                                           '</td>' +
                                           '</tr>'



                                        );

                                        $('#tablaDetalleRem').append(
                                           
                                           '<tr>'+
                                           '<td>'+
                                           '<label class="float-right" id=pd' + i +'>' + item.cantidad + '</label>'+
                                           //'<small>' + item.cantidad + '<small>'+
                                           '</td>'+
                                           '<td>' + 
                                           '<small>'+item.nombre + '<small>'+
                                           '</td>' +
                                           '</tr>'



                                        );
                                        i++;
                                         });

                                });
        } else {
                
                document.getElementById('tablaRem').rows[ir].style.cssText  = 'background-color: none;';
                $("#tablaDetalleRemImputar").find("tr:gt(0)").remove();
                $("#tablaDetalleRem").find("tr:gt(0)").remove();
        }
});

                                });
});


$("#btnFacturarVentas").click(function() {

comprobanteFacturar = compRem;
let cantidadImputar;

$("#tablaAV").find("tr:gt(0)").remove();
        $.post("remito/getDatosDetallesRemitoVenta", {
                                                
                                                id: compRem,
                                                cuit: valor
                                                },
                                                
                                                function(data) {
                                                        
                                                        let ici = 1;                    
                                                        var pe = JSON.parse(data);
                                                        $.each(pe, function(i, item) {

                                                         cantidadImputar = document.getElementById('tablaDetalleRem').rows[ici].cells[0].innerText;

                                                         agregarProductoVenta(item.id, item.nombre, cantidadImputar, item.alicuota);
                                
                                                        ici++;
                                                        });

                                                });


idCliente = valor;
$("#cliente").val(nomProveedor);
$("#modalVenta").modal("show");
        
 });