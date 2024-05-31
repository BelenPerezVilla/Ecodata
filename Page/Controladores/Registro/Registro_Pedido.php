
<?php
if(!empty($_POST['btmRegistrarPedido'])){
    include "conexion.php";

    if(!empty($_POST['FechaPedido']) && 
    !empty($_POST['Producto']) && 
    !empty($_POST['Cantidad']) && 
    !empty($_POST['Estado'])){

        $FechaPedido = $_POST['FechaPedido'];
        $Producto = $_POST['Producto']; 
        $Cantidad = $_POST['Cantidad'];
        $Estado = $_POST['Estado'];
        $sql=$conexion->query("INSERT INTO Pedido(FechaPedido,Producto,Cantidad,Estado)
        VALUES('$FechaPedido','$Producto','$Cantidad','$Estado')");

       
    if($sql==1){
        echo '<div>Registro exitoso</div>';
    }
    else{
        echo '<div>Registro no exitoso</div>';
    }
    }
    else{
        echo '<div>Algunos de los campos estan vacios</div>';
    }
}
?>

    

