<?php
    
    if(!empty($_POST['btmRegistrarDV'])){
        include "conexion.php";
        if(!empty($_POST['IdVentas']) || !empty($_POST['IdPedido']) ){
            $IdVentas=$_POST['IdVentas'];
            $IdPedido=$_POST['IdPedido'];
        $sql=$conexion->query("INSERT INTO DetalleVenta(IdVentas,IdPedido) VALUES('$IdVentas','$IdPedido')");
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
