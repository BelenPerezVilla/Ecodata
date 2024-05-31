<?php
if (!empty($_POST['btmRegistrarM'])) {
    include "conexion.php";

    if (!empty($_POST['IdMaquinaria']) && 
        !empty($_POST['IdTransporte']) && 
        !empty($_POST['FechaInicio']) &&
        !empty($_POST['FechaFin']) && 
        !empty($_POST['Costo']) && 
        !empty($_POST['Estado']) &&
        !empty($_POST['Observaciones'])) {

        $IdMaquinaria = $_POST['IdMaquinaria'];
        $IdTransporte = $_POST['IdTransporte'];
        $FechaInicio = $_POST['FechaInicio'];
        $FechaFin = $_POST['FechaFin'];
        $Costo = $_POST['Costo'];
        $Estado = $_POST['Estado'];
        $Observaciones = $_POST['Observaciones'];

        

        try {
            $sql = $conexion->query("INSERT INTO Mantenimiento(IdMaquinaria,IdTransporte,FechaInicio,FechaFin,Costo,Estado,Observaciones) 
            VALUES ('$IdMaquinaria','$IdTransporte','$FechaInicio','$FechaFin','$Costo','$Estado','$Observaciones')");

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