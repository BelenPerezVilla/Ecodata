<?php
    
    if(!empty($_POST['btmRegistrarProduccion'])){
        include "conexion.php";
        if(!empty($_POST['IdProduccion']) &&
        !empty($_POST['IdProceso']) &&
        !empty($_POST['TipoProceso']) &&
        !empty($_POST['MaterialesUtilizados']) &&
        !empty($_POST['ResultadoProceso']) &&
        !empty($_POST['CostoProceso'])){
   
        $IdProduccion=$_POST['IdProduccion'];
        $IdProceso=$_POST['IdProceso'];
        $TipoProceso=$_POST['TipoProceso'];
        $MaterialesUtilizados=$_POST['MaterialesUtilizados'];
        $ResultadoProceso=$_POST['ResultadoProceso'];
        $CostoProceso=$_POST['CostoProceso'];

        $sql=$conexion->query("INSERT INTO Produccion(IdProduccion,IdProceso,TipoProceso,MaterialesUtilizados,ResultadoProceso,CostoProceso) 
        VALUES('$IdProduccion','$IdProceso','$TipoProceso','$MaterialesUtilizados','$ResultadoProceso','$CostoProceso')");

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
