<!DOCTYPE html>
<?php
include "conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("SELECT * FROM Produccion WHERE IdPro=$id");

?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - Produccion</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/Campos.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Modificar Produccion</a>
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
                    include "Controladores/Modificar-A/Modificar_Produccion-A.php";
                    while($datos=$sql->fetch_object()){?>
                    <section class="form-register">
                            <h4>Modificar</h4>
                            <input class="controls" type="hidden" name="id" value="<?=$_GET["id"]?>" id="id" placeholder="ID produccion" readonly>
                            <input class="controls" type="number" name="IdProduccion" value="<?= $datos->IdProduccion?>" id="IdProduccion" placeholder="Ingrese ID produccion producto">
                            <input class="controls" type="number" name="IdProceso" value="<?= $datos->IdProceso?>" id="IdProceso" placeholder="Ingrese ID proceso eciclaje">
                            <input class="controls" type="text" name="TipoProceso" value="<?= $datos->TipoProceso?>" id="TipoProceso" placeholder="Ingrese tipo de proceso">
                            <input class="controls" type="text" name="MaterialesUtilizados" value="<?= $datos->MaterialesUtilizados?>" id="MaterialesUtilizados" placeholder="Ingrese Materiales Utilizados">
                            <input class="controls" type="text" name="ResultadoProceso" value="<?= $datos->ResultadoProceso?>" id="ResultadoProceso" placeholder="Ingrese resultado del proceso">
                            <input class="controls" type="number" name="CostoProceso" value="<?= $datos->CostoProceso?>" id="CostoProceso" placeholder="Ingrese costo del proceso">
                            <button class="botons" type="submit" name="btmModificarProduccion" value="Ok">Modificar</button>
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
