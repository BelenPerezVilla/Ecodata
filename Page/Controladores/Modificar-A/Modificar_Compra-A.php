<?php
if(!empty($_POST["btmModificarCompra"])) {
    if(!empty($_POST["IdProveedor"]) && 
       !empty($_POST["IdFierro"]) && 
       !empty($_POST["FechaCompra"]) && 
       !empty($_POST["Cantidad"]) && 
       !empty($_POST["PrecioUnitario"]) && 
       !empty($_POST["Total"]) && 
       !empty($_POST["Descripcion"])) {
        
        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdProveedor = $_POST["IdProveedor"];
        $IdFierro = $_POST["IdFierro"];
        $FechaCompra = $_POST["FechaCompra"];
        $Cantidad = $_POST["Cantidad"];
        $PrecioUnitario = $_POST["PrecioUnitario"];
        $Total = $_POST["Total"];
        $Descripcion = $_POST["Descripcion"];


        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE Compra SET IdProveedor='$IdProveedor', IdFierro='$IdFierro', FechaCompra='$FechaCompra',
         Cantidad='$Cantidad', PrecioUnitario='$PrecioUnitario', Total='$Total', Descripcion='$Descripcion' WHERE IdCompra='$id'");
        if($sql==1){
            header("Location: Admin-Compra.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

