<?php
if(!empty($_POST["btmModificarP"])) {
    if(!empty($_POST["Nombre"]) && 
       !empty($_POST["RFC"]) && 
       !empty($_POST["Direccion"]) && 
       !empty($_POST["Telefono"]) && 
       !empty($_POST["CorreoElectronico"])) {

       // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $Nombre = $_POST["Nombre"];
        $RFC = $_POST["RFC"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $CorreoElectronico = $_POST["CorreoElectronico"];
        

        // Consulta de actualización con valores correctamente interpolados
        $sql=$conexion->query("UPDATE Proveedor SET Nombre='$Nombre', RFC='$RFC', Direccion='$Direccion', Telefono='$Telefono', CorreoElectronico='$CorreoElectronico' WHERE IDProveedor='$id'");
        

        if($sql==1){
            header("Location: Admin-Proveedor.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

