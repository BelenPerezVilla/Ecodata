<?php
if(!empty($_POST["btmModificarPR"])) {
    if(!empty($_POST['IdMaquinaria']) &&
        !empty($_POST['IdInventarioM']) &&
        !empty($_POST['IdFierro']) &&
        !empty($_POST['IdProducto']) &&
        !empty($_POST['FechaInicio']) &&
        !empty($_POST['FechaFin']) &&
        !empty($_POST['TipoMetalEntrada']) &&
        !empty($_POST['TipoMetalReciclado']) &&
        !empty($_POST['CantidadMetalReciclado']) &&
        !empty($_POST['ResponsableDeProceso'])) {
        
        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdMaquinaria=$_POST['IdMaquinaria'];
        $IdInventarioM=$_POST['IdInventarioM'];
        $IdFierro=$_POST['IdFierro'];
        $IdProducto=$_POST['IdProducto'];
        $FechaInicio=$_POST['FechaInicio'];
        $FechaFin=$_POST['FechaFin'];
        $TipoMetalEntrada=$_POST['TipoMetalEntrada'];
        $TipoMetalReciclado=$_POST['TipoMetalReciclado'];
        $CantidadMetalReciclado=$_POST['CantidadMetalReciclado'];
        $ResponsableDeProceso=$_POST['ResponsableDeProceso'];

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE ProcesoReciclaje SET IdMaquinaria=$IdMaquinaria, IdInventarioM=$IdInventarioM, IdFierro=$IdFierro, IdProducto=$IdProducto,
         FechaInicio='$FechaInicio', FechaFin='$FechaFin', TipoMetalEntrada='$TipoMetalEntrada',TipoMetalReciclado='$TipoMetalReciclado',
         CantidadMetalReciclado=$CantidadMetalReciclado,ResponsableDeProceso='$ResponsableDeProceso' WHERE IdProceso='$id'");
        if($sql==1){
            header("Location: Procesos-ProcesoReciclaje.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

