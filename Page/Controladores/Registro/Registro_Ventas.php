<?php
    
    if(!empty($_POST['btmRegistrarV'])){
        include "conexion.php";
        if(!empty($_POST['IdClientes']) &&
        !empty($_POST['IdInventarioP']) &&
        !empty($_POST['IdProducto']) &&
        !empty($_POST['CantidadProducto']) &&
        !empty($_POST['Monto']) &&
        !empty($_POST['FechaVenta']) &&
        !empty($_POST['EstadoVenta']) &&
        !empty($_POST['MetodoPago'])){        
        
        $IdClientes=$_POST['IdClientes'];
        $IdInventarioP=$_POST['IdInventarioP'];
        $IdProducto=$_POST['IdProducto'];
        $CantidadProducto=$_POST['CantidadProducto'];
        $Monto=$_POST['Monto'];
        $FechaVenta=$_POST['FechaVenta'];
        $EstadoVenta=$_POST['EstadoVenta'];
        $MetodoPago=$_POST['MetodoPago'];  
               

        $sql=$conexion->query("INSERT INTO Ventas(IdClientes,IdInventarioP,IdProducto,CantidadProducto,Monto,FechaVenta,EstadoVenta,MetodoPago) 
        VALUES('$IdClientes','$IdInventarioP',$IdProducto,'$CantidadProducto','$Monto','$FechaVenta','$EstadoVenta','$MetodoPago')");

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
