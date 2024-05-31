<!DOCTYPE html>
<?php
include "conexion.php";
$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM Producto WHERE IdProducto=$id");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProducto = $_POST['NombreProducto'];
    $materialUtilizado = $_POST['MaterialUtilizado'];
    $tamanioProducto = $_POST['TamaProducto'];
    $descripcionGeneral = $_POST['DescripcionGeneral'];
    $modelo = $_POST['Modelo'];

    // Manejo de la imagen
    $imagen = $_FILES['Imagen']['tmp_name'];
    if ($imagen != "") {
        $imagen_contenido = file_get_contents($imagen);
    } else {
        // Obtener la imagen actual si no se selecciona una nueva
        $sql_select_imagen = "SELECT Imagen FROM Producto WHERE IdProducto=?";
        $stmt_select_imagen = $conexion->prepare($sql_select_imagen);
        $stmt_select_imagen->bind_param("i", $id);
        $stmt_select_imagen->execute();
        $result_imagen = $stmt_select_imagen->get_result();
        $row_imagen = $result_imagen->fetch_assoc();
        $imagen_contenido = $row_imagen['Imagen'];
    }

    $stmt = $conexion->prepare("UPDATE Producto SET NombreProducto=?, MaterialUtilizado=?, TamaProducto=?, DescripcionGeneral=?, Modelo=?, Imagen=? WHERE IdProducto=?");
    $stmt->bind_param("ssssssi", $nombreProducto, $materialUtilizado, $tamanioProducto, $descripcionGeneral, $modelo, $imagen_contenido, $id);
    $stmt->execute();
    $stmt->close();

    // Redirigir después de la modificación
    header("Location: ProductosEspecificaciones-Productos.php");
    exit();
}
?>

<html lang="en">
<head>
    <!-- Encabezado aquí -->
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ecodata - Producto</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/crud.css" rel="stylesheet" />
        <link href="css/Campos.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
    <!-- Navbar y otros elementos del diseño -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Modificar Producto</a>
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

    <form method="post" enctype="multipart/form-data">
        <div id="layoutSidenav">
            <!-- Resto del diseño -->
            <main>
                <div class="container-fluid px-4">
                    <?php while ($datos = $sql->fetch_object()) { ?>
                        <section class="form-register">
                            <h4>Modificar</h4>
                            <input type="hidden" name="IdProducto" value="<?= $id ?>" id="IdProducto" placeholder="Ingrese ID del producto">
                            <input type="text" name="NombreProducto" value="<?= $datos->NombreProducto ?>" id="NombreProducto" placeholder="Ingrese nombre del producto">
                            <input type="text" name="MaterialUtilizado" value="<?= $datos->MaterialUtilizado ?>" id="MaterialUtilizado" placeholder="Ingrese material utilizado">
                            <input type="text" name="TamaProducto" value="<?= $datos->TamaProducto ?>" id="TamaProducto" placeholder="Ingrese dimensiones">
                            <textarea name="DescripcionGeneral" id="DescripcionGeneral" placeholder="Ingrese descripción"><?= $datos->DescripcionGeneral ?></textarea>
                            <input type="text" name="Modelo" value="<?= $datos->Modelo ?>" id="Modelo" placeholder="Ingrese Modelo">
                            <input type="file" name="Imagen" id="Imagen" placeholder="Ingrese imagen"><br><br>
                            <?php if ($datos->Imagen): ?>
                                <img src="data:image/jpeg;base64,<?= base64_encode($datos->Imagen) ?>" alt="Imagen del Producto" style="max-width: 200px; max-height: 200px;"><br><br>
                            <?php endif; ?>                         
                            <button type="submit" class="botons" name="btmModificarProducto" value="Ok">Modificar</button>
                        </section>
                    <?php } ?>
                </div>
            </main>
            <!-- Footer y otros elementos del diseño -->
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
    </form>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>
</html>