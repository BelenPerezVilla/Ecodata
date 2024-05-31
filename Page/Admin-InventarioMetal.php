<!DOCTYPE html>


<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata -  Admin Inventario Metal</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/tablas.css" rel="stylesheet" />
        <link href="css/Campos.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <?php
    include_once("conexion.php");
    
    ?>

    <body class="sb-nav-fixed">
    
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navegador Brand-->
            <a class="navbar-brand ps-3" href="Admin.php" >Inventario Metal</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navegador Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    <div class="input-group">
        <form method="GET" action="">
            <input class="form-control" type="search" name="busqueda" placeholder="Buscar..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" name="enviar" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <?php
    include "conexion.php";
    $where = "";
    if (isset($_GET['enviar'])) {
        $buscar = $_GET['busqueda'];
        if (!empty($buscar)) {
            $where = "WHERE IdInventarioM LIKE '%$buscar%'";
        }
    }
    ?>
</form>
            <!-- Navegador-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Controladores/_sesion/cerrarSesion.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- Menu bodegas--> 
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProveedor" aria-expanded="false" aria-controls="collapseProveedor">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Bodegas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProveedor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Almacen.php">Almacen</a>
                                    <a class="nav-link" href="Admin-InventarioMetal.php">Inventario Metal</a>
                                    <a class="nav-link" href="Admin-InventarioProductos.php">Inventario Productos</a>
                                    <a class="nav-link" href="Admin-Proveedor.php">Proveedores</a>
                                </nav>
                            </div>
                            <!-- Productos y especificaciones--> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProEspe" aria-expanded="false" aria-controls="collapseProEspe">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Productos y especificaciones
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProEspe" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Productos.php">Productos</a>
                                    <a class="nav-link" href="Admin-ProductoFierro.php">Productos Fierro</a>
                                    <a class="nav-link" href="Admin-ControlCalidad.php">Control Calidad</a>
                                    <a class="nav-link" href="Admin-DetalleProducto.php">Detalle Producto</a>
                                </nav>
                            </div>
                            <!-- Menu mantenimiento y transporte--> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseManteTran" aria-expanded="false" aria-controls="collapseManteTran">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Mantenimiento y transporte
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseManteTran" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Mantenimiento.php">Mantenimiento</a>
                                    <a class="nav-link" href="Admin-Transporte.php">Transporte</a>
                                    <a class="nav-link" href="Admin-Maquinaria.php">Maquinaria</a>
                                    <a class="nav-link" href="Admin-Embarques.php">Embarques</a>
                                </nav>
                            </div>
                            <!-- Menu procesos--> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProcess" aria-expanded="false" aria-controls="collapseProcess">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Procesos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProcess" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Produccion.php">Produccion</a>
                                    <a class="nav-link" href="Admin-ProduccionProducto.php">Produccion producto</a>
                                    <a class="nav-link" href="Admin-ProcesoReciclaje.php">Proceso Reciclaje</a>
                                </nav>
                            </div>
                            <!-- Menu administracion contable--> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdminCon" aria-expanded="false" aria-controls="collapseAdminCon">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Administración contable
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAdminCon" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Contabilidad.php">Contabilidad</a>
                                    <a class="nav-link" href="Admin-Ventas.php">Ventas</a>
                                    <a class="nav-link" href="Admin-DetalleVenta.php">Detalle Ventas</a>
                                    <a class="nav-link" href="Admin-Compra.php">Compra</a>
                                    <a class="nav-link" href="Admin-DetalleCompra.php">Detalle compra</a>
                                    <a class="nav-link" href="Admin-Factura.php">Factura</a>
                                    <a class="nav-link" href="Admin-Pedido.php">Pedido</a>
                                </nav>
                            </div>

                            <!-- Menu Privilegios--> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePrivi" aria-expanded="false" aria-controls="collapsePrivi">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Privilegios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePrivi" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Personal.php">Personal</a>
                                    <a class="nav-link" href="Admin-Clientes.php">Clientes</a>
                                    <a class="nav-link" href="Admin-Login.php">Login</a>
                                    <a class="nav-link" href="Admin-Areas.php">Areas</a>
                                </nav>
                            </div>        
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada:</div>
                        Administrador
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <form method="POST">
                        <?php
                    include "conexion.php";
                    include "Controladores/Registro/Registro_InventarioMetal.php";
                    ?>                        
                        
                        <section class="form-register">
                            <h4>Registro</h4>
                            <input class="controls" type="hidden" name="IdInventarioM" id="IdInventarioM" placeholder="Ingrese ID">
                            <input class="controls" type="numbers" name="IdAlmacen" id="IdAlmacen" placeholder="Ingrese ID del almacen">
                            <input class="controls" type="number" name="IdCompra" id="IdCompra" placeholder="Ingrese ID de la compra">
                            <input class="controls" type="number" name="IdFierro" id="IdFierro" placeholder="Ingrese ID del fierro">
                            <input class="controls" type="number" name="IdProveedor" id="IdProveedor" placeholder="Ingrese ID del proveedor">
                            <input class="controls" type="text" name="TipoMetal" id="TipoMetal" placeholder="Ingrese tipo del metal">
                            <input class="controls" type="number" name="CantidadDisponible" id="CantidadDisponible" placeholder="Ingrese cantidad disponible">
                            <input class="controls" type="date" name="FechaEntrada" id="FechaEntrada" placeholder="Ingrese fecha de entrada">
                            <input class="controls" type="text" name="EstadoCalidad" id="EstadoCalidad" placeholder="Ingrese su estado de calidad">
                            <input class="controls" type="text" name="UbicacionAlmacen" id="UbicacionAlmacen" placeholder="Ingrese ubicacion del almacen">
                            <input class="controls" type="text" name="EstadoDisponible" id="EstadoDisponible" placeholder="Ingrese estado">
                            <button class="botons" type="submit" name="btmRegistrarIM" value="ok">Registrar</button>
                          </section>
                        </form>

                    

                        <div name="tabla" class="card mb-4">
                        <br>
                            
                            
                            <div class="card-body">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">IdInventarioM</th>
                                    <th scope="col">IdAlmacen</th>
                                    <th scope="col">IdCompra</th>
                                    <th scope="col">IdFierro</th>
                                    <th scope="col">IdProveedor</th>
                                    <th scope="col">TipoMetal</th>
                                    <th scope="col">CantidadDisponible</th>
                                    <th scope="col">FechaEntrada</th>
                                    <th scope="col">EstadoCalidad</th>
                                    <th scope="col">UbicacionAlmacen</th>
                                    <th scope="col">EstadoDisponible</th>
                                    
                                </tr>
                            </thead>
                    <tbody>

                            <?php
                            include "conexion.php";
                            $sql=$conexion->query("SELECT * FROM InventarioMetal $where");
                                while($datos=$sql->fetch_object()){?>
                                <tr>
                                        <th><?=$datos->IdInventarioM?></th>
                                        <th><?=$datos->IdAlmacen?></th>
                                        <th><?=$datos->IdCompra?></th>
                                        <th><?=$datos->IdFierro?></th>
                                        <th><?=$datos->IdProveedor?></th>
                                        <th><?=$datos->TipoMetal?></th>
                                        <th><?=$datos->CantidadDisponible?></th>
                                        <th><?=$datos->FechaEntrada?></th>
                                        <th><?=$datos->EstadoCalidad?></th>
                                        <th><?=$datos->UbicacionAlmacen?></th>
                                        <th><?=$datos->EstadoDisponible?></th>
                                    <td>
                                        <a href="MInventarioMetal-A.php?id=<?=$datos->IdInventarioM?>"><i class="fa-regular fa-keyboard"></i></a>
                                        <a href="Eliminar_InventarioMetal-A.php?id=<?=$datos->IdInventarioM?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a>
                                    </td>
                                </tr>     
                        <?php
                        }
                        ?>
    
    
                    </tbody>
                    </table>
                                
                        </div>
                    </div>
                </main>
            
                
            
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Ecodata 2024.01</div>
                            <div>
                                <a href="#">Politicas y privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
