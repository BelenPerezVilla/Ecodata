<?php
if(!empty($_POST["btmModificarPedido"])) {
    if(!empty($_POST["FechaPedido"]) && 
       !empty($_POST["Producto"]) && 
       !empty($_POST["Cantidad"]) && 
       !empty($_POST["Estado"])) {

       // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $FechaPedido = $_POST["FechaPedido"];
        $Producto = $_POST["Producto"];
        $Cantidad = $_POST["Cantidad"];
        $Estado = $_POST["Estado"];
        

        // Consulta de actualización con valores correctamente interpolados
        $sql=$conexion->query("UPDATE Pedido SET FechaPedido='$FechaPedido',Producto='$Producto',Cantidad=$Cantidad,Estado='$Estado' WHERE IdPedido='$id'");
        //$sql=$conexion->query("UPDATE Proveedor SET Nombre='$Nombre', RFC='$RFC', Direccion='$Direccion', Telefono='$Telefono', CorreoElectronico='$CorreoElectronico' WHERE IDProveedor='$id'");
    
        if($sql==1){
            header("Location: Administracion-contable-Pedido.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

