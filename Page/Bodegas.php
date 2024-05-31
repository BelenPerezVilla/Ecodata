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
        <title>Ecodata -  Bodegas</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/tablas.css" rel="stylesheet" />
    <link href="css/Campos.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navegador Brand-->
            <a class="navbar-brand ps-3"  href="Bodegas.php" >EcoData-Bodegas</a>
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
                        
                            <!-- Menu Bodegas--> 
                            <div class="sb-sidenav-menu-heading">Bodegas</div>
                            <a class="nav-link" href="Bodegas-Almacen.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Almacen
                            </a>
                            <a class="nav-link" href="Bodegas-InventarioMetal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Inventario Metal
                            </a>
                            <a class="nav-link" href="Bodegas-InventarioProductos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Inventario Productos
                            </a>
                            <a class="nav-link" href="Bodegas-Proveedores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Proveedores
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada:</div>
                        Almacen
                    </div>
                </nav>
            </div>                            
                            
                                
            <div id="layoutSidenav_content">
            <h1 class="mt-4">Graficas</h1>
                <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["Usuario"]); ?>!</h2>
                <!-- Aquí se mostrarán las dos gráficas -->
        <!-- Aquí se mostrarán las dos gráficas -->
        <div style="display: flex; flex-direction: column;">
                <canvas id="graficaMetal" width="1000" height="150"></canvas>
                <canvas id="graficaProductos" width="1000" height="150"></canvas>
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
        <script>
    // Consulta para el primer gráfico
    <?php
    $sqlMetal = "SELECT TipoMetal, SUM(CantidadDisponible) AS Cantidad FROM InventarioMetal GROUP BY TipoMetal";
    $resultMetal = $conexion->query($sqlMetal);

    $labelsMetal = [];
    $dataMetal = [];

    if ($resultMetal->num_rows > 0) {
        while ($row = $resultMetal->fetch_assoc()) {
            $labelsMetal[] = $row['TipoMetal'];
            $dataMetal[] = $row['Cantidad'];
        }
    }
    ?>

    // Consulta para el segundo gráfico
    <?php
    $sqlProductos = "SELECT TipoProducto, SUM(CantidadStock) AS Cantidad FROM InventarioProductos GROUP BY TipoProducto";
    $resultProductos = $conexion->query($sqlProductos);

    $labelsProductos = [];
    $dataProductos = [];

    if ($resultProductos->num_rows > 0) {
        while ($row = $resultProductos->fetch_assoc()) {
            $labelsProductos[] = $row['TipoProducto'];
            $dataProductos[] = $row['Cantidad'];
        }
    }
    ?>

    // Configuración del primer gráfico
    var ctxMetal = document.getElementById('graficaMetal').getContext('2d');
    var graficaMetal = new Chart(ctxMetal, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelsMetal); ?>,
            datasets: [{
                label: 'Inventario Metal',
                data: <?php echo json_encode($dataMetal); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Ajusta la escala del eje Y para mostrar los valores enteros
                    }
                }
            }
        }
    });

    // Configuración del segundo gráfico
    var ctxProductos = document.getElementById('graficaProductos').getContext('2d');
    var graficaProductos = new Chart(ctxProductos, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelsProductos); ?>,
            datasets: [{
                label: 'Inventario Productos',
                data: <?php echo json_encode($dataProductos); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Ajusta la escala del eje Y para mostrar los valores enteros
                    }
                }
            }
        }
    });
</script>


    </body>
</html>
