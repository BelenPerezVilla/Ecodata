<?php
if(!empty($_POST["btmModificarV"])) {
    if(!empty($_POST['IdClientes']) &&
        !empty($_POST['IdInventarioP']) &&
        !empty($_POST['IdProducto']) &&
        !empty($_POST['CantidadProducto']) &&
        !empty($_POST['Monto']) &&
        !empty($_POST['FechaVenta']) &&
        !empty($_POST['EstadoVenta']) &&
        !empty($_POST['MetodoPago'])){
        
        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdClientes=$_POST['IdClientes'];
        $IdInventarioP=$_POST['IdInventarioP'];
        $IdProducto=$_POST['IdProducto'];
        $CantidadProducto=$_POST['CantidadProducto'];
        $Monto=$_POST['Monto'];
        $FechaVenta=$_POST['FechaVenta'];
        $EstadoVenta=$_POST['EstadoVenta'];
        $MetodoPago=$_POST['MetodoPago']; 
        

        // Consulta de actualización con valores correctamente interpolados
        $sql = $conexion->query("UPDATE Ventas SET IdClientes=$IdClientes,IdInventarioP=$IdInventarioP,IdProducto=$IdProducto,CantidadProducto=$CantidadProducto,
         Monto=$Monto,FechaVenta='$FechaVenta',EstadoVenta='$EstadoVenta',MetodoPago='$MetodoPago' WHERE IdVentas='$id'");
        if($sql==1){
            header("Location: Admin-Ventas.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

