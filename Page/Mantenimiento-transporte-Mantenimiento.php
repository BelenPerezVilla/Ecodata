<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - Mantenimiento</title>
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
            <a class="navbar-brand ps-3" href="Mantenimiento-transporte.php">Mantenimiento</a>
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
            $where = "WHERE IdMantenimiento LIKE '%$buscar%'";
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
                            <div class="sb-sidenav-menu-heading">Mantenimiento y transporte</div>
                            <a class="nav-link" href="Mantenimiento-transporte-Mantenimiento.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Mantenimiento
                            </a>
                            <a class="nav-link" href="Mantenimiento-transporte-Transporte.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Transporte
                            </a>
                            <a class="nav-link" href="Mantenimiento-transporte-Maquinaria.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Maquinaria
                            </a>
                            <a class="nav-link" href="Mantenimiento-transporte-Embarques.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Embarques
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada:</div>
                        Mantenimiento
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <form method="POST">
                        <?php
                    include "conexion.php";
                    include "Controladores/Registro/Registro_Mantenimiento.php";
                    ?>                        
                        
                        <section class="form-register">
                        <h4>Registro</h4>
                            <input class="controls" type="hidden" name="IdMantenimiento" id="IdMantenimiento" placeholder="Id mantenimiento" readonly>
                            <input class="controls" type="number" name="IdMaquinaria" id="IdMaquinaria" placeholder="Ingrese ID maquinaria">
                            <input class="controls" type="number" name="IdTransporte" id="IdTransporte" placeholder="Ingrese ID transporte">
                            <h20>Fecha de inicio</h20>
                            <input class="controls" type="date" name="FechaInicio" id="FechaInicio" placeholder="Ingrese fecha inicio">
                            <h20>Fecha de finalización</h20>
                            <input class="controls" type="date" name="FechaFin" id="FechaFin" placeholder="Ingrese fecha fin">
                            <input class="controls" type="number" name="Costo" id="Costo" placeholder="Ingrese costo">
                            <input class="controls" type="text" name="Estado" id="Estado" placeholder="Ingrese estado">
                            <input class="controls" type="text" name="Observaciones" id="Observaciones" placeholder="Ingrese observaciones">
                            <button class="botons" type="submit" name="btmRegistrarM" value="Ok">Registrar</button>
                          </section>
                        </form>

                    

                        <div name="tabla" class="card mb-4">
                        <br>
                            
                            
                            <div class="card-body">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">IdMantenimiento</th>
                                    <th scope="col">IdMaquinaria</th>
                                    <th scope="col">IdTransporte</th>
                                    <th scope="col">FechaInicio</th>
                                    <th scope="col">FechaFin</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Observaciones</th> 
                                    
                                </tr>
                            </thead>
                    <tbody>

                            <?php
                            include "conexion.php";
                            $sql=$conexion->query("SELECT * FROM Mantenimiento $where");
                                while($datos=$sql->fetch_object()){?>
                                <tr>
                                <th><?=$datos->IdMantenimiento?></th>
                                        <td><?=$datos->IdMaquinaria?></td>
                                        <td><?=$datos->IdTransporte?></td>
                                        <td><?=$datos->FechaInicio?></td>
                                        <td><?=$datos->FechaFin?></td>
                                        <td><?=$datos->Costo?></td>
                                        <td><?=$datos->Estado?></td>
                                        <td><?=$datos->Observaciones?></td>
                                    <td>
                                    <a href="MMantenimiento.php?id=<?=$datos->IdMantenimiento?>"><i class="fa-regular fa-keyboard"></i></a>
                                        <a href="Eliminar_Mantenimiento.php?id=<?=$datos->IdMantenimiento?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a>
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
