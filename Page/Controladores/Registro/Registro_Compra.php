<?php
if (!empty($_POST['btmRegistrarCompra'])) {
    include "conexion.php";

    if (!empty($_POST['IdProveedor']) && 
        !empty($_POST['IdFierro']) && 
        !empty($_POST['FechaCompra']) &&
        !empty($_POST['Cantidad']) && 
        !empty($_POST['PrecioUnitario']) && 
        !empty($_POST['Total']) &&
        !empty($_POST['Descripcion'])) {

        $IdProveedor = $_POST['IdProveedor'];
        $IdFierro = $_POST['IdFierro'];
        $FechaCompra = $_POST['FechaCompra'];
        $Cantidad = $_POST['Cantidad'];
        $PrecioUnitario = $_POST['PrecioUnitario'];
        $Total = $_POST['Total'];
        $Descripcion = $_POST['Descripcion'];



        try {
            $sql = $conexion->query("INSERT INTO Compra(IdProveedor,IdFierro,FechaCompra,Cantidad,PrecioUnitario,Total,Descripcion) 
            VALUES ('$IdProveedor','$IdFierro','$FechaCompra',$Cantidad,$PrecioUnitario,$Total,'$Descripcion')");

            if ($sql) {
                echo 'Registro exitoso';
            } else {
                echo 'Registro no exitoso';
            }
        } catch (Exception $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
        }
    } else {
        echo 'Algunos de los campos están vacíos';
    }
}
?>