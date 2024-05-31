<?php
session_start();
include 'conexion.php'; // Asegúrate de que 'conexion.php' establece $conexion correctamente

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["btmingresarI"])) {
    if (empty($_POST["Usuario"]) || empty($_POST["Contraseña"])) {
        echo "Los campos están vacíos";
    } else {
        $Usuario = $_POST["Usuario"];
        $Contraseña = $_POST["Contraseña"];
        $sql = $conexion->query("SELECT * FROM InicioLog WHERE Usuario='$Usuario' AND Contraseña='$Contraseña'");
        if ($datos = $sql->fetch_assoc()) {

            // Consulta SQL con INNER JOIN

            // Almacena la información del usuario en la sesión
            $_SESSION["Usuario"] = $datos["Usuario"];

            $tipoUsuario = $datos["IdArea"];
            // Redirige según el tipo de usuario
            if ($tipoUsuario == "1") { // Almacen
                header("Location: Bodegas.php");
            } elseif ($tipoUsuario == "2") { // Administración contable
                header("Location: Administracion-contable.php");
            } elseif ($tipoUsuario == "3") { // Control calidad
                header("Location: ProductosEspecificaciones.php");
            } elseif ($tipoUsuario == "4") { // Administrador
                header("Location: Admin.php");
            } elseif ($tipoUsuario == "5") { // Producción
                header("Location: procesos.php");
            } elseif ($tipoUsuario == "6") { // Mantenimiento
                header("Location: Mantenimiento-transporte.php");
            } else {
                echo "Tipo de usuario desconocido";
            }
            exit();
        } else {
            echo "Usuario o Contraseña incorrectos";
        }
    }
}
?>
