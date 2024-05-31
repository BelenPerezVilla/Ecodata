<?php
    
    if(!empty($_POST['btmRegistrarPR'])){
        include "conexion.php";
        if(!empty($_POST['IdMaquinaria']) &&
        !empty($_POST['IdInventarioM']) &&
        !empty($_POST['IdFierro']) &&
        !empty($_POST['IdProducto']) &&
        !empty($_POST['FechaInicio']) &&
        !empty($_POST['FechaFin']) &&
        !empty($_POST['TipoMetalEntrada']) &&
        !empty($_POST['TipoMetalReciclado']) &&
        !empty($_POST['CantidadMetalReciclado']) &&
        !empty($_POST['ResponsableDeProceso'])){

        $IdMaquinaria=$_POST['IdMaquinaria'];
        $IdInventarioM=$_POST['IdInventarioM'];
        $IdFierro=$_POST['IdFierro'];
        $IdProducto=$_POST['IdProducto'];
        $FechaInicio=$_POST['FechaInicio'];
        $FechaFin=$_POST['FechaFin'];
        $TipoMetalEntrada=$_POST['TipoMetalEntrada'];
        $TipoMetalReciclado=$_POST['TipoMetalReciclado'];
        $CantidadMetalReciclado=$_POST['CantidadMetalReciclado'];
        $ResponsableDeProceso=$_POST['ResponsableDeProceso'];



        $sql=$conexion->query("INSERT INTO ProcesoReciclaje(IdMaquinaria,IdInventarioM,IdFierro,IdProducto,FechaInicio,FechaFin,TipoMetalEntrada,TipoMetalReciclado,CantidadMetalReciclado,ResponsableDeProceso) 
        VALUES('$IdMaquinaria','$IdInventarioM','$IdFierro','$IdProducto','$FechaInicio','$FechaFin','$TipoMetalEntrada','$TipoMetalReciclado',$CantidadMetalReciclado,'$ResponsableDeProceso')");

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
