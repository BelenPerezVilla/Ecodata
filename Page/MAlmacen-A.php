<!DOCTYPE html>
<?php
include "conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("SELECT * FROM Almacen WHERE IdAreaAlmacen=$id");

?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - M-Almacen</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/tablas.css" rel="stylesheet" />
        <link href="css/Campos.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Modificar Almacen</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <form method= post>
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                    <?php
                    
                    include "conexion.php";
                    include "Controladores/Modificar-A/Modificar_Almacen-A.php";
                    
                    while($datos=$sql->fetch_object()){?>
                    <section class="form-register">
                            <h4>Modificar</h4>
                            <input class="controls" type="hidden" name="id" value="<?=$_GET["id"]?>" id="id" placeholder="ID del almacen" readonly>
                            <input class="controls" type="text" name="NombreAlmacen" value="<?= $datos->NombreAlmacen?>" id="NombreAlmacen" placeholder="Ingrese Nombre del Almacen">
                            <input class="controls" type="text" name="Encargado" value="<?= $datos->Encargado?>" id="Encargado" placeholder="Ingrese Nombre del encargado">
                            <input class="controls" type="text" name="TipoAlmacen" value="<?= $datos->TipoAlmacen?>" id="TipoAlmacen" placeholder="Ingrese el Tipo de Almacen">
                            <input class="controls" type="number" name="Capacidad" value="<?= $datos->Capacidad?>" id="Capacidad" placeholder="Ingresar Capacidad">
                            <input class="controls" type="text" name="Ubicacion" value="<?= $datos->Ubicacion?>" id="Ubicacion" placeholder="Ingrese Ubicación del Almacen">
                            <input class="controls" type="text" name="Secciones" value="<?= $datos->Secciones?>" id="Secciones" placeholder="Ingrese Sección del Almacen">
                            <input class="controls" type="text" name="Pasillos" value="<?= $datos->Pasillos?>" id="Pasillos" placeholder="Ingrese Pasillos del Almacen">
                            <input class="controls" type="number" name="Area" value="<?= $datos->Area?>" id="Area" placeholder="Ingresar Area">
                            <input class="controls" type="text" name="ResponsableAlmacen" value="<?= $datos->ResponsableAlmacen?>" id="ResponsableAlmacen" placeholder="Ingrese Nombre del responsable de Almacen">
                            <button class="botons" type="submit" name="btmModificarA" value="Ok">Modificar</button>
                            
                          </section>     
                    <?php
                    }
                    ?>       
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



        </form>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
