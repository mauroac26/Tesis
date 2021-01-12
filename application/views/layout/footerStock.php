<div class="">

                <nav class="navbar navbar-expand-sm  navbar-dark bg-dark fixed-bottom text-white">
                <div ><button class="btn btn-sm " id="btn_filtros"><i class="fa fa-filter fa-fw" aria-hidden="true"></i></button></div>
                    <i class="fa fa-search"></i>
                    <div class="col-sm-2">
                    
        <input type="text" id="idSearch" placeholder="Buscar Proveedor" class="form-control form-control-sm" style="height: 25px;" onkeyup="doSearch('tablaCompras');">
</div>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#cNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse font-weight-normal" id="cNavbar">
                        <ul  class="nav navbar-nav navbar-right" >

                <!-- <li class="nav-item"><a href="#myModal" class="nav-link" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Alta Compra"><img src="assets/add.png" width="25" height="25" class="d-inline-block align-center" alt=""></a></li> -->
                <li class="nav-item"><a href="#myModal" class="nav-link" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Alta Compra"><i class="fa fa-plus fa-fw" aria-hidden="true"></i></a></li>
                 
                       
                         
                        <div class="dropup">
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Operaciones</a>

                            <div class="dropdown-menu bg-light">
                                <h5 class="dropdown-header bg-dark">FORMA DE PAGO</h5>
                                <a class="dropdown-item" id="" data-toggle="modal" href="#modalIVAcompra">Cuenta corriente</a>
                                <a class="dropdown-item" id="modalVencimiento" href="" data-toggle="modal">Contado</a>
                            </div>
                            </li>
                            </div>

                          

                        <div class="dropup">
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-print fa-fw" aria-hidden="true"></i></a>

                            <div class="dropdown-menu bg-light">
                                <h5 class="dropdown-header bg-dark">INFORMES</h5>
                                <a class="dropdown-item" id="modalIVAcompra" data-toggle="modal" href="#modalIVAcompra">Libro IVA compra</a>
                                <a class="dropdown-item" id="modalVencimiento" href="#modalVencimiento" data-toggle="modal">Listado de vencimientos de proveedores</a>
                            </div>
                            </li>
                            </div>

                            
                            
                        </ul>


                
                    </div>
  <!--                   <ul class="pagination pagination-sm justify-content-end" style="margin:5px 0;">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul> -->
            </nav>
            </div>

        
<!-- </div> -->

<script type="text/javascript" src="js/operaciones.js"></script>
<script type="text/javascript" src="js/remito.js"></script>



 


</body>



</html>