<!-- TABLA PRINCIPAL DE Ventas -->
<div  class="col-lg-12" id="div_tabla"><!-- style="margin-top: 80px;" -->
<div class=" table-responsive">
    <table class="table table-hover table-bordered table-striped table-sm" id="tablaVentas">
        <thead class="thead-light font-italic">
            <tr >
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Comprobante</th>
                <th>Total</th>
                <th>Condición</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>


</div>

<!-- MODAL ALTA COMPRA -->
<!-- The Modal -->
<div class="modal" id="modalVenta" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Alta Venta</h4>
                <div class="alert alert-dismissible">
                    <button type="button" class="close" data-toggle="modal" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                
                <!-- FILA 1  -->
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div style="width: 170px;">
                            <label for="fechaVenta">Fecha:</label>
                            <input class="form-control form-control-sm" type="date" name="fechaVenta" id="fechaVenta" value="<?php echo date("Y-m-d"); ?>">
                        </div>

                        <div class="col-sm-7" >
                           
                           <label for="cliente">Cliente:</label>
                          
                            <input class="form-control form-control-sm " type="text" name="cliente" id="cliente" size="60" required onmousedown = 'autocompletarCliente(this.id);'>
                            
                        </div>
                        
                        <div class="col-auto">
                            <label for="monedaVenta">Moneda:</label>
                            <br>
                            <select class="custom-select custom-select-sm"  id="monedaVenta">
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
                    
                    <div class="form-row mt-1">
                        <div class="col-sm-3 bg-success text-white rounded-top">
                            <label for="formaPagoVenta">Forma&nbspde&nbsppago:</label>
                            <select class="custom-select custom-select-sm" id="formaPagoVenta">
                                <option value="Cuenta corriente">Cuenta corriente</option>
                                <option value="Contado">Contado</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-3">
                            <label for="puntoVentaV">Punto Venta:</label>
                            
                            <input class="form-control form-control-sm" id="puntoVentaV" type="text" name="puntoVentaV"  required>
                            
                        </div>
                        <div class="col-sm-3">
                            <label for="numVenta">Numero:</label>
                           
                                <input class="form-control form-control-sm" id="numVenta" type="text" name="numVenta" maxlength="8" onkeyup="validar(this.id)">
                          
                        </div>
                        
                        
                        
                        <div class="col-sm-3">
                            <label for="vendedor">Vendedor:</label>
                            <select class="custom-select custom-select-sm" id="vendedor">
                                <option value="1"></option>
                            </select>
                        </div>
                    </div>

                    
                    <!-- FILA 3 -->
                    <div class="form-row mt-1">
                        <div class="col-sm-7">
                            <label for="productoVenta">Producto:</label>
                            <input class="form-control form-control-sm" id="productoVenta" type="text" name="productoVenta" onmousedown = 'autocompletarProd(this.id);'>
                        </div>
                        <div class="col-sm-2">
                            <label for="ivaVenta">I.V.A:</label>
                            <select class="custom-select custom-select-sm" id="alic">
                                <option id="nogra" value="No Gravado" name="iva">No Gravado</option>
                                <option id="ex" value="e" name="iva">Exento</option>
                                <option id="iva10" value="10.5" name="iva">10,5%</option>
                                <option id="iva21" value="21" name="iva">21,0%</option>
                                <option id="iva27" value="27" name="iva">27,0%</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="cantidadVenta">Cantidad:</label>
                            <div class= "tooltip">
                                <span  class="tooltipError">Ingresar solo numeros</span> </div>
                                <input class="form-control form-control-sm" type="text" id="cantidadVenta" name="cantidadVenta" size="7" onkeyup="validar(this.id)">
                            </div>
                            <div class="col-sm-2">
                                <label for="uniVenta">P.Unitario:</label>
                                
                                <input class="form-control form-control-sm text-right" id="uniVenta" type="text" name="uniVenta">
                            </div>
                        </div>
                        
                        <div class="m-2 ">
                            
                            <input id="btn_añadirVenta" class="btn btn-primary btn-sm float-right" type="button" value ="Añadir" onclick="agregarProductoVenta(idProducto, idNombreProducto, $('#cantidadVenta').val(), ali);">

                            
                        </div>
                        <div class="row-sm-5 pt-5">
                            <div class="table-responsive" style="height: 160px;">
                                <table class="table table-hover table-bordered table-sm table-striped tableSecundaria" id="tablaAV">
                                    <thead class="bg-info">
                                        
                                        <th>Cant.</th>
                                        <th>Descripción</th>
                                        <th>Alicuota</th>
                                        <th>P.Unitario</th>
                                        <th>SubTotal</th>
                                        
                                    </thead>
                                    <tbody style="overflow-y: scroll;">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- datos de iva -->
                        <div class="form-row m-2">
                            <div  class="col-sm-2">
                                <label> IVA 10,5% </label><br>
                                <div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
                                    
                                    <label id="iva1">$0,00</label>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-2">
                                <label>IVA 21%</label><br>
                                <div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
                                    <label id="iva2">$0,00</label>
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <label>IVA 27%</label><br>
                                <div style="border-bottom: 1px solid black; border-left: 1px solid black;text-align: right;">
                                    <label id="iva3">$0,00</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Gravado</label>
                                <div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
                                    <label id="grav">$0,00</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>No Gravado</label>
                                <div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
                                    <label id="ivaNo">$0,00</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Excento</label>
                                <div style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: right;">
                                    <label id="exc">$0,00</label>
                                </div>
                            </div>
                        </div>
                        <div class="m-2 float-right" >
                            <input type="button" class="btn btn-primary btn-sm" id="btnAceptarNuevo" name="aceptarNuevo" onclick="registrarVenta(this.id);" value="Aceptar y Nuevo">
                            <input type="button" id="btnAceptarVenta" class="btn btn-primary btn-sm" name="aceptar" onclick="registrarVenta(this.id);" value="Aceptar">
                            <button id="close-btn" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>


  <!-- ALTA REMITO VENTA-->
    <div class="modal" id="AltaRemitoVenta">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Alta Remito Venta</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-row">
                        
                        <div class="col-sm-3">
                            <label for="dtRem">Reicibido el:</label>
                            <input class="form-control form-control-sm" type="date" name="fec" id="fechaRec" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="col-sm-9">
                            <label for="provRem">Cliente:</label>
                            <input type="text" class="form-control form-control-sm" name="pro" id="provRem" size="69" required onmousedown = 'autocompletarCliente(this.id);' >
                        </div>
                        
                        
                        
                    </div>
                    <div class=" form-row pt-1">
                        
                        
                        <div  class="col-sm-3">
                            <label for="comprobanteRem">Comprobante:</label>
                            <select id="comprobanteRem" class="custom-select custom-select-sm">
                                <option id="c1" value="[REM]" selected>Remito</option>
                                <option id="c2" value="[SIN]">Sin Comprobante</option>
                                
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="tipoFrem">Tipo:</label>
                            <select id="tipoFrem" class="custom-select custom-select-sm" name="selectF">
                                <option id="tf1" value="[A]">A</option>
                                <option id="tf2" value="[B]">B</option>
                                <option id="tf3" value="[C]">C</option>
                                <option id="tf4" value="[M]">M</option>
                                <option id="tf5" value="[R]" selected>R</option>
                                <option id="tf6" value="[X]">X</option>
                                <option id="tf7" value="[S]">S</option>
                                <option id="tf8" value="[E]">E</option>
                            </select>
                            
                        </div>
                        <div class="col-sm-2">
                            <label for="pv">Punto de venta:</label>
                            <input id="pvRemito" class="form-control form-control-sm" type="text" name="num">
                        </div>
                        <div class="col-sm-2">
                            <label for="numcom"> Numero:</label>
                            <input id="numRemito" type="text" class="form-control form-control-sm" name="num" size="15" onkeyup="validar(this.id)">
                        </div>
                        <div class="col-sm-3">
                            <label for="dt1">Fecha de remito:</label>
                            <input class="form-control form-control-sm" type="date" name="fec" id="fechaRemito" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                    <div class="form-row pt-1">
                        <div class="col-sm-2" >
                            <label for="tipoPrem">Tipo:</label>
                            <select id="tipoPrem" class="custom-select custom-select-sm" name="selectP">
                                <option id="tp1" value="Producto">Producto</option>
                                <option id="tp2" value="Gasto">Gasto</option>
                                <option id="tp3" value="Bien de uso">Bien de uso</option>
                                <option id="tp4" value="Servicio">Servicio</option>
                            </select>
                        </div>
                        <div class="col-sm-7">
                            <label for="productoRem">Producto:<br></label>
                            <input id="productoRem" class="form-control form-control-sm" type="text" name="producto" size="45" onmousedown = 'autocompletarProd(this.id);'>
                        </div>
                        
                        <div class="col-sm-2">
                            <label for="cantidadRem">Cantidad:</label>
                            <input type="text" id="cantidadRem" name="cantidad" class="form-control form-control-sm">
                        </div>

                        <div class="col-sm-1">
                        
                        <button id="btn_añadirRem" class="btn btn-primary btn-sm mt-4" type="button">Añadir</button>
                    </div>
                    </div>
                    <!-- <div class="m-2 float-right">
                        
                        <button id="btn_añadirRem" class="btn btn-primary btn-sm" type="button">Añadir</button>
                    </div> -->
                    
                    <!--tabla-->
                    <div id="tablaCom" class="row-sm-5 pt-3">
                        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                            <table id ="tablaDetRemito" class="table table-hover table-bordered table-sm table-striped ">
                                <thead class="bg-info">
                                    
                                    <tr>
                                        <th style="width: 50px;">Cantidad</th>
                                        <th>Producto</th>
                                    </tr>
                                </thead>
                                <!-- <tbody style="overflow-y: scroll;">
                                    
                                </tbody> -->
                            </table>
                            
                        </div>
                    </div></br>

                    <div class="form-row">
                        
                        <div class="col-sm-10">
                            <label for="dtRem">Observaciones</label>
                            <input class="form-control form-control-sm" type="text" id="obsRemito">
                        </div>
                        <div class="col-sm-2">
                            <label for="provRem">Pendiente Facturar</label></br>
                            
                        
                            <div class="border">                    
                            <div class="form-check form-check-inline ml-1 mt-1 ">
                              <input class="form-check-input" type="radio" name="rbOptions" id="rbSi" value="0" checked>
                              <label class="form-check-label" for="rbSi">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="rbOptions" id="rbNo" value="1">
                              <label class="form-check-label" for="rbNo">No</label>
                            </div>
                            </div>
                                </div>                      
                    </div></br>
                    
                    <div class="m-1 float-right">
                        
                        
                        <button type="button" class="btn btn-primary btn-sm" id="aceptarNuevoRem" onclick="registrarRemitoVenta(this.id);">Aceptar y Nuevo</button>
                        <button type="button" class="btn btn-primary btn-sm" id="aceptarRem" onclick="registrarRemitoVenta(this.id);">Aceptar</button>
                        <button id="close-btn" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- MODALE REMITOS PENDIENTES -->
<div class="modal" id="pendienteFacturarVenta" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Remitos Pendientes de Facturar</h4>
                <div class="alert alert-dismissible">
                <button type="button" class="close" data-toggle="modal" data-toggle="modal" data-target="#cerrarModal">&times;</button>
            </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            
                    <!-- FILA 1  -->
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-sm-12">
                <span>Clientes:</span>
                <br/>
                     <select id="cboClientes" class="custom-select custom-select-sm" >
                                
                                
                            </select>
                        <!-- <input style="height: 25px;" class="form-control form-control-sm" type="text" name="nProveedorPend" id="proveedorRemPendiente" size="60" required> -->
                        
                    </div>
                    

                    </div>
                
                 <!-- FILA 2 -->
                 
                 <div class="form-row p-2">


                        <div class="col-sm-5 ">
                               <div class="table-responsive border" style="height: 180px;">
                                <table class="table table-hover table-bordered table-striped table-sm" id="tablaRem">
                                <thead class="bg-dark text-white font-italic">
                                <tr >
                                    <th><small>#</small></th>
                                    <th><small>Fecha</small></th>
                                    <th><small>Comprobante</small></th>
                                    
                                </tr>
                            </thead>

                            <tbody style="overflow-y: scroll;">
                            
                            </tbody>

                        </table>
                        </div> 
                        </div>

                        <div class="col-sm-7 ">
                            <div class="table-responsive border" style="height: 180px;">
                                <table class="table table-hover table-bordered table-striped table-sm" id="tablaDetalleRemImputar">
                                <thead class="bg-dark text-white font-italic">

                                <tr >
                                    <th><small>Saldo</small></th>
                                    <th><small>imputar</small></th>
                                    <th><small>Producto</small></th>
                                    
                                </tr>
  
                            </thead>

                            <tbody style="overflow-y: scroll;">
                                
                            </tbody>

                        </table>
                        </div> 
                     </div>
            
                </div>
                
                <div class="form-row p-2">


                        <div class="col-sm-12">
                              <div class="table-responsive border" style="height: 130px;">
                                <table class="table table-bordered table-sm" id="tablaDetalleRem">
                                <thead class="bg-dark text-white font-italic">
                                <tr >
                                
                                    <th style="width: 80px;"><small>Cantidad</small></th>
                                    <th><small>Producto</small></th>
                                    
                                </tr>
                            </thead>
                            <tbody style="overflow-y: scroll;">
                                
                            </tbody>

                        </table>
                        </div> 
                     </div>
            
                </div>

                <div class="m-2 float-right" >


                <input type="button" id="btnEliminarRemito" class="btn btn-primary btn-sm" name="aceptar" value="Eliminar Remito">

                <button id="btnFacturarVentas" class="btn btn-primary btn-sm" type="button">Facturar</button>

                </div>
</form>
        </div>
            </div>

            

        </div>
    </div>

    <script type="text/javascript">
        var idCliente = "";
    function autocompletarCliente(idCli) {

    
    
    
        
                $("#" + idCli).autocomplete({

    source: 'ventas/getNombre',
    select: function(event, ui){
    // saldosPendientes(ui.item.cuit);
    var agregar = 0;
    
    agregar = ui.item.n;
    if(agregar == 1){
    
    modalAltaCliente();
    
    }else{
        
   // $('[name="nProveedor"]').val(ui.item.label);
    
    idCliente = ui.item.cuit;
   
    
    }
    }
    
    });
    
}
    </script>