<?php
if (!empty($_POST["btmModificarCC"])) {
    if (
        
        !empty($_POST["Nombre"]) &&
        !empty($_POST["Descripcion"]) &&
        !empty($_POST["Objetivo"]) &&
        !empty($_POST["Alcance"]) &&
        !empty($_POST["Responsable"]) &&
        !empty($_POST["Metodologia"]) 
    ) {
        include "conexion.php"; // Incluir archivo de conexión

        // Obtener valores del formulario
        $id = $_POST["id"];
        $Descripcion = $_POST["Descripcion"];
        $Objetivo = $_POST["Objetivo"];
        $Alcance = $_POST["Alcance"];
        $Responsable = $_POST["Responsable"];
        $Metodologia = $_POST["Metodologia"];


        // Construir y ejecutar la consulta SQL
        $sql=$conexion->query ("UPDATE ControlCalidad SET Descripcion='$Descripcion', Objetivo='$Objetivo', Alcance='$Alcance', 
        Responsable='$Responsable', Metodologia='$Metodologia' WHERE IdAreaControlCalidad='$id'");

        if($sql==1){
            header("Location:ProductosEspecificaciones-ControlCalidad.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}

?>


