//CARGA TABLA PRINCIPAL DEL MODULO COMPRA
var idTablaAC = 3;
var id = 0;
var fechaCarga = "";
var totalComprobante = 0;
var totalPVenta = 0;
var cuitProveedor = "";
var ir;
$.post("compras/getCompras",
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
                                                fechaCarga = fechasFormato(item.fCarga);

                                                var totalComprobante = agregarCeros(item.comprobante, 8);
                                                var puntoVenta = agregarCeros(item.puntoVenta, 4);
                                                var fComprobante = fechasFormato(item.fComprobante);
                                                var fVencimiento = fechasFormato(item.ven);
                                                var fPago = "";
                                                var saldotabla = "";
                                                if (item.formaPago == "Cuenta corriente") {
                                                                fPago = fVencimiento;
                                                                if (item.condicion == "impaga") {
                                                                                saldotabla = "";
                                                                } else {
                                                                                saldotabla = "Pagado";
                                                                }
                                                } else {
                                                                fPago = "Contado";
                                                                // saldotabla = "Pagado";
                                                }
                                                $('#tablaCompras').append(


                                                                '<tr id="' + ifv + '" data-cuit="' + item.cuit + '" data-numero="' + item.comprobante + '">' +
                                                                '<td>' + fechaCarga + '</td>' +
                                                                '<td>' + fComprobante + '</td>' +
                                                                '<td>' + item.movimientos + '</td>' +
                                                                '<td>' + item.tipoComprobante + '' + item.tipoFactura + ''+puntoVenta+'-' + totalComprobante + '</td>' +
                                                                '<td>' + item.apeynom + '</td>' +
                                                                '<td>$' + item.total + '</td>' +
                                                                '<td>' + fPago + '</td>' +
                                                                '<td>' + saldotabla + '</td>' +
                                                                '</tr>'



                                                );
                                                if (today > item.ven && fPago != "Contado" && item.condicion != "pagado") {

                                                                document.getElementById(ifv).className = "table-danger";

                                                }

                                                ifv++;
                                });
//                              //MUSTRA INFORMACION DE LA COMPRA
                                $("#tablaCompras tr").click(function() {

                                                // var i = $('tr').index(this);

                                                var cuit = $(this).data("cuit");
                                                var i = $(this).attr("id");
                                                //var numero = document.getElementById('tablaCompras').rows[i].cells[3].innerText.substr(8);
                                                var numero = $(this).data("numero");
                                                modalDetalleCompra(cuit, numero);

                                });

                });

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
var i = 0;

//AÑADE PRODUCTOS DE LA COMPRA
// $("#btn_añadir").click(function() {
function agregarProducto(idProducto, producto, cantidad, alicuota){
                
                
                let subtotal = 0;
                // var producto = $('#producto').val();
                // cantidad = $('#cantidad').val();
                precio = $('#uni').val();
                // alicuota = $('#alic').val();
                subtotal = precio * cantidad;
                

                if (cantidad == "" || alicuota == "" || producto == "") {
                                alert("Ingrese los campos solicitados");
 
                                
                } else {


                                
                                i += 1;
                                
                                fila = '<tr onMouseOver="activarC(' + i + ')" onMouseOut="desactivarC(' + i + ')" class="selected" id=fila' + i +'><td data-producto =' + idProducto +' style="text-align: right;">' + cantidad + '</td><td>' + producto + 
                                '</td><td style="text-align: right;">' + alicuota + '</td><td><label class="d-block float-right" ondblclick="modificarPrecioCompra(' + i +');" id="p' + i +'">$'+precio +' </label><input class="d-none float-right form-control-sm col-sm-2" style="height: 20px;" onchange="modificarLabel(' + i +');" type="text" id=textPrecio' + i +' value="">'+
                                '</td><td><div style="position: relative;"><div style="text-align: right;">$' + subtotal + 
                                '<div style="position: absolute; top:-5px; opacity: 0.8;" class="m-1"><button  class="btn btn-danger btn-sm" style="padding:1px;" type="button"  id="btn_del'+i+'" onclick="eliminarFC('+ i +', '+ cantidad +', '+ precio +', \'' + alicuota + '\')">Eliminar</button></div></div></div></td></tr>';

                                $('#tablaAC').append(fila);
                                $("#btn_del" + i).hide();
                                
                                // $("#tablaAC td:eq(3)").click(function() {

                                //              alert(document.getElementById("p").innerHTML);

                                // });
                                // 
                                if(precio != ""){
                                      
                                suma(cantidad, precio, alicuota);
                                }else{
                                        
                                        document.getElementById("p"+i).innerHTML = "$0,00";
                                        document.getElementById('tablaAC').rows[i].cells[4].innerText = "$0,00";
                                        document.getElementById('tablaAC').rows[i].cells[4].style.cssText = "text-align: right;";
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
let cantidad = document.getElementById('tablaAC').rows[i].cells[0].innerText.toString();
let alicuota = document.getElementById('tablaAC').rows[i].cells[2].innerText;

let subtotal = precio * cantidad;


document.getElementById('tablaAC').rows[i].cells[4].innerText = "$"+subtotal;
suma(cantidad, precio, alicuota);

}




//REGISTRA UNA COMPRA
function registrarCompras(id) {
    
                var numero = "";
                var pVenta = "";
                var proveedor = "";
                // var now = new Date();
                // var day = ("0" + now.getDate()).slice(-2);
                // var month = ("0" + (now.getMonth() + 1)).slice(-2);
                // var today =  now.getFullYear() + "-" + (month) +"-"+ (day);

                numero = $('#num').val();
                pVenta = $('#puntoVenta').val();
                proveedor = $('#proveedor').val();
                var fContab = $('#datepicker2').val();
                var fComprobante = $('#fComprobante').val();
                var vencimiento = $('#datepicker1').val();
                var tipoProducto = $('#tipoP').val();
                var comprobante = $('#comprobante').val();
                var tipoFactura = $('#tipoF').val();
                var formaPago = $('#formaPago').val();
                if (fila != "" && proveedor != "" && pVenta != "" && numero != "") {
                                $.post("compras/registrarCompra", {
                                                                numero: numero,
                                                                pVenta: pVenta,
                                                                proveedor: '' + idProveedor + '',
                                                                fContab: '' + fContab + '',
                                                                fComprobante: '' + fComprobante + '',
                                                                vencimiento: '' + vencimiento + '',
                                                                tipoProducto: '' + tipoProducto + '',
                                                                tipoFactura: '' + tipoFactura + '',
                                                                comprobante: '' + comprobante + '',
                                                                // fCarga: ''+today+'',
                                                                resultado: resultado.toFixed(2),
                                                                formaPago: '' + formaPago + '',
                                                                comprobanteFacturar: comprobanteFacturar

                                                },
                                                function(data) {
                                                                
                                                                if (data == 1) {
                                                                        
                                                                                
                                                                                let filaTablaAC = $('#tablaAC tr').length;
               
                                                                                for (i = 1; i <= filaTablaAC; i++) {

                                                                                                var cantidadTabla = document.getElementById('tablaAC').rows[i].cells[0].innerText;
                                                                                                // var descripcionTabla = document.getElementById('tablaAC').rows[i].cells[1].innerText;
                                                                                                // var aliTabla = document.getElementById('tablaAC').rows[i].cells[2].innerText;
                                                                                                var punitarioTabla = document.getElementById('tablaAC').rows[i].cells[3].innerText.substr(1);
                                                                                                var subTotalTabla = document.getElementById('tablaAC').rows[i].cells[4].innerText.substr(1);
                                                                                                // parseFloat(punitarioTabla);
                                                                                                parseFloat(subTotalTabla);
                                                                                                  var idp = $('#tablaAC tr:eq('+i+')').find("td:first-child").data('producto');   
                                                                                                  
                                                                                        

                                                                                                $.post("compras/addDetalleCompra", {

                                                                                                                idCompra: numero,
                                                                                                                cuit: '' + idProveedor + '',
                                                                                                                // producto: '' + descripcionTabla + '',
                                                                                                                cantidad: cantidadTabla,
                                                                                                                pesounitario: punitarioTabla,
                                                                                                                // alicuota: '' + aliTabla + '',
                                                                                                                subtotal: subTotalTabla,
                                                                                                                idProducto: idp,
                                                                                                                comprobanteFacturar: comprobanteFacturar
                                                                                        
                                                                                
                                                                                
                                                                                                });

                                                                                                if(i == filaTablaAC -1){
                                                                                                                if (id == "btnAceptarNuevo") {
                                                                                        
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
                                                                                                // $('.selected').remove();
                                                                                                document.getElementById("ivaNo").innerHTML = "$0,00";
                                                                                                document.getElementById("iva1").innerHTML = "$0,00";
                                                                                                document.getElementById("iva2").innerHTML = "$0,00";
                                                                                                document.getElementById("iva3").innerHTML = "$0,00";
                                                                                                document.getElementById("grav").innerHTML = "$0,00";
                                                                                                ;
                                                                                                alert("La compra se guardo con exito"); 
                                                                                                $("#tablaAC").find("tr:gt(0)").remove();
                                                                                } else {
                                                        
                                                                                                alert("La compra se guardo con exito"); 
                                                                                                $("#tablaAC").find("tr:gt(0)").remove();
                                                                                                window.location = "compras";
                                                                                }
                                                                                        
                                                                                                                                                                                
                                                                                                                                                                                }



                                                                                }


                                                                                

                                                
                                                                              
                                                                                
                                                                       
                                                                } else {

                                                                                alert("No se pudo guardar la compra");
                                                                }

                                                });

                } else {
                                alert("Faltan completar campos");
                }
                
                

                                                                                
                                                                        

                                                                        
                                                                               
                
} //finaliza funcion registro compra



//HABILITA CAJA DE TEXT Y BOTON PARA ACTUALIZAR COMPRA
$("#btn_editarCompra").click(function() {

                habilitar();
});

//ACTUALIZA COMPRA
$("#btn_editarAceptar").click(function() {
                var eFcontabilizacion = $('#eFcontabilizacion').val();
                var eFComprobante = $('#eFcomprobante').val();
                var eFormaPago = $('#eFormaPago').val();
                var idCompra = id;

                if (eFcontabilizacion == "" || eFComprobante == "" || eFormaPago == "") {
                                alert("Ingrese los campos solicitados");
                } else {
                                $.post("compras/actualizarCompra", {
                                                                idCompra: idCompra,
                                                                eFComprobante: '' + eFComprobante + '',
                                                                eFcontabilizacion: '' + eFcontabilizacion + '',
                                                                eFormaPago: '' + eFormaPago + ''
                                                },
                                                function(data) {
                                                                alert(data);
                                                });
                                desabilitar()
                }
});

function habilitar() {
                document.getElementById("btn_editarAceptar").disabled = false;
                document.getElementById("eFcomprobante").disabled = false;
                document.getElementById("eFcontabilizacion").disabled = false;
                document.getElementById("eFormaPago").disabled = false;
}

function desabilitar() {
                document.getElementById("btn_editarAceptar").disabled = true;
                document.getElementById("eFcomprobante").disabled = true;
                document.getElementById("eFcontabilizacion").disabled = true;
                document.getElementById("eFormaPago").disabled = true;
}

//ELIMINA UNA COMPRA
$("#btn_editarEliminar").click(function() {
                var idCompra = id;
                $.post("compras/eliminarCompra", {
                                                idCompra: idCompra
                                },
                                function(data) {
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

/**
 * @param  {string} - recibe la fecha con formato yyyy-mm-dd
 * @return {string} - retorna la fecha en formato dd/mm/yyyy
 */
function fechasFormato(fechas) {
                var cadena = fechas.split('-').reverse().join('/');
                return cadena;
}


// $("#Imprimir").click(function() {

//              var tipoFiltro = $('#tipoFiltro').val();
//              var tipoComprobante = $('#compLib').val();
//              var fechaDesde = $('#dtDesdeLib').val();
//              var fechaHasta = $('#dtHastaLib').val();
//              var orden = $('#ordenar').val();

//              $.post("imprimir/index", {

//                              },
//                              function(data) {

//                              });
//              window.location = "imprimir";
// });

$("#btn_editarAceptar").click(function() {

                var eFcontabilizacion = $('#eFcontabilizacion').val();
                var eFComprobante = $('#eFcomprobante').val();
                var eFormaPago = $('#eFormaPago').val();
                var idCompra = id;

                if (eFcontabilizacion == "" || eFComprobante == "" || eFormaPago == "") {
                                alert("Ingrese los campos solicitados");
                } else {
                                $.post("compras/actualizarCompra", {
                                                                idCompra: idCompra,
                                                                eFComprobante: '' + eFComprobante + '',
                                                                eFcontabilizacion: '' + eFcontabilizacion + '',
                                                                eFormaPago: '' + eFormaPago + ''
                                                },
                                                function(data) {
                                                                alert(data);
                                                });
                                desabilitar()
                }
});

var valor;
var compRem;
var nomProveedor;

$.post("compras/getNombrePendiente",
                                 
                                 

                                 function(data) {
                                        $('#cboProveedor').append(

                                        '<option value="0">Seleccionar Proveedor</option>'

                                     
                                                                
                                                );
                                         var p = JSON.parse(data);
                                         $.each(p, function(i, item) {
                                             

                                                $('#cboProveedor').append(


                                        '<option value='+item.cuit+'>'+item.nombre+' :: '+item.cuenta+' remitos pendientes</option>'
                                                                
                                                );

                                       
                                        
                                         });

                                });
                                

        $('#cboProveedor').change(function(){ 
    valor = $(this).val();

   $("#tablaRem").find("tr:gt(0)").remove();

   $.post("compras/getRemitosPendientes",{
                                 
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
                                           '<input data-id='+ifv+' type="checkbox" id='+item.comprobante+' class=cboP>'+
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


 $( '.cboP').on( 'click', function() {
        //$("#tablaDetalleRemImputar").find("tr:gt(0)").remove();
        $("#tablaDetalleRem").find("tr:gt(0)").remove();
        
      //  document.getElementById("datos").className = "d-block";
        
        if( $(this).is(':checked') ){
                
                compRem =$(this).attr("id");
                ir =$(this).data("id");

                var fecha = document.getElementById('tablaRem').rows[ir].cells[1].innerText;
                var comp = document.getElementById('tablaRem').rows[ir].cells[2].innerText;
                document.getElementById('tablaRem').rows[ir].style.cssText  = 'background-color: #03A703;';

               $.post("remito/getDatosDetallesRemito",{
                                 
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



$("#btnFacturar").click(function() {

comprobanteFacturar = compRem;
let cantidadImputar;

$("#tablaAC").find("tr:gt(0)").remove();
        $.post("remito/getDatosDetallesRemito", {
                                                
                                                id: compRem,
                                                cuit: valor
                                                },
                                                
                                                function(data) {
                                                        
                                                        let ici = 1;                    
                                                        var pe = JSON.parse(data);
                                                        $.each(pe, function(i, item) {

                                                         cantidadImputar = document.getElementById('tablaDetalleRem').rows[ici].cells[0].innerText;

                                                         agregarProducto(item.id, item.nombre, cantidadImputar, item.alicuota);
                                
                                                        ici++;
                                                        });

                                                });


idProveedor = valor;
$("#proveedor").val(nomProveedor);
$("#myModal").modal("show");
        
 });


$("#excel").click($.post("excel/exportar_excel1"));

          // tipoComprobante= $('#compLib').val();
          // tipoFiltro = $('#tipoFiltro').val();
          // fDesde = $('#dtDesdeLib').val(); 
          // fHasta = $('#dtHastaLib').val(); 
          // Orden = $('#ordenar').val(); 
          // selectF = $('#tipoFechaLibro').val(); 

          // $.post("excel/exportar_excel", {
          //                                         tipoComprobante: '' + tipoComprobante+ '',
          //                                         tipoFiltro: '' + tipoFiltro+ '',
          //                                         fDesde: '' + fDesde + '',
          //                                         fHasta: '' + fHasta + '',
          //                                         Orden: '' + Orden + '',
          //                                         selectF: '' + selectF + ''

          //                                       });

          


