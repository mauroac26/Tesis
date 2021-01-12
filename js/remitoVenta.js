function registrarRemitoVenta(id) {
    
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
                    $.post("remito/registrarRemitoVenta", {
                                                    numero: numero,
                                                    pVenta: pVenta,
                                                    proveedor: '' + idCliente + '',
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


                                                                                        $.post("remito/detalleRemitoVenta", {

                                                                                                        idRemito: numero,
                                                                                                        cuit: '' + idCliente + '',
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
                                                                                    window.location = "ventas";
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
    

 } //finaliza funcion registro remito venta