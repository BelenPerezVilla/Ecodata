<?php
if(!empty($_POST["btmModificarPP"])) {
    if(!empty($_POST['IdMaquinaria']) &&
        !empty($_POST['IdProceso']) &&
        !empty($_POST['IdProducto']) &&
        !empty($_POST['FechaInicio']) &&
        !empty($_POST['FechaFin']) &&
        !empty($_POST['CantidadProducida']) &&
        !empty($_POST['MaterialUtilizado']) &&
        !empty($_POST['EmpleadoResponsable'])){
        
        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdMaquinaria=$_POST['IdMaquinaria'];
        $IdProceso=$_POST['IdProceso'];
        $IdProducto=$_POST['IdProducto'];
        $FechaInicio=$_POST['FechaInicio'];
        $FechaFin=$_POST['FechaFin'];
        $CantidadProducida=$_POST['CantidadProducida'];
        $MaterialUtilizado=$_POST['MaterialUtilizado'];
        $EmpleadoResponsable=$_POST['EmpleadoResponsable'];

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE ProduccionProducto SET IdMaquinaria=$IdMaquinaria,IdProceso=$IdProceso,IdProducto=$IdProducto,FechaInicio='$FechaInicio',
         FechaFin='$FechaFin',CantidadProducida=$CantidadProducida,MaterialUtilizado='$MaterialUtilizado',EmpleadoResponsable='$EmpleadoResponsable' WHERE IdProduccion='$id'");
        if($sql==1){
            header("Location: Admin-ProduccionProducto.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

