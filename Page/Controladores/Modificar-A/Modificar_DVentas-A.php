<?php
if(!empty($_POST["btmModificarDV"])) {
    if(!empty($_POST["IdVentas"]) && !empty($_POST["IdPedido"])) {
        
        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdVentas = $_POST["IdVentas"];
        $IdPedido = $_POST["IdPedido"];
        

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE DetalleVenta SET IdVentas=$IdVentas,IdPedido=$IdPedido  WHERE IdDetalleVenta='$id'");
        if($sql==1){
            header("Location: Admin-DetalleVenta.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

