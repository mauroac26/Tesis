<div class="">

                <nav class="navbar navbar-expand-sm  navbar-dark bg-dark fixed-bottom text-white">
                    <i class="fa fa-search"></i>
                    <div class="col-sm-2">
                    
        <input type="text" id="idSearch" placeholder="Buscar Proveedor" class="form-control form-control-sm" style="height: 25px;" onkeyup="doSearch('tablaCompras');">
</div>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#cNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse font-weight-normal" id="cNavbar">
                        <ul  class="nav navbar-nav navbar-right" >

                <li class="nav-item"><a href="" id="altaProducto" onclick="modalAltaProducto();" class="nav-link" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Pago"><i class="fa fa-plus fa-fw" aria-hidden="true"></i></a></li>
                 
                         
                        <div class="dropup">
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Administrar</a>

                            <div class="dropdown-menu bg-light">
                                <h5 class="dropdown-header bg-dark">ADMINISTRAR</h5>
                                <a class="dropdown-item" id="linkAdministrar" data-toggle="modal" href="#modalAdministrar">Marcas y Categorias</a>
                                <!-- <a class="dropdown-item" id="modalVencimiento" href="" data-toggle="modal">Contado</a> -->
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
<!--                    <ul class="pagination pagination-sm justify-content-end" style="margin:5px 0;">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul> -->
            </nav>
            </div>

        
<!-- </div> -->
<script type="text/javascript" src="js/productos.js"></script>
<!-- <script type="text/javascript" src="js/compras.js"></script> -->
<script type="text/javascript" src="js/operaciones.js"></script>
<!-- <script type="text/javascript" src="js/proveedores.js"></script> -->


 


</body>



</html>