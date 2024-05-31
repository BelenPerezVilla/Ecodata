<?php
if (!empty($_GET['id'])) {
    include "conexion.php";
    $id = $_GET['id'];

    try {
        $sql = $conexion->query("DELETE FROM Produccion WHERE IdPro='$id'");

        if ($sql && $conexion->affected_rows > 0) {
            header('Location:Admin-Produccion.php');
        } else {
            echo 'No se encontró el registro para eliminar';
        }
    } catch (Exception $e) {
        echo 'Error al ejecutar la consulta de eliminación: ' . $e->getMessage();
    }
} else {
    echo 'ID no proporcionado';
}
?>