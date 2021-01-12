<!-- <section id="main-content"> -->
<!-- <div class="row"> -->




<div class="col-lg-2 bg-light position-fixed" style="display: none; overflow-y: scroll; height: 510px;"  id='div_filtros'>

<div class=" pt-1 border border-top-0 border-right-0 border-left-0" >
<h6 class="text-decoration text-primary pt-3">Comprobantes</h6>
</div>

<div class="form-check pt-2">
    <input type="checkbox" class="form-check-input" id="fr">
    Remito
    </div>

    <div class="form-check pt-2">
    <input type="checkbox" class="form-check-input" id="nc">
    Nota Credito
    </div>

    <div class="form-check pt-2">
    <input type="checkbox" class="form-check-input" id="nd">
    Nota Debito
    </div>

 
<div class=" pt-1 border border-top-0 border-right-0 border-left-0" >
<h6 class="text-decoration text-primary pt-3">Forma de Pago</h6>
</div>

<div class="form-check pt-2">
    <input type="checkbox" class="form-check-input" id="contado">
    Contado
    </div>

    <div class="form-check pt-2">
    <input type="checkbox" class="form-check-input" id="cc">
    Cuenta Corriente
    </div>



</div>

<!-- TABLA PRINCIPAL DE COMPRA -->
<div  class="col-lg-12" id="div_tabla"><!-- style="margin-top: 80px;" -->
<div class=" table-responsive">
    <table class="table table-hover table-bordered table-striped table-sm" id="tablaCompras">
        <thead class="thead-light font-italic">
            <tr >
                <th>F.Carga</th>
                <th>F.comprobante</th>
                <th>Movimientos</th>
                <th>Comprobante</th>
                <th>Proveedor</th>
                <th>Total</th>
                <th>Ctdo/Cta</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>


 </div>
</div>

<!-- </section> -->
<!-- MODAL ALTA COMPRA -->
<!-- The Modal -->
<div class="modal" id="myModal" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Alta compra</h4>
                <div class="alert alert-dismissible">
                    <button type="button" class="close" data-toggle="modal" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                
                <!-- FILA 1  -->
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-sm-7 bg-primary" >
                            <span class="bg-primary">Proveedor:</span>
                            <br/>
                            <input class="form-control form-control-sm " type="text" name="nProveedor" id="proveedor" size="60" required onmousedown = 'autocompletar(this.id);'>
                            
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
                        
                        <div style="width: 170px;">
                            <label for="fComprobante">F.Comprobante:</label>
                            <input class="form-control form-control-sm" type="date" name="fec" id="fComprobante" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                    
                    <!-- FILA 2 -->
                    
                    <div class="form-row">
                        <div class="col-sm-2">
                            <label for="formaPago">Forma&nbspde&nbsppago:</label>
                            <select class="custom-select custom-select-sm" id="formaPago">
                                <option value="Cuenta corriente">Cuenta corriente</option>
                                <option value="Contado">Contado</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="datepicker1">Vencimiento:</label>
                            <input  class="form-control form-control-sm" type="date" name="ven" id="datepicker1" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div  class="col-sm-2">
                            <label for="comprobante">Comprobante:</label>
                            <select class="custom-select custom-select-sm" id="comprobante">
                                <option id="c1" value="FAC">Factura</option>
                                <option id="c2" value="com">Recibo</option>
                                <option id="c3" value="com">Nota Debito</option>
                                <option id="c4" value="com">Nota Credito</option>
                                <option id="c5" value="com">Sin Comprobante</option>
                                <option id="c6" value="com">Resumen Bancario</option>
                                <option id="c7" value="com">Pago Impuestos y Tasa</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="tipoF">Tipo:</label>
                            <select class="custom-select custom-select-sm" id="tipoF" name="selectF">
                                <option id="tf1" value="[A]">A</option>
                                <option id="tf2" value="[B]">B</option>
                                <option id="tf3" value="[C]">C</option>
                                <option id="tf4" value="[M]">M</option>
                                <option id="tf5" value="[X]">X</option>
                            </select>
                            
                        </div>
                        <div style="width: 80px;">
                            <label for="puntoVenta">Punto Venta:</label>
                            
                            <input class="form-control form-control-sm" id="puntoVenta" type="text" name="num" maxlength="4" onkeyup="validar(this.id)" required>
                            
                        </div>
                        <div class="col-sm-1">
                            <label for="num">Numero:</label>
                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                                <input class="form-control form-control-sm" id="num" type="text" name="num" maxlength="8" onkeyup="validar(this.id)">
                            </span>
                        </div>
                        
                        
                        
                        <div style="width: 170px;">
                            <label for="datepicker2">F.Contabilizacion:</label>
                            <input class="form-control form-control-sm" type="date" id="datepicker2" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>

                    
                    <!-- FILA 3 -->
                    <div class="form-row">
                        <div class="col-sm-2">
                            
                            <label for="tipoP">Tipo:</label>
                            <select class="custom-select custom-select-sm" id="tipoP" name="selectP">
                                <option id="tp1" value="Producto">Producto</option>
                                <option id="tp2" value="Gasto">Gasto</option>
                                <option id="tp3" value="Bien de uso">Bien de uso</option>
                                <option id="tp4" value="Servicio">Servicio</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="producto">Producto:</label>
                            <input class="form-control form-control-sm" id="producto" type="text" name="nProducto" onmousedown = 'autocompletarProd(this.id);'>
                        </div>
                        <div class="col-sm-2">
                            <label for="alic">I.V.A:</label>
                            <select class="custom-select custom-select-sm" id="alic">
                                <option id="nogra" value="No Gravado" name="iva">No Gravado</option>
                                <option id="ex" value="e" name="iva">Exento</option>
                                <option id="iva10" value="10.5" name="iva">10,5%</option>
                                <option id="iva21" value="21" name="iva">21,0%</option>
                                <option id="iva27" value="27" name="iva">27,0%</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="cantidad">Cantidad:</label>
                            <div class= "tooltip">
                                <span  class="tooltipError">Ingresar solo numeros</span> </div>
                                <input class="form-control form-control-sm" type="text" id="cantidad" name="cantidad" size="7" onkeyup="validar(this.id)">
                            </div>
                            <div style="width: 60px;">
                                <label for="uni">P.Unitario:</label>
                                
                                <input class="form-control form-control-sm text-right" id="uni" type="text" name="uni" size="7.5" onkeyup="validar(this.id)">
                            </div>
                        </div>
                        
                        <div class="m-2 ">
                            
                            <input id="btn_añadir" class="btn btn-primary btn-sm float-right" type="button" value ="Añadir" onclick="agregarProducto(idProducto, idNombreProducto, $('#cantidad').val(), ali);">

                            
                        </div>
                        <div class="row-sm-5 pt-5">
                            <div class="table-responsive" style="height: 160px;">
                                <table class="table table-hover table-bordered table-sm table-striped tableSecundaria" id="tablaAC">
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
                            <input type="button" class="btn btn-primary btn-sm" id="btnAceptarNuevo" name="aceptarNuevo" onclick="registrarCompras(this.id);" value="Aceptar y Nuevo">
                            <input type="button" id="btnAceptarCompra" class="btn btn-primary btn-sm" name="aceptar" onclick="registrarCompras(this.id);" value="Aceptar">
                            <button id="close-btn" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- ALTA REMITO -->
    <div class="modal" id="AltaRemito">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Alta Remito</h4>
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
                            <label for="provRem">Proveedor:</label>
                            <input type="text" class="form-control form-control-sm" name="pro" id="provRem" size="69" required onmousedown = 'autocompletar(this.id);' >
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
                        
                        
                        <button type="button" class="btn btn-primary btn-sm" id="aceptarNuevoRem" onclick="registrarRemito(this.id);">Aceptar y Nuevo</button>
                        <button type="button" class="btn btn-primary btn-sm" id="aceptarRem" onclick="registrarRemito(this.id);">Aceptar</button>
                        <button id="close-btn" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#cerrarModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL LIBRO IVA COMPRA -->
    <div class="modal" id="modalIVAcompra">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Informes Libro IVA Compra</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="imprimir/impIvaCompra" method="post">
                        <div class="form-row">
                            <div class="col-sm-6 pt-4" style="border-bottom: 1px solid black;">
                                <h6>Tipo de Informe</h6>
                            </div>
                            <div class="col-sm-3">
                                <label for="tipoFitro">Tipo de filtro:</label>
                                <select id="tipoFiltro" class="custom-select custom-select-sm" name="selectFiltro">
                                    <option id="tf1" value="fContab">Fecha Contabilizacion</option>
                                    <option id="tf2" value="fComprobante">Fecha Comprobante</option>
                                    
                                </select>
                                
                            </div>
                            <div class="col-sm-3">
                                <label for="compLib" >Tipo Comprobante:</label>
                                <select id="compLib" class="custom-select custom-select-sm" name="selectComp">
                                    <option id="tf1" value="[A]">A</option>
                                    <option id="tf2" value="[B]">B</option>
                                    <option id="tf2" value="[C]">C</option>
                                    <option id="tf2" value="todos">Todos</option>
                                </select>
                                
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-sm-3 pt-4" style="border-bottom: 1px solid black;">
                                <h6>Datos a imprimir</h6>
                            </div>
                            <div class="col-sm-3">
                                <label for="tipoFechaLibro">Fecha:</label>
                                <select id="tipoFechaLibro" class="custom-select custom-select-sm" name="selectF">
                                    <option id="tf1" value="fContab">De Contabilización</option>
                                    <option id="tf2" value="fComprobante">De Comprobante</option>
                                    
                                </select>
                                
                            </div>
                            <div class="col-sm-3">
                                <label for="dtDesdeLib">Fecha desde:</label>
                                
                                <input id="dtDesdeLib" class="form-control form-control-sm" type="date" name="fDesde" value="<?php echo date("Y-m-d"); ?>">
                                
                            </div>
                            <div class="col-sm-3">
                                <label for="dtHastaLib">Fecha hasta:</label>
                                <input id="dtHastaLib" class="form-control form-control-sm" type="date" name="fHasta" value="<?php echo date("Y-m-d"); ?>">
                                
                            </div>
                        </div> <br>
                        <div class="form-row">
                            <div class="col-sm-6 pt-4" style=" border-bottom: 1px solid black;">
                                <h6>Impresión</h6>
                            </div>
                            <div class="col-sm-3">
                                <label for="formato">Formato:</label>
                                <select id="formato" class="custom-select custom-select-sm" name="formato">
                                    <option id="a4" value="a4">A4</option>
                                    <option id="carta" value="carta">Carta</option>
                                    <option id="oficio" value="oficio">Oficio</option>
                                </select>
                                
                            </div>
                            <div class="col-sm-3">
                                <label for="ordenar">Ordenar:</label>
                                
                                <select id="ordenar" class="custom-select custom-select-sm" name="selectOrden">
                                    <option id="tf1" value="fecha">Fecha</option>
                                    <option id="tf2" value="total">Monto</option>
                                    <option id="tf2" value="apeynom">Proveedor</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="m-3 float-right">
                            
                  <!--   <button id="excel" class="btn btn-primary btn-sm" type="button" >Exportar a Excel</button> -->
                     <button id="1" name="imprimir" value="1" class="btn btn-primary btn-sm"  type="submit">Exportar a excel</button>
                            <button id="2" name="imprimir"  value="2" class="btn btn-primary btn-sm" type="submit" >Imprimir</button>
                        </div>
                    </form>
           <!--      <form action="excel/exportar_excel1" method="post">
  
  <button type="submit">exportar</button>
</form> -->
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- MODAL IVA VENCIMIENTO -->
    <div class="modal" id="modalVencimiento">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Informes Libro IVA Compra</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="imprimir/imprimirVencimiento" method="post">
                    <div class="form-row">
                        <div class="col-sm-8 pt-4 border border-top-0 border-right-0 border-left-0" >
                            <h6>Incluir vencimiento hasta el</h6>
                        </div>
                        <div class="col-sm-4">
                            <label for="fechaHastaVen">Fecha Hasta:</label>
                            <input id="fechaHastaVen" class="form-control form-control-sm" type="date" name="fechaHastaVen" value="<?php echo date("Y-m-d"); ?>">
                            
                        </div>
                    </div><br>
                    <!-- <div class="form-row">
                        <div class="col-sm-8 pt-4 border border-top-0 border-right-0 border-left-0" >
                            <h6>Oprciones de página</h6>
                        </div>
                        <div class="col-sm-4">
                            <label for="ordenaPor">Ordenar por</label>
                            <select id="ordenaPor" class="custom-select custom-select-sm" name="selectF">
                                <option id="tf1" value="apeynom">Proveedor</option>
                                <option id="tf2" value="fecha">Vencimiento</option>
                                <option id="tf2" value="total">Monto</option>
                            </select>
                            
                            
                            
                            
                        </div>
                        
                    </div> <br> -->
                     <div class="form-row">
                            <div class="col-sm-6 pt-4 border border-top-0 border-right-0 border-left-0">
                                <h6>Impresión</h6>
                            </div>
                            <div class="col-sm-3">
                                <label for="formato">Formato:</label>
                                <select id="formato" class="custom-select custom-select-sm" name="formato">
                                    <option id="a4" value="a4">A4</option>
                                    <option id="carta" value="carta">Carta</option>
                                    <option id="oficio" value="oficio">Oficio</option>
                                </select>
                                
                            </div>
                            <div class="col-sm-3">
                                <label for="ordenar">Ordenar:</label>
                                
                                <select id="ordenar" class="custom-select custom-select-sm" name="selectOrden">
                                    <option id="tf1" value="ven">Vencimiento</option>
                                    <option id="tf2" value="total">Monto</option>
                                    <option id="tf2" value="apeynom">Proveedor</option>
                                    
                                </select>
                            </div>
                        </div>

                    <div class="m-3 float-right">
                        
                        <button id="ImprimirVen" class="btn btn-primary btn-sm" type="submit" >Imprimir</button>
                    </div>
                    
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDITAR FECHA Y NUNERO -->
    <div class="modal" id="modalEditar">
        
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Editar Fecha y Numero</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                
                <div class="modal-body">
                    
                    <div class="form-row">
                        <div class="col-sm-6 pt-1 border border-top-0 border-right-0">
                            <label>Proveedor</label></br>
                            <label id="eProvv" class="text-uppercase font-weight-bold"></label>
                        </div>
                        <div class="col-sm-3">
                            <label for="">F.Carga</label>
                            <input type="date" class="form-control form-control-sm" id="eFcom">
                            
                        </div>
                        <div class="col-sm-3">
                            <label for="compLib" >F.Vencimiento</label>
                            <input type="date" class="form-control form-control-sm" id="eFven">
                            
                        </div>
                    </div>
                    <div class="form-row pt-3">
                        <div class="col-sm-6 border border-top-0 border-left-0 border-right-0"></br>
                            <h6 class="pb-1">Datos del comprobante</h6>
                        </div>
                        <div class="col-sm-2">
                            <label for="">Comprobante</label>
                            <select id="comprobante" class="custom-select custom-select-sm" >
                                <option id="tf1" value="[A]">Factura</option>
                                
                                
                            </select>
                            
                        </div>
                        <div class="col-sm-1">
                            <label for="dtDesdeLib">Tipo</label>
                            
                            <select id="tipoCom" class="custom-select custom-select-sm" >
                                <option id="tf1" value="[A]">A</option>
                                <option id="tf2" value="[B]">B</option>
                                <option id="tf3" value="[C]">C</option>
                                <option id="tf4" value="[M]">M</option>
                                <option id="tf5" value="[X]">X</option>
                                
                            </select>
                            
                        </div>
                        <div class="col-sm-1">
                            <label for="dtHastaLib">Pto.Vta</label>
                            <input id="epta" class="form-control form-control-sm text-right" type="text" >
                            
                        </div>
                        <div class="col-sm-2">
                            <label for="dtHastaLib">Numero</label>
                            <input id="eComm" class="form-control form-control-sm text-right" type="text">
                            
                        </div>
                    </div>
                    <div class="m-3 float-right">
                        
                        <button id="" class="btn btn-primary btn-sm" type="button" >Aceptar</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDITAR FECHA Y NUNERO -->
    <div class="modal" id="modalEditarFcon">
        
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Editar Fecha de Contabilizacion</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                
                <div class="modal-body">
                    
                    <div class="form-row">
                        <div class="col-sm-9 pt-1 border border-top-0 border-right-0">
                            <label>Proveedor</label></br>
                            <label id="eProvv1" class="text-uppercase font-weight-bold"></label>
                        </div>
                        <div class="col-sm-3">
                            <label for="">F.Contabilizacion</label>
                            <input type="date" class="form-control form-control-sm" id="eFcontab">
                            
                        </div>
                    </div>
                    <div class="m-3 float-right">
                        
                        <button class="btn btn-primary btn-sm" type="button" >Aceptar</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDITAR CONDICION -->
    <div class="modal" id="modalEditarCondicion">
        
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Editar Condicion</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                
                <div class="modal-body">
                    
                    <div class="form-row">
                        <div class="col-sm-9 pt-1 border border-top-0 border-right-0">
                            <label>Proveedor</label></br>
                            <label id="eProvv2" class="text-uppercase font-weight-bold"></label>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Forma de pago</label>
                            
                            <select id="select_formaPago" class="custom-select custom-select-sm" >
                                <option id="ctacte" value="1">Cuenta Corriente</option>
                                <option id="contado" value="2">Contado</option>
                                
                                
                            </select>
                            
                        </div>
                    </div>
                    
                    <div class="m-3 float-right">
                        
                        <button class="btn btn-primary btn-sm" type="button" >Aceptar</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    
    </div>

<!-- The Modal -->
<div class="modal" id="pendienteFacturar" >
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
                <span>Proveedor:</span>
                <br/>
                     <select id="cboProveedor" class="custom-select custom-select-sm" >
                                
                                
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

                <button id="btnFacturar" class="btn btn-primary btn-sm" type="button">Facturar</button>

                </div>
</form>
        </div>
            </div>

            

        </div>
    </div>
    <script type="text/javascript">
    var baseurl = "<?php echo base_url();?>";


    
    </script>
    
    <!-- SCRIPT AUTOCOMPLETE NOMBRE PROVEEDOR -->
    <script type="text/javascript">
        var idProveedor = "";
    function autocompletar(idProv) {

    
    
    
        // $(document).ready(function(){
                $("#" + idProv).autocomplete({

    source: 'compras/getNombre',
    select: function(event, ui){
    // saldosPendientes(ui.item.cuit);
    var agregar = 0;
    
    agregar = ui.item.n;
    if(agregar == 1){
    
    modalAltaProveedor();
    
    }else{
        
    $('[name="nProveedor"]').val(ui.item.label);
    // $("#proveedor").val(ui.item.label);
    idProveedor = ui.item.cuit;
    
    }
    }
    
    });
    // $( "#proveedor" ).on( "autocompletechange", function( event, ui ) {
    //  alert('hola');
    // } );
    // });
}
    </script>
    <script>
    
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>


    <!-- SCRIPT AUTOCOMPLETE NOMBRE PRODUCTO -->
    <script type="text/javascript">
      
    </script>
<script type="text/javascript">
    $(document).ready(function () {
$('#tablaRemito').DataTable({
"scrollY": "200px",
"scrollCollapse": true,
});
$('.dataTables_length').addClass('bs-select');
});
    </script>



</body>