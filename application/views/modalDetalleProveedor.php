<!-- MODAL INFORMACION DE proveedores -->

<div class="modal" id="modalDetalleProveedor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detalle Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                             
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

    </div>


