<!DOCTYPE html>
<?php
include "conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("SELECT * FROM InventarioProductos WHERE IdInventarioP=$id");

?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - M-Inventario Productos</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/Campos.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Modificar Inventario Productos</a>
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
                    include "Controladores/Modificar/Modificar_InventarioProductos.php";
                   
                    while($datos=$sql->fetch_object()){?>
                    <section class="form-register">
                            <h4>Modificar</h4>
                            <input class="controls" type="hidden" name="IdInventarioP" value="<?=$_GET["id"]?>" id="IdInventarioP" placeholder="Ingrese ID ">
                            <input class="controls" type="number" name="IdAlmacen" value="<?= $datos->IdAlmacen?>" id="IdAlmacen" placeholder="Ingrese ID del almacen">
                            <input class="controls" type="number" name="IdProducto" value="<?= $datos->IdProducto?>" id="IdProducto" placeholder="Ingrese ID del productos">
                            <input class="controls" type="number" name="IdProduccion" value="<?= $datos->IdProduccion?>" id="IdProduccion" placeholder="Ingrese ID producción">
                            <input class="controls" type="text" name="TipoProducto" value="<?= $datos->TipoProducto?>" id="TipoProducto" placeholder="Ingrese tipo del producto">
                            <input class="controls" type="number" name="CantidadStock" value="<?= $datos->CantidadStock?>" id="CantidadStock" placeholder="Ingrese cantidad en stock">
                            <input class="controls" type="text" name="UbicacionAlmacen" value="<?= $datos->UbicacionAlmacen?>" id="UbicacionAlmacen" placeholder="Ingrese ubicacion del almacen">
                            <h30>Fecha de fabricacion</h30>
                            <input class="controls" type="date" name="FechaFabricacion" value="<?= $datos->FechaFabricacion?>" id="FechaFabricacion" placeholder="Ingrese fecha de fabricacion">
                            <h30>Fecha de entrada</h30>
                            <input class="controls" type="date" name="FechaEntrada" value="<?= $datos->FechaEntrada?>" id="FechaEntrada" placeholder="Ingrese fecha de entrada">
                            <input class="controls" type="number" name="PrecioCompraUnitario" value="<?= $datos->PrecioCompraUnitario?>" id="PrecioCompraUnitario" placeholder="Ingrese precio unitario de compra ">
                            <input class="controls" type="number" name="PrecioVenta" value="<?= $datos->PrecioVenta?>" id="PrecioVenta" placeholder="Ingrese precio de venta">
                            <input class="controls" type="text" name="EstadoDisponibilidad" value="<?= $datos->EstadoDisponibilidad?>" id="EstadoDisponibilidad" placeholder="Ingrese su estado de disponibilidad">
                            <input class="controls" type="number" name="Rebastecimiento" value="<?= $datos->Rebastecimiento?>" id="Rebastecimiento" placeholder="Ingrese rebastecimiento">
                            <button class="botons" type="submit" name="btmModificarIP" value="Ok">Modificar</button>
                            
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
