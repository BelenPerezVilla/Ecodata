<?php
if(!empty($_POST['btmModificarF'])){
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

        

         // Consulta de actualización con valores correctamente interpolados
        $sql=$conexion->query("UPDATE Factura SET Tipo='$Tipo',RFC='$RFC',FechaEmision='$FechaEmision'
        ,VencimientoFactura='$VencimientoFactura',EstadoFactura='$EstadoFactura',IdVentas=$IdVentas
        ,IdCompra=$IdCompra,IdClientes=$IdClientes WHERE IdFactura='$id'");  
                     
        

       
         
        if($sql==1){
            header("Location: Administracion-contable-Factura.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

