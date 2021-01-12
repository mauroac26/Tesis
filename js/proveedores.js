//CARGA TABLA PRINCIPAL DEL MODULO PROVEEDORES
var totalComprobante = 0;
var cuit = "";


$.post("proveedores/getProveedores",
    function(data){

    

            var resultado = JSON.parse(data);

                        
            $.each(resultado, function(i, item){

             $('#tablaProveedores').append(
             
                '<tr id="'+item.cuit+'" href="">'+
                     
                     '<td>'+item.apeynom+'</td>'+
                     '<td>'+item.cuit+'</td>'+
                     '<td>'+item.domicilio+'</td>'+
                     '<td>'+item.localidad+'</td>'+
                     '<td>'+item.telefono+'</td>'+
                     '<td>$'+item.saldo+'</td>'+
                     '</tr>'
                
               );
                        


            });

//MUSTRA INFORMACION DE LA COMPRA
 $("tr").click(function() {

            var cuit =$(this).attr("id");

                            modalDetalleProveedor(cuit);
  
        
           });  //fin funcion click tr
            
    });//fin funcion carga tabla principal proveedores



