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
        <title>Ecodata - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navegador Brand-->
            <a class="navbar-brand ps-3">Administrador</a>
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
                        <li><a class="dropdown-item" href="IA.php">IA</a></li>
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
                            <!-- Menu bodegas-->
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProveedor" aria-expanded="false" aria-controls="collapseProveedor">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Bodegas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProveedor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Almacen.php">Almacen</a>
                                    <a class="nav-link" href="Admin-InventarioMetal.php">Inventario Metal</a>
                                    <a class="nav-link" href="Admin-InventarioProductos.php">Inventario Productos</a>
                                    <a class="nav-link" href="Admin-Proveedor.php">Proveedores</a>
                                </nav>
                            </div>
                            <!-- Productos y especificaciones-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProEspe" aria-expanded="false" aria-controls="collapseProEspe">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Productos y especificaciones
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProEspe" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Productos.php">Productos</a>
                                    <a class="nav-link" href="Admin-ProductoFierro.php">Productos Fierro</a>
                                    <a class="nav-link" href="Admin-ControlCalidad.php">Control Calidad</a>
                                    <a class="nav-link" href="Admin-DetalleProducto.php">Detalle Producto</a>
                                </nav>
                            </div>
                            <!-- Menu mantenimiento y transporte-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseManteTran" aria-expanded="false" aria-controls="collapseManteTran">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Mantenimiento y transporte
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseManteTran" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Mantenimiento.php">Mantenimiento</a>
                                    <a class="nav-link" href="Admin-Transporte.php">Transporte</a>
                                    <a class="nav-link" href="Admin-Maquinaria.php">Maquinaria</a>
                                    <a class="nav-link" href="Admin-Embarques.php">Embarques</a>
                                </nav>
                            </div>
                            <!-- Menu procesos-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProcess" aria-expanded="false" aria-controls="collapseProcess">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Procesos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProcess" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Produccion.php">Produccion</a>
                                    <a class="nav-link" href="Admin-ProduccionProducto.php">Produccion producto</a>
                                    <a class="nav-link" href="Admin-ProcesoReciclaje.php">Proceso Reciclaje</a>
                                </nav>
                            </div>
                            <!-- Menu administracion contable-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdminCon" aria-expanded="false" aria-controls="collapseAdminCon">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Administración contable
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAdminCon" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Contabilidad.php">Contabilidad</a>
                                    <a class="nav-link" href="Admin-Ventas.php">Ventas</a>
                                    <a class="nav-link" href="Admin-DetalleVenta.php">Detalle Ventas</a>
                                    <a class="nav-link" href="Admin-Compra.php">Compra</a>
                                    <a class="nav-link" href="Admin-DetalleCompra.php">Detalle compra</a>
                                    <a class="nav-link" href="Admin-Factura.php">Factura</a>
                                    <a class="nav-link" href="Admin-Pedido.php">Pedido</a>
                                </nav>
                            </div>
                            <!-- Menu Privilegios-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePrivi" aria-expanded="false" aria-controls="collapsePrivi">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Privilegios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePrivi" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Admin-Personal.php">Personal</a>
                                    <a class="nav-link" href="Admin-Clientes.php">Clientes</a>
                                    <a class="nav-link" href="Admin-Login.php">Login</a>
                                    <a class="nav-link" href="Admin-Areas.php">Areas</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada: </div>
                        Administrador
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Graficas</h1>
                        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["Usuario"]); ?>!</h2>
                        <!-- Añade el canvas aquí -->
                        <div>
                            <canvas id="graficaInicioLog" width="300" height="100"></canvas>
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
        <?php
// Consulta para obtener los datos de la tabla InicioLog
$sqlInicioLog = "SELECT IdArea, Usuario FROM InicioLog";
$resultInicioLog = $conexion->query($sqlInicioLog);

$labelsUsuario = [];
$dataIdArea = [];

if ($resultInicioLog->num_rows > 0) {
    while ($row = $resultInicioLog->fetch_assoc()) {
        $labelsUsuario[] = $row['Usuario'];
        $dataIdArea[] = $row['IdArea'];
    }
}
?>
<!-- Configuración de la gráfica de InicioLog -->
<script>
    var ctxInicioLog = document.getElementById('graficaInicioLog').getContext('2d');
    var graficaInicioLog = new Chart(ctxInicioLog, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labelsUsuario); ?>,
            datasets: [{
                label: 'IdArea',
                data: <?php echo json_encode($dataIdArea); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Usuario'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'IdArea'
                    }
                }
            }
        }
    });
</script>

    </body>
</html>
