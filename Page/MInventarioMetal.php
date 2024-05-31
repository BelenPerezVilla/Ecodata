<!DOCTYPE html>
<?php
include "conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("SELECT * FROM InventarioMetal WHERE IdInventarioM=$id");

?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - M-Inventario-M</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/Campos.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Modificar Inventario Metal</a>
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
                    include "Controladores/Modificar/Modificar_InventarioMetal.php";
                    //Falta hacer codigo en modificar_areas.php
                    while($datos=$sql->fetch_object()){?>
                    <section class="form-register">
                            <h4>Modificar</h4>
                            <input class="controls" type="hidden" name="id" value="<?=$_GET["id"]?>" id="id" placeholder="Ingrese ID">
                            <input class="controls" type="numbers" name="IdAlmacen" value="<?= $datos->IdAlmacen?>"  id="IdAlmacen" placeholder="Ingrese ID del almacen">
                            <input class="controls" type="number" name="IdCompra" value="<?= $datos->IdCompra?>"  id="IdCompra" placeholder="Ingrese ID de la compra">
                            <input class="controls" type="number" name="IdFierro" value="<?= $datos->IdFierro?>"  id="IdFierro" placeholder="Ingrese ID del fierro">
                            <input class="controls" type="number" name="IdProveedor" value="<?= $datos->IdProveedor?>"  id="IdProveedor" placeholder="Ingrese ID del proveedor">
                            <input class="controls" type="text" name="TipoMetal" value="<?= $datos->TipoMetal?>"  id="TipoMetal" placeholder="Ingrese tipo del metal">
                            <input class="controls" type="number" name="CantidadDisponible" value="<?= $datos->CantidadDisponible?>"  id="CantidadDisponible" placeholder="Ingrese cantidad disponible">
                            <input class="controls" type="date" name="FechaEntrada" value="<?= $datos->FechaEntrada?>"  id="FechaEntrada" placeholder="Ingrese fecha de entrada">
                            <input class="controls" type="text" name="EstadoCalidad" value="<?= $datos->EstadoCalidad?>"  id="EstadoCalidad" placeholder="Ingrese su estado de calidad">
                            <input class="controls" type="text" name="UbicacionAlmacen" value="<?= $datos->UbicacionAlmacen?>"  id="UbicacionAlmacen" placeholder="Ingrese ubicacion del almacen">
                            <input class="controls" type="text" name="EstadoDisponible" value="<?= $datos->EstadoDisponible?>"  id="EstadoDisponible" placeholder="Ingrese estado">
                            <button class="botons" type="submit" name="btmModificarIM" value="ok">Modificar</button>
                            
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
