    <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped table-sm" id="tablaProveedores">
        <thead class="thead-light font-italic">
            <tr >
                <th>Apellido y Nombre / Razon</th>
                <th>C.U.I.T</th>
                <th>Domicilio</th>
                <th>Localidad</th>
                <th>Telefono</th>
                <th>Saldo</th>
<!--                <th>Plazo</th> -->          
            </tr>
        </thead>
        <tbody>
            
        </tbody>

    </table>

    
    </div>


    <!-- ALTA PROVEEDOR -->
<!-- <div class="modal" id="AltaProveedor">
    <div class="modal-dialog modal-mb">
        <div class="modal-content"> -->

            <!-- Modal Header -->
        <!--    <div class="modal-header">
                <h4 class="modal-title">Alta Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->

            <!-- Modal body -->
            <!-- <div class="modal-body">

                    <div class="form-row">
                        
                            <div class="col-sm-3">
                                <label for="dtRem">C.U.I.T:</label>
                                 <input class="form-control form-control-sm" type="text" name="cuitProveedor" id="cuitProveedor">
                        </div>

                        <div class="col-sm-9">
                                 <label for="provRem">Nombre y Apellido/Razon social:</label>
                                <input type="text" class="form-control form-control-sm" name="pro" id="nombreProveedor" size="69" required>
                                </div>
                             
                        
                        
                        </div>


                        <div class=" form-row">
                        
                                                        
                        <div  class="col-sm-4">
                                <label for="comprobobanteRem">Domicilio:</label>
                                            <input type="text" class="form-control form-control-sm" name="domicilioProv" id="domicilioProveedor" required>
                                </div>
                        

                        <div class="col-sm-4">
                                <label for="tipoFrem">Localidad:</label>
                                <input type="text" class="form-control form-control-sm" name="localidadProveedor" id="localidadProveedor" required>
                                </div>
                                                
                        

                        <div class="col-sm-4">
                                 <label for="pv">Telefono:</label>
                                                <input id="telefonoProveedor" class="form-control form-control-sm" type="text" name="telefonoProveedor">
                        </div> 

                        </div>

    
                    </br>


                    
                        <div class="m-2 float-right">
                        
                            <button type="button" class="btn btn-primary btn-sm" name="aceptarNuevoRem" onclick="registrarProveedor();">Aceptar</button>

                            <button id="close-btn" class="btn btn-primary btn-sm" type="button" onclick="closeModal();">Cerrar</button>
                        </div>

                     </div>
             </div>
</div>
</div> -->


<!-- MODAL INFORMACION DE proveedores -->

<!-- <div class="modal" id="modalDetalleProveedor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> -->

            <!-- Modal Header -->
            <!-- <div class="modal-header">
                <h4 class="modal-title">Detalle Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->

            <!-- Modal body -->
            <!-- <div class="modal-body">
                             
         <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#detalle">Detalle</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#ctacte">Cta.Cte</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#compras">Compras</a>
    </li>
  </ul>

  <div class="tab-content">
       <div id="detalle" class="container tab-pane active"><br>
                    <div class="form-row">
                        <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                 Nombre y Apellido o Razon Social
                                <label class="float-right" id="eProveedor"></label>
                                </div>
                    </div>
                    
                    <div class="form-row">
                                <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                Datos Fiscales
                        <label class="float-right" id="cuit"></label>
                        </div>
                     </div>

                     <div class="form-row">
                                <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                Domicilio
                        <label class="float-right" id="domicilio"></label>
                        </div>
                     </div>
                     
                     <div class="form-row">
                        <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                Localidad
                     <label class="float-right" id="localidad"></label>
                    
                        </div>

                        </div>

                        <div class="form-row">
                        <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                Telefono
                     <label class="float-right" id="telefono"></label>
                    
                        </div>

                        </div>

                        <div class="form-row">
                        <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                Cta.Cte :: Saldo
                     <label class="float-right text-danger" id="saldo"></label>
                    
                        </div>
                        </div>
        </div>
                    
                    <div id="ctacte" class="container tab-pane fade"><br>
                      <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                Proveedor
                     <label class="float-right" id="ctaProveedor"></label>
                    </div>
                     
                     <div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">
                            <small> Detalle Cta.Cte</small>
                     </div>

                     <div id="contenidoTabla" class="row-sm-5">
                        <div class="table-responsive" style="height: 180px;">

                     <table id ="tablacta" class="table table-hover table-bordered table-sm table-striped ">
                        <thead class="bg-dark text-white">
                                
                            <tr>
                             <th>Fecha</th>
                             <th>Comprobante</th>
                             <th>Monto Orig.</th>
                             <th>Debe</th>
                             <th>Haber</th>
                             <th>Saldo</th>
                         </tr>
                        </thead>
                     <tbody style="overflow-y: scroll;">
                        

                     </tbody>
                     </table>
                 
                     </div>
                    </div>

                        


                     </div>

           
                    <div id="compras" class="container tab-pane fade"><br>
                       <div class="col-sm-12 border border-top-0 border-right-0 border-left-0">
                                Proveedor
                     <label class="float-right" id="compraProveedor"></label>
                    </div>
                     
                     <div class="col-sm-12 border border-top-0 border-right-0 border-left-0 pt-1">
                            <small> Detalle Compras</small>
                     </div>

                     <div id="contenidoTablaCompras" class="row-sm-5">
                        <div class="table-responsive" style="height: 180px;">

                     <table id ="tablaComprasProveedor" class="table table-hover table-bordered table-sm table-striped ">
                        <thead class="bg-dark text-white">
                                
                            <tr>
                             <th>Fecha</th>
                             <th>Comprobante</th>
                             <th>Total</th>
                         </tr>
                        </thead>
                     <tbody style="overflow-y: scroll;">
                        

                     </tbody>
                     </table>
                 
                     </div>
                    </div>
                    </div>

    </div></br>
    
                        
                    
                        
                


<div class="m-2 float-right">
    <button id="btn_editarProveedor" class="btn btn-primary btn-sm" type="button">Editar</button>
    <button id="btn_editarAceptarP" class="btn btn-primary btn-sm" type="button" disabled="">Aceptar</button>
    <button id="btn_editarEliminarP" class="btn btn-primary btn-sm" type="button">Eliminar</button>
    <button id="close-btn" class="btn btn-primary btn-sm" type="button" onclick="closeModal();" >Salir</button>

</div>

        
            
    
         </div> 
    </div>

</div>

    </div> -->

<!-- Modal listado de proveedores -->
<div class="modal" id="modalListadoProveedores">
        
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Listado de Proveedores</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                
                <div class="modal-body">
                    
                    <form action="imprimir/listadoProveedores" method="post">
                    <div class="form-row">
                        
                        <div class="col-sm-6 pt-1 border border-left-0 border-top-0 border-right-0">
                            <label>Proveedor</label></br>
                            <label id="eProvv2" class="text-uppercase font-weight-bold"></label>
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
                                    <option id="tf1" value="apeynom">Nombre</option>
                                    <option id="tf2" value="localidad">Localidad</option>
                                <!--     <option id="tf2" value="apeynom">Proveedor</option> -->
                                    
                                </select>
                            </div>

                        
                        
                    </div>
                    
                    <div class="m-3 float-right">
                        
                        <button class="btn btn-primary btn-sm" type="submit" >Imprimir</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
<!-- Modal informe Cuenta corriente -->
<div class="modal" id="modalCuentaCorriente">
        
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Infome Cuenta Corriente</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#cerrarModal">&times;</button>
                </div>
                
                <div class="modal-body">
                    
                    <form action="imprimir/listadoCCProv" method="post">
                    <div class="form-row">
                        
                        <div class="col-sm-3 pt-1 border border-left-0 border-top-0 border-right-0">
                            <label>Datos</label></br>
                           <!--  <label id="eProvv2" class="text-uppercase font-weight-bold"></label> -->
                        </div>
                        
                         <div class="col-sm-3">
                                <label for="tipoFechaLibro">Tipo de fecha:</label>
                                <select id="tipoFechaLibro" class="custom-select custom-select-sm" name="selectFecha">
                                    <option id="tf1" value="fContab">De Contabilización</option>
                                    <option id="tf2" value="fechaCarga">De Comprobante</option>
                                    <option id="tf2" value="ven">De Vencimiento</option>
                                </select>
                                
                            </div>

                              <div class="col-sm-3">
                                <label for="dtDesdeCC">Fecha desde:</label>
                                
                                <input id="dtDesdeCC" class="form-control form-control-sm" type="date" name="dtDesdeCC" value="<?php echo date("Y-m-d"); ?>">
                                
                            </div>
                            <div class="col-sm-3">
                                <label for="dtHastaCC">Fecha hasta:</label>
                                <input id="dtHastaCC" class="form-control form-control-sm" type="date" name="dtHastaCC" value="<?php echo date("Y-m-d"); ?>">
                                
                            </div>

                        </div>

                        <div class="form-row">
                        
                        <div class="col-sm-8 pt-1 border border-left-0 border-top-0 border-right-0">
                            <label>Filtros</label></br>
                           <!--  <label id="eProvv2" class="text-uppercase font-weight-bold"></label> -->
                        </div>
                    
                            <div class="col-sm-2">
                               <label for="provRem">Proveedores sin saldo</label></br>
                            
                        
                              <div class="border">               
                              <div class="form-check form-check-inline ml-2 mt-2 ">
                              <input class="form-check-input" type="radio" name="rbProvSaldo" id="Si" value="0" checked>
                              <label class="form-check-label" for="asSi">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="rbProvSaldo" id="No" value="1">
                              <label class="form-check-label" for="asNo">No</label>
                              </div>
                              </div>
                              </div> 


                              <div class="col-sm-2">
                                <label for="saldos">Filtrar saldos < a $</label>
                                
                                <input id="saldos" class="form-control form-control-sm" type="text" name="saldos">
                                
                            </div>



                            <div class="form-row">
                        
                        <div class="col-sm-6 pt-1 border border-left-0 border-top-0 border-right-0">
                            <label>Opciones de Pagina</label></br>
                           <!--  <label id="eProvv2" class="text-uppercase font-weight-bold"></label> -->
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
                                    <option id="tf1" value="apeynom">Nombre</option>
                                    <option id="tf2" value="saldo">Monto</option>
                                <!--     <option id="tf2" value="apeynom">Proveedor</option> -->
                                    
                                </select>
                            </div>

                          
                
                    </div>
                             
                        
                    </div>
                    <div class="m-3 float-right">
                        
                        <button class="btn btn-primary btn-sm" type="submit" >Imprimir</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>