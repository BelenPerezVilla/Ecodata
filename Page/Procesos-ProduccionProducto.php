<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - Produccion producto</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/tablas.css" rel="stylesheet" />
    <link href="css/Campos.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Procesos.php" >Producción producto</a>
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
            $where = "WHERE IdProduccion LIKE '%$buscar%'";
        }
    }
    ?>
</form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuración</a></li>
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
                            <div class="sb-sidenav-menu-heading">Procesos</div>
                            <a class="nav-link" href="Procesos-Produccion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Producción
                            </a>
                            <a class="nav-link" href="Procesos-ProduccionProducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Producción Producto
                            </a>
                            <a class="nav-link" href="Procesos-ProcesoReciclaje.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Proceso Reciclaje
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada:</div>
                        Produccion
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <form method="POST">
                        <?php
                        include "conexion.php";
                        include "Controladores/Registro/Registro_ProduccionProducto.php";
                        ?>
                        <section class="form-register">
                            <h4 class="mt-4">Registro</h4>
                            <form method="POST">
                                <input class="controls" type="hidden" name="IdProduccion" id="IdProduccion" placeholder="ID producción producto" readonly>
                                <input class="controls" type="number" name="IdMaquinaria" id="IdMaquinaria" placeholder="Ingrese ID maquinaria ">
                                <input class="controls" type="number" name="IdProceso" id="IdProceso" placeholder="Ingrese ID proceso reciclaje">
                                <input class="controls" type="number" name="IdProducto" id="IdProducto" placeholder="Ingrese ID del producto">
                                <h20>Fecha inicio</h20>
                                <input class="controls" type="date" name="FechaInicio" id="FechaInicio" placeholder="Seleccione fecha de inicio">                     
                                <h20>Fecha final</h20>
                                <input class="controls" type="date" name="FechaFin" id="FechaFin" placeholder="Seleccione fecha de finalización">                                               
                                <input class="controls" type="number" name="CantidadProducida" id="CantidadProducida" placeholder="Ingrese cantidad producida">
                                <input class="controls" type="text" name="MaterialUtilizado" id="MaterialUtilizado" placeholder="Ingrese material utilizado">
                                <input class="controls" type="text" name="EmpleadoResponsable" id="EmpleadoResponsable" placeholder="Ingrese nombre del responsable">
                                <button class="botons" type="submit" name="btmRegistrarPP" value="Ok">Registrar</button>
                            </form>
                        </section>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">IdProducción</th>
                                            <th scope="col">IdMaquinaria</th>
                                            <th scope="col">IdProceso</th>
                                            <th scope="col">IdProducto</th>
                                            <th scope="col">FechaInicio</th>
                                            <th scope="col">FechaFin</th>
                                            <th scope="col">CantidadProducida</th>
                                            <th scope="col">MaterialUtilizado</th>
                                            <th scope="col">EmpleadoResponsable</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "conexion.php";
                                        $sql=$conexion->query("SELECT * FROM ProduccionProducto $where");
                                        while($datos=$sql->fetch_object()){?>
                                            <tr>
                                                <th><?=$datos->IdProduccion?></th>
                                                <td><?=$datos->IdMaquinaria?></td>
                                                <td><?=$datos->IdProceso?></td>
                                                <td><?=$datos->IdProducto?></td>
                                                <td><?=$datos->FechaInicio?></td>
                                                <td><?=$datos->FechaFin?></td>
                                                <td><?=$datos->CantidadProducida?></td>
                                                <td><?=$datos->MaterialUtilizado?></td>
                                                <td><?=$datos->EmpleadoResponsable?></td>
                                                <td>
                                                    <a href="MProduccionProducto.php?id=<?=$datos->IdProduccion?>"><i class="fa-regular fa-keyboard"></i></a>
                                                    <a href="Eliminar_ProduccionProducto.php?id=<?=$datos->IdProduccion?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a>
                                                </td>
                                            </tr>     
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        </form> 
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Ecodata 2024</div>
                            <div>
                                <a href="#">Políticas y privacidad</a>
                                &middot;
                                <a href="#">Términos & Condiciones</a>
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
