<?php
    
    if(!empty($_POST['btmRegistrarF'])){
        include "conexion.php";
        if( !empty($_POST['Tipo']) &&
            !empty($_POST['RFC']) &&
            !empty($_POST['FechaEmision']) &&
            !empty($_POST['VencimientoFactura'])&&
            !empty($_POST['EstadoFactura'])&&
            !empty($_POST['IdVentas']) && 
            !empty($_POST['IdCompra']) &&
            !empty($_POST['IdClientes'])){

            
            $Tipo=$_POST['Tipo'];
            $RFC=$_POST['RFC'];
            $FechaEmision=$_POST['FechaEmision'];
            $VencimientoFactura=$_POST['VencimientoFactura'];
            $EstadoFactura=$_POST['EstadoFactura'];
            $IdVentas=$_POST['IdVentas'];
            $IdCompra=$_POST['IdCompra'];
            $IdClientes=$_POST['IdClientes'];


            $sql=$conexion->query("INSERT INTO Factura(Tipo,RFC,FechaEmision,VencimientoFactura,EstadoFactura,IdVentas,IdCompra,IdClientes) 
            values ('$Tipo','$RFC','$FechaEmision','$VencimientoFactura','$EstadoFactura','$IdVentas','$IdCompra','$IdClientes')");

                                        

       
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
