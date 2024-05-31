<!DOCTYPE html>
<?php
session_start();
// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["Usuario"])) {
    header("Location:Index.php "); // Redirige al login si no está logueado
    exit();
}

include_once("conexion.php");
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata -  Productos y especificaciones</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navegador Brand-->
            <a class="navbar-brand ps-3" href="ProductosEspecificaciones.php" >Productos y especificaciones</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navegador Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
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
                        Control Calidad
                    </div>
                </nav>
            </div>
                            
            <div id="layoutSidenav_content">
                <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["Usuario"]); ?>!</h2>
                <div style="display: flex; flex-direction: column;">
                <h1>Gráfica de Productos</h1>
    <canvas id="graficaProductos"  width="1000" height="150"></canvas>

    <h1>Gráfica de Productos Fierro</h1>
    <canvas id="graficaProductosFierro"  width="1000" height="150"></canvas>
            </div>
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
        <?php
        // Consulta para obtener los datos de la tabla Producto
$sqlProducto = "SELECT IdProducto, NombreProducto FROM Producto";
$resultProducto = $conexion->query($sqlProducto);

$labelsProducto = [];
$dataProducto = [];

if ($resultProducto->num_rows > 0) {
    while ($row = $resultProducto->fetch_assoc()) {
        $labelsProducto[] = $row['NombreProducto'];
        $dataProducto[] = $row['IdProducto'];
    }
}

// Consulta para obtener los datos de la tabla ProductoFierro
$sqlProductoFierro = "SELECT IdFierro, NombreProducto FROM ProductoFierro";
$resultProductoFierro = $conexion->query($sqlProductoFierro);

$labelsProductoFierro = [];
$dataProductoFierro = [];

if ($resultProductoFierro->num_rows > 0) {
    while ($row = $resultProductoFierro->fetch_assoc()) {
        $labelsProductoFierro[] = $row['NombreProducto'];
        $dataProductoFierro[] = $row['IdFierro'];
    }
}
?>
<!-- Configuración de la gráfica de Productos -->
<script>
        var ctxProductos = document.getElementById('graficaProductos').getContext('2d');
        var graficaProductos = new Chart(ctxProductos, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labelsProducto); ?>,
                datasets: [{
                    label: 'ID de Productos',
                    data: <?php echo json_encode($dataProducto); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'NombreProducto'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'IdProducto'
                        },
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Configuración de la gráfica de Productos Fierro
        var ctxProductosFierro = document.getElementById('graficaProductosFierro').getContext('2d');
        var graficaProductosFierro = new Chart(ctxProductosFierro, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labelsProductoFierro); ?>,
                datasets: [{
                    label: 'ID de Productos Fierro',
                    data: <?php echo json_encode($dataProductoFierro); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'NombreProducto'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'IdFierro'
                        },
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
        

    </body>
</html>
