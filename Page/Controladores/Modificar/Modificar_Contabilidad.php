<?php
if (!empty($_POST["btmModificarC"])) {
    if (
        
        !empty($_POST["Nombre"]) &&
        !empty($_POST["RegimenFiscal"]) &&
        !empty($_POST["FechaInicio"]) &&
        !empty($_POST["Moneda"]) &&
        !empty($_POST["CierreFiscal"]) 
    ) {
        include "conexion.php"; // Incluir archivo de conexión

        // Obtener valores del formulario
        $id = $_POST["id"];
        $Nombre = $_POST["Nombre"];
        $RegimenFiscal = $_POST["RegimenFiscal"];
        $FechaInicio = $_POST["FechaInicio"];
        $Moneda = $_POST["Moneda"];
        $CierreFiscal = $_POST["CierreFiscal"];

        // Construir y ejecutar la consulta SQL
        $sql=$conexion->query ("UPDATE Contabilidad SET Nombre='$Nombre', RegimenFiscal='$RegimenFiscal', FechaInicio='$FechaInicio', Moneda='$Moneda', CierreFiscal='$CierreFiscal' WHERE IdAreaContabilidad='$id'");

        if($sql==1){
            header("Location: Administracion-contable-Contabilidad.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}

?>


