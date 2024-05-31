<?php
    
    if(!empty($_POST['btmRegistrarPP'])){
        include "conexion.php";
        if(!empty($_POST['IdMaquinaria']) &&
        !empty($_POST['IdProceso']) &&
        !empty($_POST['IdProducto']) &&
        !empty($_POST['FechaInicio']) &&
        !empty($_POST['FechaFin']) &&
        !empty($_POST['CantidadProducida']) &&
        !empty($_POST['MaterialUtilizado']) &&
        !empty($_POST['EmpleadoResponsable'])){

   
        $IdMaquinaria=$_POST['IdMaquinaria'];
        $IdProceso=$_POST['IdProceso'];
        $IdProducto=$_POST['IdProducto'];
        $FechaInicio=$_POST['FechaInicio'];
        $FechaFin=$_POST['FechaFin'];
        $CantidadProducida=$_POST['CantidadProducida'];
        $MaterialUtilizado=$_POST['MaterialUtilizado'];
        $EmpleadoResponsable=$_POST['EmpleadoResponsable'];

        $sql=$conexion->query("INSERT INTO ProduccionProducto(IdMaquinaria,IdProceso,IdProducto,FechaInicio,FechaFin,CantidadProducida,MaterialUtilizado,EmpleadoResponsable) 
        VALUES('$IdMaquinaria','$IdProceso','$IdProducto','$FechaInicio','$FechaFin','$CantidadProducida','$MaterialUtilizado','$EmpleadoResponsable')");

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
