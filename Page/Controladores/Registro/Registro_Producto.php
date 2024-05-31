<?php
include "conexion.php";

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['Imagen'])) {
    $nombreProducto = $_POST['NombreProducto'];
    $materialUtilizado = $_POST['MaterialUtilizado'];
    $tamaProducto = $_POST['TamaProducto'];
    $descripcionGeneral = $_POST['DescripcionGeneral'];
    $modelo = $_POST['Modelo'];
    
    // Manejo del archivo de imagen
    $imagen = $_FILES['Imagen']['tmp_name'];
    $imagenData = file_get_contents($imagen);
    
    // Asegúrate de que la conexión a la base de datos esté bien
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Preparar la declaración SQL
    $stmt = $conexion->prepare("INSERT INTO Producto (NombreProducto, MaterialUtilizado, TamaProducto, DescripcionGeneral, Modelo, Imagen) VALUES (?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        echo "Error en la preparación de la declaración: " . $conexion->error;
        exit;
    }

    // Enlazar parámetros
    $stmt->bind_param("ssssss", $nombreProducto, $materialUtilizado, $tamaProducto, $descripcionGeneral, $modelo, $imagenData);
    
    // Ejecutar y verificar
    if ($stmt->execute()) {
        // Redirigir después de una inserción exitosa utilizando JavaScript
        echo '<script>window.location.href = "'.$_SERVER['PHP_SELF'].'?success=1";</script>';
        exit();
    } else {
        echo "Error en el registro: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
}

// Mostrar mensaje de éxito si se redirigió después de la inserción
if (isset($_GET['success'])) {
    echo "Registro guardado exitosamente.";
}
?>
