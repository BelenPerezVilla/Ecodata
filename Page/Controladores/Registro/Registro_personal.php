<?php
if (!empty($_POST['btmRegistrarP'])) {
    include "conexion.php";

    if (!empty($_POST['Nombre']) && 
        !empty($_POST['Apellido']) && 
        !empty($_POST['FechaNacimiento']) &&
        !empty($_POST['Genero']) && 
        !empty($_POST['Direccion']) && 
        !empty($_POST['Telefono']) &&
        !empty($_POST['CorreoElectronico'])) {

        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $FechaNacimiento = $_POST['FechaNacimiento'];
        $Genero = $_POST['Genero'];
        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];
        $CorreoElectronico = $_POST['CorreoElectronico'];

        try {
            $sql = $conexion->query("INSERT INTO Personal(Nombre,Apellido,FechaNacimiento,Genero,Direccion,Telefono,CorreoElectronico) 
            VALUES ('$Nombre','$Apellido','$FechaNacimiento','$Genero','$Direccion','$Telefono','$CorreoElectronico')");

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