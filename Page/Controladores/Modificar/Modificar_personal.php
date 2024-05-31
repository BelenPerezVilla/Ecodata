<?php
if(!empty($_POST["btmModificarP"])) {
    if(!empty($_POST["Nombre"]) && 
       !empty($_POST["Apellido"]) && 
       !empty($_POST["FechaNacimiento"]) && 
       !empty($_POST["Genero"]) && 
       !empty($_POST["Direccion"]) && 
       !empty($_POST["Telefono"]) && 
       !empty($_POST["CorreoElectronico"])) {
        
        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $FechaNacimiento = $_POST["FechaNacimiento"];
        $Genero = $_POST["Genero"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $CorreoElectronico = $_POST["CorreoElectronico"];

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE Personal SET Nombre='$Nombre', Apellido='$Apellido', FechaNacimiento='$FechaNacimiento', Genero='$Genero', Direccion='$Direccion', Telefono='$Telefono', CorreoElectronico='$CorreoElectronico' WHERE IdPersonal='$id'");
        if($sql==1){
            header("Location: Personal.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

