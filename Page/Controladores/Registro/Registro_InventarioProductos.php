<?php
    
    if(!empty($_POST['btmRegistrarIP'])){
        include "conexion.php";
        if(!empty($_POST['IdAlmacen']) &&
            !empty($_POST['IdProducto']) &&
            !empty($_POST['IdProduccion']) &&
            !empty($_POST['TipoProducto']) &&
            !empty($_POST['CantidadStock']) &&
            !empty($_POST['UbicacionAlmacen']) &&
            !empty($_POST['FechaFabricacion']) &&
            !empty($_POST['FechaEntrada']) &&
            !empty($_POST['PrecioCompraUnitario']) &&
            !empty($_POST['PrecioVenta']) &&
            !empty($_POST['EstadoDisponibilidad']) &&
            !empty($_POST['Rebastecimiento'])){ 
                
            $IdAlmacen=$_POST['IdAlmacen'];
            $IdProducto=$_POST['IdProducto'];
            $IdProduccion=$_POST['IdProduccion'];
            $TipoProducto=$_POST['TipoProducto'];
            $CantidadStock=$_POST['CantidadStock'];
            $UbicacionAlmacen=$_POST['UbicacionAlmacen'];
            $FechaFabricacion=$_POST['FechaFabricacion'];
            $FechaEntrada=$_POST['FechaEntrada'];
            $PrecioCompraUnitario=$_POST['PrecioCompraUnitario'];
            $PrecioVenta=$_POST['PrecioVenta'];
            $EstadoDisponibilidad=$_POST['EstadoDisponibilidad'];
            $Rebastecimiento=$_POST['Rebastecimiento'];
                                    
        $sql=$conexion->query("INSERT INTO InventarioProductos(IdAlmacen,IdProducto,IdProduccion,TipoProducto,CantidadStock,UbicacionAlmacen,FechaFabricacion,
        FechaEntrada,PrecioCompraUnitario,PrecioVenta,EstadoDisponibilidad,Rebastecimiento) 
        VALUES('$IdAlmacen','$IdProducto',$IdProduccion,'$TipoProducto',$CantidadStock,'$UbicacionAlmacen','$FechaFabricacion','$FechaEntrada',$PrecioCompraUnitario,
        $PrecioVenta,'$EstadoDisponibilidad','$Rebastecimiento')");

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
