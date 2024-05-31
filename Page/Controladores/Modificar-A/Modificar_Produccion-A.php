<?php
if(!empty($_POST["btmModificarProduccion"])) {
    if(!empty($_POST['IdProduccion']) &&
        !empty($_POST['IdProceso']) &&
        !empty($_POST['TipoProceso']) &&
        !empty($_POST['MaterialesUtilizados']) &&
        !empty($_POST['ResultadoProceso']) &&
        !empty($_POST['CostoProceso'])){
        
        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdProduccion=$_POST['IdProduccion'];
        $IdProceso=$_POST['IdProceso'];
        $TipoProceso=$_POST['TipoProceso'];
        $MaterialesUtilizados=$_POST['MaterialesUtilizados'];
        $ResultadoProceso=$_POST['ResultadoProceso'];
        $CostoProceso=$_POST['CostoProceso'];
        

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE Produccion SET IdProduccion=$IdProduccion,IdProceso=$IdProceso,TipoProceso='$TipoProceso',MaterialesUtilizados='$MaterialesUtilizados',
         ResultadoProceso='$ResultadoProceso',CostoProceso='$CostoProceso' WHERE IdPro='$id'");
        if($sql==1){
            header("Location: Admin-Produccion.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

