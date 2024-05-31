<?php
if(!empty($_POST["btmModificarE"])) {
    if(!empty($_POST["FechaEmbarque"]) && 
        !empty($_POST["IdTransporte"]) &&
        !empty($_POST["IdPedido"]) &&
        !empty($_POST["Cantidad"]) &&
        !empty($_POST["Destino"]) &&
        !empty($_POST["MetodoEnvio"]) &&
        !empty($_POST["EstadoEnvio"]) &&
        !empty($_POST["DocumentacionAdjunta"]) &&
        !empty($_POST["ResponsableEmbarque"])) {    

        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $FechaEmbarque = $_POST["FechaEmbarque"];
        $IdTransporte = $_POST["IdTransporte"];
        $IdPedido = $_POST["IdPedido"];
        $Cantidad = $_POST["Cantidad"];
        $Destino = $_POST["Destino"];
        $MetodoEnvio = $_POST["MetodoEnvio"];
        $EstadoEnvio = $_POST["EstadoEnvio"];
        $DocumentacionAdjunta = $_POST["DocumentacionAdjunta"];
        $ResponsableEmbarque = $_POST["ResponsableEmbarque"];

        // Consulta de actualización con valores correctamente interpolados
        $sql=$conexion->query("UPDATE Embarques SET FechaEmbarque='$FechaEmbarque', IdTransporte=$IdTransporte, IdPedido=$IdPedido,
         Cantidad=$Cantidad, Destino='$Destino', MetodoEnvio='$MetodoEnvio', EstadoEnvio='$EstadoEnvio', DocumentacionAdjunta='$DocumentacionAdjunta',
          ResponsableEmbarque='$ResponsableEmbarque' WHERE IdAEmbarques='$id'");
        if($sql==1){
            header("Location: Mantenimiento-transporte-Embarques.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

