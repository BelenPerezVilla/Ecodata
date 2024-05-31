<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - Ventas</title>
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
            <a class="navbar-brand ps-3" href="Administracion-contable.php">Ventas</a>
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
            $where = "WHERE IdVentas LIKE '%$buscar%'";
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
                            <!-- Menu Productos--> 
                       <div class="sb-sidenav-menu-heading">Administracion contable</div>
                            <a class="nav-link" href="Administracion-contable-Contabilidad.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Contabilidad
                            </a>
                            <a class="nav-link" href="Administracion-contable-Ventas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Ventas
                            </a>
                            <a class="nav-link" href="Administracion-contable-DetalleVenta.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Detalle Ventas
                            </a>
                            <a class="nav-link" href="Administracion-contable-Compra.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Compra
                            </a>
                            <a class="nav-link" href="Administracion-contable-DetalleCompra.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Detalle Compra
                            </a>
                            <a class="nav-link" href="Administracion-contable-Factura.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Factura
                            </a>
                            <a class="nav-link" href="Administracion-contable-Pedido.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pedido
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada:</div>
                        Contabilidad
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <form method="POST">
                        <?php
                    include "conexion.php";
                    include "Controladores/Registro/Registro_Ventas.php";
                    ?>                        
                        
                        <section class="form-register">
                        <h4>Registro</h4>
                            <input class="controls" type="hidden" name="IdVentas" id="IdVentas" placeholder="ID de la venta" readonly>
                            <input class="controls" type="number" name="IdClientes" id="IdClientes" placeholder="Ingrese ID del cliente ">
                            <input class="controls" type="number" name="IdInventarioP" id="IdInventarioP" placeholder="Ingrese ID Inventario producto">
                            <input class="controls" type="number" name="IdProducto" id="IdProducto" placeholder="Ingrese ID del producto">                                               
                            <input class="controls" type="number" name="CantidadProducto" id="CantidadProducto" placeholder="Ingrese la cantidad del producto">                                               
                            <input class="controls" type="number" name="Monto" id="Monto" placeholder="Ingrese monto">
                            <h20>Fecha de venta</h20>
                            <input class="controls" type="date" name="FechaVenta" id="FechaVenta" placeholder="Seleccione fecha de venta">                     
                            <input class="controls" type="text" name="EstadoVenta" id="EstadoVenta" placeholder="Ingrese estado de la venta">
                            <input class="controls" type="text" name="MetodoPago" id="MetodoPago" placeholder="Ingrese metodo de pago">                                               
                            <button class="botons" type="submit" name="btmRegistrarV" value="Ok">Registrar</button>
                            <button class="botons" type="button"  onclick="location.href='fpdf/RVenta.php'">Imprimir pdf</button>

                          </section>
                        </form>

                    

                        <div name="tabla" class="card mb-4">
                        <br>
                            
                            
                            <div class="card-body">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">IdVentas</th>
                                    <th scope="col">IdClientes</th>
                                    <th scope="col">IdInventarioP</th>
                                    <th scope="col">IdProducto</th>
                                    <th scope="col">CantidadProducto</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">FechaVenta</th>
                                    <th scope="col">EstadoVenta</th>
                                    <th scope="col">MetodoPago</th>
                                    
                                </tr>
                            </thead>
                    <tbody>

                            <?php
                            include "conexion.php";
                            $sql=$conexion->query("SELECT * FROM Ventas $where");
                                while($datos=$sql->fetch_object()){?>
                                <tr>
                                <th><?=$datos->IdVentas?></th>
                                        <td><?=$datos->IdClientes?></td>
                                        <td><?=$datos->IdInventarioP?></td>
                                        <td><?=$datos->IdProducto?></td>
                                        <td><?=$datos->CantidadProducto?></td>
                                        <td><?=$datos->Monto?></td>
                                        <td><?=$datos->FechaVenta?></td>
                                        <td><?=$datos->EstadoVenta?></td>
                                        <td><?=$datos->MetodoPago?></td>
                                    <td>
                                    <a href="MVentas.php?id=<?=$datos->IdVentas?>"><i class="fa-regular fa-keyboard"></i></a>
                                        <a href="Eliminar_Ventas.php?id=<?=$datos->IdVentas?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a>
                                        <a href="fpdf/RVenta_ID.php?id=<?=$datos->IdVentas?>"><i class="fa-solid fa-print"></i></a>

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
