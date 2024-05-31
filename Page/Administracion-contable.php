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
        <title>Ecodata -  Administración</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navegador Brand-->
            <a class="navbar-brand ps-3" href="Administracion-contable.php">EcoData-Administracion</a>
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
                            <div class="sb-sidenav-menu-heading">Administracion contable</div>
                            <a class="nav-link" href="Administracion-contable-Contabilidad.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Contabilidad
                            </a>
                            <a class="nav-link" href="Administracion-contable-Ventas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Ventas
                            </a>
                            <a class="nav-link" href="Administracion-contable-DetalleVenta.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Detalle Ventas
                            </a>
                            <a class="nav-link" href="Administracion-contable-Compra.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Compra
                            </a>
                            <a class="nav-link" href="Administracion-contable-DetalleCompra.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Detalle Compra
                            </a>
                            <a class="nav-link" href="Administracion-contable-Factura.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Factura
                            </a>
                            <a class="nav-link" href="Administracion-contable-Pedido.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pedido
                            </a>
                            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada:</div>
                        Administracion
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <h1 class="mt-4">Graficas</h1>
                <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["Usuario"]); ?>!</h2>
                  <!-- Aquí se mostrará la gráfica -->
            <canvas id="graficaPedido" width="1100" height="400"></canvas>
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
    // Consulta para la gráfica de Pedidos
    <?php
    $sqlPedido = "SELECT Producto, SUM(Cantidad) AS TotalCantidad FROM Pedido GROUP BY Producto";
    $resultPedido = $conexion->query($sqlPedido);

    $labelsPedido = [];
    $dataPedido = [];

    if ($resultPedido->num_rows > 0) {
        while ($row = $resultPedido->fetch_assoc()) {
            $labelsPedido[] = $row['Producto'];
            $dataPedido[] = $row['TotalCantidad'];
        }
    }
    ?>

    // Configuración de la gráfica de Pedidos
    var ctxPedido = document.getElementById('graficaPedido').getContext('2d');
    var graficaPedido = new Chart(ctxPedido, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelsPedido); ?>,
            datasets: [{
                label: 'Pedidos',
                data: <?php echo json_encode($dataPedido); ?>,
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
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