<?php
if (!empty($_POST["btmModificarA"])) {
    if (
        
        !empty($_POST["NombreAlmacen"]) &&
        !empty($_POST["Encargado"]) &&
        !empty($_POST["TipoAlmacen"]) &&
        !empty($_POST["Capacidad"]) &&
        !empty($_POST["Ubicacion"]) &&
        !empty($_POST["Secciones"]) &&
        !empty($_POST["Pasillos"]) &&
        !empty($_POST["Area"]) 
    ) {
        include "conexion.php"; // Incluir archivo de conexión

        // Obtener valores del formulario
        $id = $_POST["id"];
        $NombreAlmacen = $_POST["NombreAlmacen"];
        $Encargado = $_POST["Encargado"];
        $TipoAlmacen = $_POST["TipoAlmacen"];
        $Capacidad = $_POST["Capacidad"];
        $Ubicacion = $_POST["Ubicacion"];
        $Secciones = $_POST["Secciones"];
        $Pasillos = $_POST["Pasillos"];
        $Area = $_POST["Area"];

        

        // Construir y ejecutar la consulta SQL
        $sql=$conexion->query ("UPDATE Almacen SET NombreAlmacen='$NombreAlmacen', Encargado='$Encargado', TipoAlmacen='$TipoAlmacen',
         Capacidad='$Capacidad', Ubicacion='$Ubicacion', Secciones='$Secciones', Pasillos='$Pasillos', Area='$Area' WHERE IdAreaAlmacen='$id'");

        if($sql==1){
            header("Location: Admin-Almacen.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}

?>


