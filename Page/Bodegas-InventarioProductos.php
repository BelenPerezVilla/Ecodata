<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - Inventario Productos</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/tablas.css" rel="stylesheet" />
        <link href="css/Campos.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Bodegas.php">Inventario Productos</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
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
            $where = "WHERE IdInventarioP LIKE '%$buscar%'";
        }
    }
    ?>
</form>
            <!-- Navbar-->
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
                            <!-- Menu Bodegas--> 
                            <div class="sb-sidenav-menu-heading">Bodegas</div>
                            <a class="nav-link" href="Bodegas-Almacen.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Almacen
                            </a>
                            <a class="nav-link" href="Bodegas-InventarioMetal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Inventario Metal
                            </a>
                            <a class="nav-link" href="Bodegas-InventarioProductos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Inventario Productos
                            </a>
                            <a class="nav-link" href="Bodegas-Proveedores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Proveedores
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada:</div>
                        Almacen
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <form method="POST">
                        <?php
                    include "conexion.php";
                    include "Controladores/Registro/Registro_InventarioProductos.php";
                    ?>                        
                        
                        <section class="form-register">
                        <input class="controls" type="hidden" name="IdInventarioP" id="IdInventarioP" placeholder="Ingrese ID ">
                            <input class="controls" type="number" name="IdAlmacen" id="IdAlmacen" placeholder="Ingrese ID del almacen">
                            <input class="controls" type="number" name="IdProducto" id="IdProducto" placeholder="Ingrese ID del productos">
                            <input class="controls" type="number" name="IdProduccion" id="IdProduccion" placeholder="Ingrese ID producción">
                            <input class="controls" type="text" name="TipoProducto" id="TipoProducto" placeholder="Ingrese tipo del producto">
                            <input class="controls" type="number" name="CantidadStock" id="CantidadStock" placeholder="Ingrese cantidad en stock">
                            <input class="controls" type="text" name="UbicacionAlmacen" id="UbicacionAlmacen" placeholder="Ingrese ubicacion del almacen">
                            <h30>Fecha de fabricacion</h30>
                            <input class="controls" type="date" name="FechaFabricacion" id="FechaFabricacion" placeholder="Ingrese fecha de fabricacion">
                            <h30>Fecha de entrada</h30>
                            <input class="controls" type="date" name="FechaEntrada" id="FechaEntrada" placeholder="Ingrese fecha de entrada">
                            <input class="controls" type="number" name="PrecioCompraUnitario" id="PrecioCompraUnitario" placeholder="Ingrese precio unitario de compra ">
                            <input class="controls" type="number" name="PrecioVenta" id="PrecioVenta" placeholder="Ingrese precio de venta">
                            <input class="controls" type="text" name="EstadoDisponibilidad" id="EstadoDisponibilidad" placeholder="Ingrese su estado de disponibilidad">
                            <input class="controls" type="number" name="Rebastecimiento" id="Rebastecimiento" placeholder="Ingrese rebastecimiento">
                            <button class="botons" type="submit" name="btmRegistrarIP" value="Ok">Registrar</button>
                          </section>
                        </form>

                    

                        <div name="tabla" class="card mb-4">
                        <br>
                            
                            
                            <div class="card-body">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">IdInventarioP</th>
                                    <th scope="col">IdAlmacen</th>
                                    <th scope="col">IdProducto</th>
                                    <th scope="col">IdProduccion</th>
                                    <th scope="col">TipoProducto</th>
                                    <th scope="col">CantidadStock</th>
                                    <th scope="col">UbicacionAlmacen</th>
                                    <th scope="col">FechaFabricacion</th>
                                    <th scope="col">FechaEntrada</th>
                                    <th scope="col">PrecioCompraUnitario</th>
                                    <th scope="col">PrecioVenta</th>
                                    <th scope="col">EstadoDisponibilidad</th>
                                    <th scope="col">Rebastecimiento</th>
                                    
                                </tr>
                            </thead>
                    <tbody>

                            <?php
                            include "conexion.php";
                            $sql=$conexion->query("SELECT * FROM InventarioProductos $where");
                                while($datos=$sql->fetch_object()){?>
                                <tr>
                                <th><?=$datos->IdInventarioP?></th>
                                        <th><?=$datos->IdAlmacen?></th>
                                        <th><?=$datos->IdProducto?></th>
                                        <th><?=$datos->IdProduccion?></th>
                                        <th><?=$datos->TipoProducto?></th>
                                        <th><?=$datos->CantidadStock?></th>
                                        <th><?=$datos->UbicacionAlmacen?></th>
                                        <th><?=$datos->FechaFabricacion?></th>
                                        <th><?=$datos->FechaEntrada?></th>
                                        <th><?=$datos->PrecioCompraUnitario?></th>
                                        <th><?=$datos->PrecioVenta?></th>
                                        <th><?=$datos->EstadoDisponibilidad?></th>
                                        <th><?=$datos->Rebastecimiento?></th>
                                    <td>
                                    <a href="MInventarioProductos.php?id=<?=$datos->IdInventarioP?>"><i class="fa-regular fa-keyboard"></i></a>
                                        <a href="Eliminar_........php?id=<?=$datos->IdClientes?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a>
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
                            <div class="text-muted">Copyright &copy; Ecodata 2024</div>
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
