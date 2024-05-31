<?php
if (!empty($_POST["btmRegistrarL"])) {
    if (
        
        !empty($_POST["IdArea"]) &&
        !empty($_POST["Usuario"]) &&
        !empty($_POST["Contraseña"]) 
    ) {
        include "conexion.php"; // Incluir archivo de conexión

        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdArea = $_POST["IdArea"];
        $Usuario = $_POST["Usuario"];
        $Contraseña = $_POST["Contraseña"];
        

        // Construir y ejecutar la consulta SQL
        $sql=$conexion->query ("UPDATE InicioLog SET IdArea=$IdArea, Usuario='$Usuario', Contraseña='$Contraseña' WHERE IdUsuario='$id'");

        if($sql==1){
            header("Location: Admin-Login.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>


