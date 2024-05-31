<?php
    
    if(!empty($_POST['btmRegistrarIM'])){
        include "conexion.php";
        if(!empty($_POST['IdAlmacen']) &&
            !empty($_POST['IdCompra']) &&
            !empty($_POST['IdFierro']) &&
            !empty($_POST['IdProveedor']) &&
            !empty($_POST['TipoMetal']) &&
            !empty($_POST['CantidadDisponible']) &&
            !empty($_POST['FechaEntrada']) &&
            !empty($_POST['EstadoCalidad']) &&
            !empty($_POST['UbicacionAlmacen']) &&
            !empty($_POST['EstadoDisponible'])){
                
                
            $IdAlmacen=$_POST['IdAlmacen'];
            $IdCompra=$_POST['IdCompra'];
            $IdFierro=$_POST['IdFierro'];
            $IdProveedor=$_POST['IdProveedor'];
            $TipoMetal=$_POST['TipoMetal'];
            $CantidadDisponible=$_POST['CantidadDisponible'];
            $FechaEntrada=$_POST['FechaEntrada'];
            $EstadoCalidad=$_POST['EstadoCalidad'];
            $UbicacionAlmacen=$_POST['UbicacionAlmacen'];
            $EstadoDisponible=$_POST['EstadoDisponible'];                                                                        

        $sql=$conexion->query("INSERT INTO InventarioMetal(IdAlmacen,IdCompra,IdFierro,IdProveedor,TipoMetal,CantidadDisponible,FechaEntrada,EstadoCalidad,UbicacionAlmacen,EstadoDisponible) 
        VALUES('$IdAlmacen','$IdCompra',$IdFierro,'$IdProveedor','$TipoMetal','$CantidadDisponible','$FechaEntrada','$EstadoCalidad','$UbicacionAlmacen','$EstadoDisponible')");

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
