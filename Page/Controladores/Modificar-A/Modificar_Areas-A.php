<?php
if(!empty($_POST["btmRegistrarA"])) {
    if(!empty($_POST["Tipo"])) {
        
        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $Tipo = $_POST["Tipo"];
        

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE Areas SET Tipo='$Tipo' WHERE IdArea='$id'");
        if($sql==1){
            header("Location: Admin-Areas.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

