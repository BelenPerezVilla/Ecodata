
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
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>Ecodata -  Mantenimiento y transporte</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navegador Brand-->
            <a class="navbar-brand ps-3" href="Mantenimiento-transporte.php" >EcoData-Mantenimiento</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navegador-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                       
                        <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                        
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
            
                        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["Usuario"]); ?>!</h2>
                        <h5 class="mt-4">Graficas</h5>
                        <h20 class="mt-4">ID y costo</h20>
                <canvas id="graficaMantenimiento" width="1100" height="400"></canvas>

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
// Consulta para obtener los datos de la tabla Mantenimiento
$sqlMantenimiento = "SELECT IdMantenimiento, Costo FROM Mantenimiento";
$resultMantenimiento = $conexion->query($sqlMantenimiento);

$labelsMantenimiento = [];
$dataCostoMantenimiento = [];

if ($resultMantenimiento->num_rows > 0) {
    while ($row = $resultMantenimiento->fetch_assoc()) {
        $labelsMantenimiento[] = $row['IdMantenimiento'];
        $dataCostoMantenimiento[] = $row['Costo'];
    }
}
?>
<!-- Configuración de la gráfica de Mantenimiento -->
<script>
    var ctxMantenimiento = document.getElementById('graficaMantenimiento').getContext('2d');
    var graficaMantenimiento = new Chart(ctxMantenimiento, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelsMantenimiento); ?>,
            datasets: [{
                label: 'Costo de Mantenimiento',
                data: <?php echo json_encode($dataCostoMantenimiento); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
    </body>
</html>
