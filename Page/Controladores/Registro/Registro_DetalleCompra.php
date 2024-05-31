<?php
    
    if(!empty($_POST['btmRegistrarDC'])){
        include "conexion.php";
        if(!empty($_POST['IdProveedor']) && 
            !empty($_POST['IdCompra']) && 
            !empty($_POST['MontoCompra']) ){

            $IdProveedor=$_POST['IdProveedor'];
            $IdCompra=$_POST['IdCompra'];
            $MontoCompra=$_POST['MontoCompra'];

        $sql=$conexion->query("INSERT INTO DetalleCompra(IdProveedor,IdCompra,MontoCompra) 
        VALUES('$IdProveedor','$IdCompra',$MontoCompra)");

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
