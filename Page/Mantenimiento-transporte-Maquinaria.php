<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - Maquinaria</title>
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
            <a class="navbar-brand ps-3" href="Mantenimiento-transporte.php">Maquinaria</a>
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
            $where = "WHERE IdMaquinaria LIKE '%$buscar%'";
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
                    include "Controladores/Registro/Registro_Maquinaria.php";
                    ?>                        
                        
                        <section class="form-register">
                        <h4>Registro</h4>
                            <input class="controls" type="hidden" name="IdMaquinaria" id="IdMaquinaria" placeholder="ID de la maquinaria" readonly>
                            <input class="controls" type="text" name="NombreMaquina" id="NombreMaquina" placeholder="Ingrese nombre de la maquinaria">
                            <input class="controls" type="text" name="TipoMaquina" id="TipoMaquina" placeholder="Ingrese tipo de maquinaria ">
                            <h20>Fecha de Adquisicion</h20>
                            <input class="controls" type="date" name="FechaAdquisicion" id="FechaAdquisicion" placeholder="Ingrese año Adquisicion">
                            <input class="controls" type="text" name="EstadoActual" id="EstadoActual" placeholder="Ingrese estado actual ">
                            <input class="controls" type="text" name="MantenimientoProgramado" id="MantenimientoProgramado" placeholder="Ingrese mantenimiento programado">
                            <h20>Fecha de Ultimo Mantenimiento</h20>
                            <input class="controls" type="date" name="UltimoMantenimiento" id="UltimoMantenimiento" placeholder="Ingrese ultimo mantenimiento">                     
                            <input class="controls" type="text" name="VidaUtilEstimada" id="VidaUtilEstimada" placeholder="Ingrese vida util estimada">
                            <input class="controls" type="number" name="CostoAdquisicion" id="CostoAdquisicion" placeholder="Ingrese costo de Adquisicion">
                            <input class="controls" type="text" name="ResponsableMantenimiento" id="ResponsableMantenimiento" placeholder="Ingrese responsable de mantenimiento">
                            <input class="controls" type="text" name="Nota" id="Nota" placeholder="Ingrese notas">
                            <button class="botons" type="submit" name="btmRegistrarM" value="ok">Registrar</button>
                            
                          </section>
                        </form>

                    

                        <div name="tabla" class="card mb-4">
                        <br>
                            
                            
                            <div class="card-body">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Identificador</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Fecha Adquisicion</th>
                                    <th scope="col">Estado Actual</th>
                                    <th scope="col">Mantenimiento Programado</th>
                                    <th scope="col">Ultimo Mantenimiento</th>
                                    <th scope="col">Vida UtilEstimada</th>
                                    <th scope="col">Costo Adquisicion</th>
                                    <th scope="col">Responsable Mantenimiento</th>
                                    <th scope="col">Nota</th>
                                    
                                </tr>
                            </thead>
                    <tbody>

                            <?php
                            include "conexion.php";
                            $sql=$conexion->query("SELECT * FROM Maquinaria $where");
                                while($datos=$sql->fetch_object()){?>
                                <tr>
                                <th><?=$datos->IdMaquinaria?></th>
                                        <th><?=$datos->NombreMaquina?></th>
                                        <th><?=$datos->TipoMaquina?></th>
                                        <th><?=$datos->FechaAdquisicion?></th>
                                        <th><?=$datos->EstadoActual?></th>
                                        <th><?=$datos->MantenimientoProgramado?></th>
                                        <th><?=$datos->UltimoMantenimiento?></th>
                                        <th><?=$datos->VidaUtilEstimada?></th>
                                        <th><?=$datos->CostoAdquisicion?></th>
                                        <th><?=$datos->ResponsableMantenimiento?></th>
                                        <th><?=$datos->Nota?></th>
                                    <td>
                                    <a href="MMaquinaria.php?id=<?=$datos->IdMaquinaria?>"><i class="fa-regular fa-keyboard"></i></a>
                                        <a href="Eliminar_Maquinaria.php?id=<?=$datos->IdMaquinaria?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a>
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
