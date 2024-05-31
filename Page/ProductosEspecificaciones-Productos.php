<!DOCTYPE html>

<?php
if (isset($_GET['success'])) {
    echo "Registro guardado exitosamente.";
    unset($_GET['success']);
    error_reporting(E_ALL);
ini_set('display_errors', 1);

}
?>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata -  Coltrol Calidad Productos</title>
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
    error_reporting(E_ALL);
ini_set('display_errors', 1);
    
    ?>

    <body class="sb-nav-fixed">
    
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navegador Brand-->
            <a class="navbar-brand ps-3" href="ProductosEspecificaciones.php" >Productos</a>
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
            $where = "WHERE IdProducto LIKE '%$buscar%'";
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
                            <!-- Menu Productos--> 
                            <div class="sb-sidenav-menu-heading">Productos y especificaciones</div>
                            <a class="nav-link" href="ProductosEspecificaciones-Productos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Productos
                            </a>
                            <a class="nav-link" href="ProductosEspecificaciones-ProductoFierro.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Producto Fierro
                            </a>
                            <a class="nav-link" href="ProductosEspecificaciones-ControlCalidad.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Control Calidad
                            </a>
                            <a class="nav-link" href="ProductosEspecificaciones-DetalleProducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Detalle Producto
                            </a>
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
                    <?php
                    include "conexion.php";
                    include "Controladores/Registro/Registro_Producto.php";
                    ?>    
                        <form method="POST" enctype="multipart/form-data">
                                           
                        
                        <section class="form-register">
                        <h4>Registro</h4>
                            <input class="controls" type="hidden" name="IdProducto" id="IdProducto" placeholder="Ingrese ID del productos">
                            <input class="controls" type="text" name="NombreProducto" id="NombreProducto" placeholder="Ingrese nombre del producto">
                            <input class="controls" type="text" name="MaterialUtilizado" id="MaterialUtilizado" placeholder="Ingrese nombre del material usado">
                            <input class="controls" type="text" name="TamañoProducto" id="TamañoProducto" placeholder="Ingrese dimensiones">
                            <input class="controls" type="text" name="DescripcionGeneral" id="DescripcionGeneral" placeholder="Ingrese descripciones general">
                            <input class="controls" type="text" name="Modelo" id="Modelo" placeholder="Ingrese Modelo">
                            <input class="controls" type="file" name="Imagen" id="Imagen" placeholder="Ingrese imagen">
                            <button class="botons" type="submit" name="btmRegistrarP" value="Ok">Registrar</button>
                          </section>
                        </form>

                    

                        <div name="tabla" class="card mb-4">
                        <br>
                            
                            
                            <div class="card-body">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">IdProducto</th>
                                    <th scope="col">NombreProducto</th>
                                    <th scope="col">MaterialUtilizado</th>
                                    <th scope="col">TamañoProducto</th>
                                    <th scope="col">DescripcionGeneral</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Imagen</th> 
                                    
                                </tr>
                            </thead>
                    <tbody>

                            <?php
                            include "conexion.php";
                            $sql=$conexion->query("SELECT * FROM Producto $where");
                                while($datos=$sql->fetch_object()){?>
                                <tr>
                                        <th><?=$datos->IdProducto?></th>
                                        <td><?=$datos->NombreProducto?></td>
                                        <td><?=$datos->MaterialUtilizado?></td>
                                        <td><?=$datos->TamaProducto?></td>
                                        <td><?=$datos->DescripcionGeneral?></td>
                                        <td><?=$datos->Modelo?></td>
                                        <td><img src="data:image/jpeg;base64,<?= base64_encode($datos->Imagen) ?>" width="100" height="100"/></td>
                                    <td>
                                    <a href="MProductos.php?id=<?=$datos->IdProducto?>"><i class="fa-regular fa-keyboard"></i></a>
                                        <a href="Eliminar_Producto.php?id=<?=$datos->IdProducto?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a>
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
