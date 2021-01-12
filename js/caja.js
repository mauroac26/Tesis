var ifv;

$.post("caja/getCaja",
    function(data){

            var p = JSON.parse(data);
            
        
                            
            
$.each(p, function(i, item){

             fechaCarga = fechasFormato(item.fecha);
        
             var totalComprobante = agregarCeros(item.comprobante, 8);
             


             $('#tablaCaja').append(
             
                
                '<tr id="' + ifv + '" data-cuit="' + item.cuit + '">'+
                     '<td>'+fechaCarga+'</td>'+
                     '<td>'+item.movimientos+'</td>'+
                     '<td>'+item.apeynom+'</td>'+
                     '<td>[ODP][B]'+totalComprobante+'</td>'+
                     '<td>$'+item.efectivo+'</td>'+
                     '<td>$'+item.banco+'</td>'+
                     '<td>$'+item.tarjeta+'</td>'+
                     '<td>$'+item.total+'</td>'+
                     '</tr>'
                
                
    
                );

                        
              ifv++;
            });

            $("#tablaCaja tr").click(function() {

                        // var i = $('tr').index(this);

                        var cuit = $(this).data("cuit");
                        var i = $(this).attr("id");
                        var numero = document.getElementById('tablaCaja').rows[i].cells[3].innerText.substr(15);
                        modalDetallePago(cuit, numero);

                });

        });



function registrarOrdenPago(){

                 numero=$('#num').val();
                 pVenta=$('#puntoVenta').val();
                 proveedor=$('#proveedor').val();
                var saldo =document.getElementById("saldoSelec").innerText.substring(1);
                

                 $.post("caja/registrarOrdenPago",
         {

                    numero: numero,
                    pVenta: pVenta,
                    proveedor: ''+idProveedor+'',
                    saldo: ''+saldo+''

             
         },
    function(data){

    if(data == 1){



    alert("La orden de pago se guardo con exito");  
        window.location="caja"; 
         
//      var filaTablaPago = 0;

// filaTablaPago = $('#tablaPago tr').length; 


// for (i = 1; i <= filaTablaPago; i++) { 
$('input[type=checkbox]:checked').each(function() {
// if( $(".cb1" + i).is(':checked') ){

    let i =1;
var comprobante = document.getElementById('tablaPago').rows[i].cells[2].innerText.substr(8);

$.post("caja/modificarCondicion",
         {
                 
                comprobante: comprobante,
                cuit: ''+idProveedor+''
             
         });
// }
    
});

}else{
    alert("No se pudo guardar la orden de pago");
}
    

            


        

    });
}

// $("#btnAceptarCaja").click(function(){

// alert("hola");
// });
