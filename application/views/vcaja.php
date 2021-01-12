<!-- TABLA PRINCIPAL DE COMPRA -->
    <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped table-sm" id="tablaCaja">
        <thead class="thead-light font-italic">
            <tr >
                <th>Fecha</th>
                <th>Movimientos</th>
                <th>Cliente/Proveedor</th>
                <th>Comprobante</th>
                <th>Efectivo</th>
                <th>Bancos</th>
                <th>Tarjetas</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>

    </table>

</div>
                
<!-- MODAL PAGO-->


<!-- The Modal -->
<div class="modal" id="modalPago" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Emitir Orden de Pago</h4>
                <div class="alert alert-dismissible">
                <button type="button" class="close" data-toggle="modal" data-toggle="modal" data-target="#cerrarModal">&times;</button>
            </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            
                    <!-- FILA 1  -->
                    <form id="pago" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-sm-9 bg-primary ">
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
                    

                    </div>
                 
                 <!-- FILA 2 -->
                 
                 <div class="form-row">


                        <div class="col-sm-2">
                                <label for="puntoVenta">Punto Venta:</label>
                                     
                                                <input class="form-control form-control-sm" id="puntoVenta" value="ODP[B]-0009" type="text" name="num" required>
                                
                        </div> 

                        <div class="col-sm-2">
                                 <label for="num">Numero:</label>
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                                                <input class="form-control form-control-sm" id="num" type="text" name="num" maxlength="8" onkeyup="validar(this.id)">
                                                </span>
                        </div> 
                     
            
     </div>
                
                <div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-2">
                            <small>Resumen Cuenta Corriente</small>
                     </div>
                <div class="row-sm-5 pt-2">
                <div class="table-responsive" style="height: 160px;">
                     <table class="table table-hover table-bordered table-sm table-striped tableSecundaria" id="tablaPago">
                        <small>Saldos Pendientes</small>
                         <thead class="bg-dark text-white">
                                    
                                    <th>+</th>
                                    <th>Fecha</th>
                                     <th>Comprobante</th>
                                    <th>Total Comp.</th>
                                    <th>Saldo</th>  
                                    
                                
                        </thead>


                        <tbody style="overflow-y: scroll;">
            
                        </tbody>

                    </table>
                    <div id="divP" class="d-none"><p class="text-center">No se encontraron registros</p></div>
                </div>
                </div>
                
<div class="form-row m-2">

     <div class="col-sm-2 border border-top-0 border-right-0 border-left-0 pt-4">
                            Efectivo (Pesos)
                     </div>

    <div class="col-sm-2">
<label>Monto</label><br>

                    
<input type="text" id="monto" placeholder="0,00" size="9" style="height: 28px; text-align: right;">
                    

</div>

<div  class="col-sm-2">
    <label> Monto Total</label><br>
    <div class="border border-top-0 border-right-0 text-right border-dark">
                            
<label id="iva1">$0,00</label>
                        </div>
</div>

                        
    
<div class="col-sm-2">
<label>Total Efectivo</label><br>

                        <div class="border border-top-0 border-right-0 text-right border-dark">
<label id="iva2">$0,00</label>
                        </div>
    </div>    

        
<div class="col-sm-2">
<label>Saldo Seleccionado</label><br>

                        <div class="border border-top-0 border-right-0 text-right border-dark">
<label id="saldoSelec">$0,00</label>
                        </div>
    </div>

    <div class="col-sm-2">
<label>Diferencia Selec.</label><br>

                        <div class="border border-top-0 border-right-0 text-right border-dark">
<label id="difSelec">$0,00</label>
                        </div>
    </div>

</div>
<div class="m-2 float-right" >


<input type="button" id="btnAceptarCaja" class="btn btn-primary btn-sm" name="aceptar" onclick="registrarOrdenPago();" value="Aceptar">

<button id="close-btn" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal">Cerrar</button>

                        </div>
</form>
        </div>
            </div>

            

        </div>
    </div>

<!-- The Modal -->
<div class="modal" id="modalRecibo" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Emitir Recibo</h4>
                <div class="alert alert-dismissible">
                <button type="button" class="close" data-toggle="modal" data-toggle="modal" data-target="#cerrarModal">&times;</button>
            </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

             <!-- FILA 1  -->
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-sm-2">
                             <label for="fechaRecibo">Fecha</label>
                            
                        <input class="form-control form-control-sm" type="date" name="fec" id="fechaRecibo" value="<?php echo date("Y-m-d"); ?>">
                        
                          </div>
                  
                    <div class="col-sm-8">
                     <label for="clienteRecibo">Cliente</label>
                     <input class="form-control form-control-sm"  type="text" name="clienteRecibo"  id="clienteRecibo"> 
                    </div>


                    <div class="col-sm-2">

                    <label for="vendedorRecibo">Vendedor</label>
              
                        <select class="custom-select custom-select-sm"  id="vendedorRecibo">
                                        <!-- <option id="peso" value="peso">Peso</option>
                                        <option id="dolar" value="dolar">Dolar</option> -->
                        </select>
                    </div>

                    </div>

                    <div class="form-row">
                            <div class="col-sm-3">

                           <label for="pvRecibo">Punto de Venta</label>
                     <input class="form-control form-control-sm"  type="text" name="pvRecibo"  id="pvRecibo"> 
                    </div>
              
                             
                         <div class="col-sm-3">

                           <label for="numeroRecibo">Numero</label>
                     <input class="form-control form-control-sm"  type="text" name="numeroRecibo"  id="numeroRecibo"> 
                    </div>

                    
                  
                    <div class="col-sm-6">
                     <label for="obsRecibo">Observaciones</label>
                     <input class="form-control form-control-sm"  type="text" name="obsRecibo"  id="obsRecibo"> 
                    </div>
                    

                    </div>

                    <div class="form-row">
                             <div class="col-sm-2 border border-top-0 border-right-0 border-left-0 pt-4">
                            Recibo
                     </div>
              
                             
                         <div class="col-sm-2">

                           <label for="efectivoRecibo">Efectivo</label>
                     <input class="form-control form-control-sm"  type="text" name="efectivoRecibo"  id="efectivoRecibo"> 
                    </div>

                     <div class="col-sm-2">

                           <label for="chequesRecibo">Cheques</label>
                     <input class="form-control form-control-sm"  type="text" name="chequesRecibo"  id="chequesRecibo"> 
                    </div>

                     <div class="col-sm-2">

                           <label for="bancosRecibo">Bancos</label>
                     <input class="form-control form-control-sm"  type="text" name="bancosRecibo"  id="bancosRecibo"> 
                    </div>

                     <div class="col-sm-2">

                           <label for="tarjetasRecibo">Tarjetas</label>
                     <input class="form-control form-control-sm"  type="text" name="tarjetasRecibo"  id="tarjetasRecibo"> 
                    </div>

                     <div class="col-sm-2">

                           <label for="totalRecibo">Total</label>
                            <div class="border border-top-0 border-right-0 text-right border-dark">
                            <label id="totalRecibo" style="font-size: 14px;" class="">$0,00</label>
                     </div>
                    </div>
                  
                    
                    

                    </div>

                    <div class="mt-3 float-right" >

                    <input type="button" id="btnAceptarRecibo" class="btn btn-primary btn-sm" name="aceptar" onclick="registrarRecibo();" value="Aceptar">

                        </div>
                </form>

           </div>
        </div>

            

    </div>
</div>



    <script type="text/javascript">
    var total = 0;
    var tot = 0;
    var saldo = 0;
    var idProveedor = "";
    $(document).ready(function(){

            $("#proveedor").autocomplete({

source: 'compras/getNombre',
select: function(event, ui){

    $('[name="nProveedor"]').val(ui.item.label);
idProveedor = ui.item.cuit;


$("#tablaPago").find("tr:gt(0)").remove();

 $.post("caja/getCtaProveedor",
                                                         {
                                                                 cuit:idProveedor
                                                         },
 function(data){
    if (data != "[]"){
    document.getElementById('divP').className = "d-none";
    
                 var ifv = 1;
                 var pe = JSON.parse(data);

                 $.each(pe, function(i, item){

                    fechaCarga = fechasFormato(item.fecha);
                    
                         totalComprobante = agregarCeros(item.comprobante, 8);  
            
                    $('#tablaPago').append(
                         '<tr >'+
                           '<td>'+
                             '<input type="checkbox" id='+ifv+' class=cb>'+
                           '</td>'+
                           '<td style="text-align: right;">'+fechaCarga+'</td>'+
                           '<td>'+
                            '<a href="" onclick="modalDetalleCompra(\'' + idProveedor + '\', '+item.comprobante+'); return false;">'+item.tipoComprobante+''+item.tipoFactura+''+totalComprobante+'</a>'+
                           '</td>'+
                           '<td style="text-align: right;">'+item.total+'</td>'+
                           '<td style="text-align: right;">'+item.total+'</td>'+
                         
                       '</tr>'


                     );
                ifv++;
                 });

$( '.cb').on( 'click', function() {
    
    if( $(this).is(':checked') ){
        
        var i =$(this).attr("id");
        saldo = document.getElementById('tablaPago').rows[i].cells[4].innerText;
    
       total =   parseFloat(saldo) + parseFloat(total);
        document.getElementById("saldoSelec").innerHTML = "$"+parseFloat(total).toFixed(2);
        document.getElementById("difSelec").innerHTML = "$"+parseFloat(total).toFixed(2);
    } else {
        var i =$(this).attr("id");
        saldo = document.getElementById('tablaPago').rows[i].cells[4].innerText;
        
        total = parseFloat(total) - parseFloat(saldo) ;
        document.getElementById("saldoSelec").innerHTML = "$"+parseFloat(total).toFixed(2);
        document.getElementById("difSelec").innerHTML = "$"+parseFloat(total).toFixed(2);
        
    }
});

}else{
        document.getElementById('divP').className = "d-block";
    }

 });


 // appendTo: $("#modalPago")
                
}

});


});





</script>

