//REGISTRA REMITO
var totalCantidad = 0;
var cuit;
var numero;
var nomP;
var comprobanteFacturar = 0;
var now = new Date("Y-m-d");
$.post("remito/getRemito",

        function(data) {
           

                     var p = JSON.parse(data);
                     
                     
                 
                var ifv = 1;



                $.each(p, function(i, item) {
                        var fechaCarga = fechasFormato(item.fecha);

                        var totalComprobante = agregarCeros(item.comprobante, 8);
                      
                        
                        $('#tablaStock').append(


                                '<tr id="' + ifv + '" data-cuit="' + item.cuit + '">' +
                                '<td>' + fechaCarga + '</td>' +
                                '<td>Compra</td>' +
                                '<td>' + item.apeynom + '</td>' +
                                '<td>' + item.tipoComprobante + '' + item.tipo + '' + totalComprobante + '</td>' +
                                '<td>' + item.domicilio + '</td>' +
                                '<td>Sucursal</td>' +
                                
                                '</tr>'



                        );
                        

                       ifv++;
                });
                //MUSTRA INFORMACION DEL REMITO
                $("#tablaStock tr").click(function() {


                     cuit = $(this).data("cuit");
                     var i = $(this).attr("id");
                     numero = document.getElementById('tablaStock').rows[i].cells[3].innerText.substr(8);
                     modalDetalleRemito(cuit, numero);


                });

        });





function registrarRemito(id) {
    
    var numero = "";
    var pVenta = "";
    var proveedor = "";


    numero = $('#numRemito').val();
    pVenta = $('#pvRemito').val();
    proveedor = $('#provRem').val();
    var fecha = $('#fechaRec').val();
    var fechaRemito = $('#fechaRemito').val();
    var comprobante = $('#comprobanteRem').val();
    var tipoRemito = $('#tipoFrem').val();
    var obsRemito = $('#obsRemito').val();
    var pfRemito = $('input:radio[name=rbOptions]:checked').val();
    

    if (filaRem != "" && proveedor != "" && pVenta != "" && numero != "") {
                    $.post("remito/registrarRemito", {
                                                    numero: numero,
                                                    pVenta: pVenta,
                                                    proveedor: '' + idProveedor + '',
                                                    fecha: '' + fecha + '',
                                                    fechaRemito: '' + fechaRemito + '',
                                                    comprobante: '' + comprobante + '',
                                                    tipoRemito: '' + tipoRemito + '',
                                                    cantidad: totalCantidad,
                                                    obsRemito: obsRemito,
                                                    pfRemito: pfRemito

                                    },
                                    function(data) {
                                        
                                        
                                                    if (data == 1) {
                                                                    

                                                                    let filaTablaDR = $('#tablaDetRemito tr').length;
   
                                                                        for (i = 1; i <= filaTablaDR; i++) {

                                                                                        let cantidadTabla = document.getElementById('tablaDetRemito').rows[i].cells[0].innerText;
                                                                                        // var producto = document.getElementById('tablaDetRemito').rows[i].cells[1].innerText;
                                                                                        let idp = $('#tablaDetRemito tr:eq('+i+')').find("td:first-child").data('producto');


                                                                                        $.post("remito/detalleRemito", {

                                                                                                        idRemito: numero,
                                                                                                        cuit: '' + idProveedor + '',
                                                                                                        idProducto: idp,
                                                                                                        cantidad: cantidadTabla

                                                                                        });
                                                                                        

                                                                                        if(i == filaTablaDR -1){
                                                                                            alert("El remito se guardo con exito");
                                                                                            if (id == "aceptarNuevoRem") {
                                                                                             totalCantidad = 0;
                                                                                    document.getElementById("provRem").value = "";
                                                                                    document.getElementById("fechaRec").value = now;
                                                                                    document.getElementById("fechaRemito").value = now;
                                                                                    document.getElementById("numRemito").value = "";
                                                                                    document.getElementById("comprobanteRem").value = "";
                                                                                    // document.getElementById("tipoRem").value = "";
                                                                                    document.getElementById("pvRemito").value = "";
                                                                                    document.getElementById("productoRem").value = "";
                                                                                    document.getElementById("cantidadRem").value = "";
                                                                                    $('.selected').remove();
                                                                                    $("#tablaDetRemito").find("tr:gt(0)").remove();
                                                                                           } else {
                                                                                    
                                                                                    totalCantidad = 0;
                                                                                    $("#tablaDetRemito").find("tr:gt(0)").remove();
                                                                                    window.location = "compras";
                                                                                                  }
                                                                                            
                                                                                        
                                                                                        }
                                                                                        
                                                                        }

                                                                        

                                                                    
                                                    } else {
                                                                    alert("No se pudo guardar el remito");
                                                    }

                                    });

    } else {
                    alert("Faltan completar campos");
    }
    

} //finaliza funcion registro compra

//AÑADE PRODUCTOS DE LA COMPRA
var filaRem = "";
$("#btn_añadirRem").click(function() {

    var numero = $('#numRemito').val();
    //var producto = $('#productoRem').val();
    cantidad = $('#cantidadRem').val();

    if (cantidad == "" || idNombreProducto == "" || numero == "") {
                    alert("Ingrese los campos solicitados");
    } else {
                    
                    i += 1;
                    
                    filaRem = '<tr onMouseOver="activar(' + i + ')" onMouseOut="desactivar(' + i + ')" class="selected" id=filaR' + i + '><td data-producto =' + idProducto +'  style="text-align: right;">' + cantidad + '</td><td>' + idNombreProducto + '<button class="btn btn-danger btn-sm float-right" type="button"  id="btn_delR'+i+'" onclick="eliminar('+ i +', ' + cantidad + ')">Eliminar</button></td></tr>';

                    $('#tablaDetRemito').append(filaRem);
                    $("#btn_delR" + i).hide();

                   
                    sumacantidad(cantidad);
                    
    }

    
});

function activar(c) {
    $('#btn_delR' + c).show();
}

function desactivar(c) {
    $('#btn_delR' + c).hide();
}
//ELIMINA DETALLES DE LA COMPRA
function eliminar(id, cantidad) {

    
    totalCantidad = totalCantidad - Number(cantidad);
   
    $('#filaR' + id).remove();


}

function sumacantidad(cantidad) {
    
    totalCantidad = totalCantidad + Number(cantidad);

    return totalCantidad;
    
}

//CREA MODAL DETALLE PROVEEDOR
function modalDetalleRemito(cuit, numero) {

                $("#modalDRemito").empty();
                $("#modalDRemito").append(



                                '<div class="modal-dialog modal-lg">' +
                                '<div class="modal-content">' +


                                '<div class="modal-header">' +
                                '<h4 class="modal-title">Detalle Remito</h4>' +
                                '<button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>' +
                                '</div>' +


                                '<div class="modal-body">' +

                                '<ul class="nav nav-tabs">' +
                                '<li class="nav-item">' +
                                '<a class="nav-link active" data-toggle="tab" href="#general">General</a>' +
                                '</li>' +
                                '<li class="nav-item">' +
                                '<a class="nav-link" data-toggle="tab" href="#compras">Compras</a>' +
                                '</li>' +
                                '</ul>' +

                                '<div class="tab-content">' +
                                '<div id="general" class="container tab-pane active">' + '<br>' +
                                '<div class="form-row">' +
                                '<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
                                'Comprobante' +
                                '<span class="float-right">' +
                                '<label id="comprobanteRemito"></label>' +

                                 ' :: ' + 
                                 '<label id="fechaRemito"></label>' +

                                '</div>' +
                                '</div>' +

                                '<div class="form-row">' +
                                '<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
                                'Proveedor' +
                                // '<label class="float-right" id="cuitPRemito"></label>' +
                                '<a href="" class="float-right" id="cuitPRemito" onclick="modalDetalleProveedor(cuit); return false;"></a>' +
                                '</div>' +
                                '</div>' +

                                '<div class="form-row">' +
                                '<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
                                'Domicilio' +
                                '<label class="float-right" id="domicilioRemito"></label>' +
                                '</div>' +
                                '</div>' +
                                '</br>' +
                                
                                '<div id="contenidoRemitoTabla" class="row-sm-5">' +
                                '<div class="table-responsive" style="height: 180px;">' +

                                '<table id ="tablaDetalleRemito" class="table table-hover table-bordered table-sm table-striped tableSecundaria">' +
                                '<thead class="bg-dark text-white">' +

                                '<tr>' +
                                '<th>Cantidad</th>' +
                                '<th>Producto</th>' +
                                '</tr>' +
                                '</thead>' +
                                '<tbody style="overflow-y: scroll;">' +


                                '</tbody>' +
                                '</table>' +

                                '</div>' +
                                '</div>' +

                                '<div class="form-row">' +
                                '<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
                                'Recibido el' +
                                '<label class="float-right" id="recibidoRemito"></label>' +

                                '</div>' +

                                '</div>' +

                                '<div class="form-row">' +
                                '<div class="col-sm-12 border border-top-0 border-right-0 border-left-0">' +
                                'Estado' +
                                '<label class="float-right text-danger" id="estadoRemito"></label>' +

                                '</div>' +
                                '</div>' +
                                '</div>' +
                                
                                //TAB COMPRAS
                                '<div id="compras" class="container tab-pane fade">' + '<br>' +

                                '<div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">' +
                                '<small> Comprobantes asociados a este remito</small>' +
                                '</div>' +

                                '<div id="detalleComprasRemito" class="row-sm-5">' +
                                '<div class="table-responsive" style="height: 180px;">' +

                                '<table id ="tablaComprasRemito" class="table table-hover table-bordered table-sm table-striped tableSecundaria">' +
                                '<thead class="bg-dark text-white">' +

                                '<tr>' +
                                '<th>Fecha</th>' +
                                '<th>Comprobante</th>' +
                                '</tr>' +
                                '</thead>' +
                                '<tbody style="overflow-y: scroll;">' +


                                '</tbody>' +
                                '</table>' +

                                '</div>' +
                                '</div>' +




                                '</div>' +


                                '<div class="m-2 float-right">' +
                                '<button type="button" class="btn btn-primary btn-sm" id="facturar" onclick="facturar();">Facturar</button>  ' +
                                '<button id="btn_eliminarRemito"  class="btn btn-primary btn-sm" type="button">Eliminar</button>  ' +
                                '<button id="close-btn" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal" >Salir</button>' +

                                '</div>' +




                                '</div> ' +
                                '</div>' +

                                '</div>'




                );

                $("#tablaDetalleRemito").find("tr:gt(0)").remove();


            


                $.post("remito/getDatosRemito", {
                                                id: numero,
                                                cuit: '' + cuit + ''

                                },

                                function(data) {
                                
                                                var estado = "";
                                                
                                                var pr = JSON.parse(data);
                                                $.each(pr, function(i, item) {

                                                                var totalPVentaRemito = agregarCeros(item.puntoVenta, 4);
                                                                var fechaCargaRemito = fechasFormato(item.fecha);
                                                                var totalComprobanteRemito = agregarCeros(item.comprobante, 8);
                                                                var fechaRemito = fechasFormato(item.fechaRemito);
                                                                
                                                                
                       
                                                                if (item.estado == 0) {
                                                                                estado = "Pendiente de Facturar"
                                                                                document.getElementById("estadoRemito").innerHTML = estado;
                                                                                document.getElementById("estadoRemito").className = "text-danger font-weight-bold float-right";
                                                                } else {
                                                                                estado = "Aceptado"
                                                                                document.getElementById("estadoRemito").innerHTML = estado;
                                                                                document.getElementById("estadoRemito").className = "text-success font-weight-bold float-right";

                                                                }
                                                                
                                                                nomP = item.apeynom;
                                                                document.getElementById("comprobanteRemito").innerHTML = item.tipoComprobante + '' + item.tipo + '' + totalPVentaRemito + '-' + totalComprobanteRemito;
                                                                document.getElementById("cuitPRemito").innerHTML = item.apeynom;
                                                                document.getElementById("fechaRemito").innerHTML = fechaRemito;
                                                                document.getElementById("domicilioRemito").innerHTML = item.domicilio;
                                                                document.getElementById("recibidoRemito").innerHTML = fechaCargaRemito;
                                                                
                                                            

                                                });

                                });




                //CARGA DETALLES DEL REMITO
                $.post("remito/getDatosDetallesRemito", {
                                                id: numero,
                                                cuit: '' + cuit + ''
                                },
                                function(data) {
                                        
                                                var pe = JSON.parse(data);
                                            $.each(pe, function(i, item) {
                                                            
                                                            
                                                                $('#tablaDetalleRemito').append(

                                                                                '<tr>' +
                                                                                '<td>' + item.cantidad + '</td>' +
                                                                                '<td>' + item.nombre + '</td>' +
                                                                                '</tr>'


                                                                );
                                                                
                                                              
                                                });

                                });


                
                          //CARGA COMPRAS REMITO 
                                $.post("remito/getCompraRemito", {
                                                id: numero,
                                                cuit: '' + cuit + ''
                                },
                                function(data) {
                                        
                                        if(data != []){

                                                var pe = JSON.parse(data);
                                            $.each(pe, function(i, item) {     

                                                               let comprobanteCompra = agregarCeros(item.comprobanteCompra, 8);
                                                               let fechaCompra = fechasFormato(item.fechaCarga);
                                                                $('#tablaComprasRemito').append(

                                                                                '<tr>' +
                                                                                '<td>' + fechaCompra + '</td>' +
                                                                                '<td><a href="" onclick="modalDetalleCompra(\'' + cuit + '\', ' + item.comprobanteCompra + '); return false;">' + item.tipoComprobanteCompra + '' + item.tipoFcompra + '' + comprobanteCompra + '</a></td>' +
                                                                        
                                                                                '</tr>'


                                                                );  

                                               });
                                        }
                                });

                $("#modalDRemito").modal("show");
                // $("#modalComp").modal("hide");

}



  