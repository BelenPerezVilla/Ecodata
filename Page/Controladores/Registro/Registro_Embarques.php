<?php
    
    if(!empty($_POST['btmRegistrarE'])){
        include "conexion.php";
        if(!empty($_POST['FechaEmbarque']) && 
            !empty($_POST['IdTransporte']) && 
            !empty($_POST['IdPedido']) &&
            !empty($_POST['Cantidad']) &&
            !empty($_POST['Destino']) &&
            !empty($_POST['MetodoEnvio']) &&
            !empty($_POST['EstadoEnvio']) &&
            !empty($_POST['DocumentacionAdjunta']) &&
            !empty($_POST['ResponsableEmbarque'])){

            $FechaEmbarque=$_POST['FechaEmbarque'];
            $IdTransporte=$_POST['IdTransporte'];
            $IdPedido=$_POST['IdPedido'];
            $Cantidad=$_POST['Cantidad'];
            $Destino=$_POST['Destino'];
            $MetodoEnvio=$_POST['MetodoEnvio'];
            $EstadoEnvio=$_POST['EstadoEnvio'];
            $DocumentacionAdjunta=$_POST['DocumentacionAdjunta'];
            $ResponsableEmbarque=$_POST['ResponsableEmbarque'];

                                        

        $sql=$conexion->query("INSERT INTO Embarques(FechaEmbarque,IdTransporte,IdPedido,Cantidad,Destino,MetodoEnvio,EstadoEnvio,DocumentacionAdjunta,ResponsableEmbarque) 
        VALUES('$FechaEmbarque','$IdTransporte',$IdPedido,'$Cantidad','$Destino','$MetodoEnvio','$EstadoEnvio','$DocumentacionAdjunta','$ResponsableEmbarque')");

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
