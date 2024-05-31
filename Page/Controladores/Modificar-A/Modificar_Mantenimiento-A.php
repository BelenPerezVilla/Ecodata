<?php
if(!empty($_POST["btmModificarM"])) {
    if(!empty($_POST["IdMaquinaria"]) &&
    !empty($_POST["IdTransporte"]) &&
    !empty($_POST["FechaInicio"]) &&
    !empty($_POST["FechaFin"]) &&
    !empty($_POST["Costo"]) &&
    !empty($_POST["Estado"]) &&
    !empty($_POST["Observaciones"])){
        
        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdMaquinaria = $_POST["IdMaquinaria"];
        $IdTransporte = $_POST["IdTransporte"];
        $FechaInicio = $_POST["FechaInicio"];
        $FechaFin = $_POST["FechaFin"];
        $Costo = $_POST["Costo"];
        $Estado = $_POST["Estado"];
        $Observaciones = $_POST["Observaciones"];
        

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE Mantenimiento SET IdMaquinaria='$IdMaquinaria',IdTransporte='$IdTransporte',FechaInicio='$FechaInicio',
        FechaFin='$FechaFin', Costo='$Costo',Estado='$Estado',Observaciones='$Observaciones' WHERE IdMantenimiento='$id'");
        if($sql==1){
            header("Location: Admin-Mantenimiento.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

