<?php
    
    if(!empty($_POST['btmRegistrarM'])){
        include "conexion.php";
        if(!empty($_POST['NombreMaquina']) || 
        !empty($_POST['TipoMaquina']) || 
        !empty($_POST['FechaAdquisicion']) || 
        !empty($_POST['EstadoActual']) || 
        !empty($_POST['MantenimientoProgramado']) || 
        !empty($_POST['UltimoMantenimiento']) || 
        !empty($_POST['VidaUtilEstimada']) || 
        !empty($_POST['CostoAdquisicion']) || 
        !empty($_POST['ResponsableMantenimiento']) || 
        !empty($_POST['Nota'])){
            $NombreMaquina=$_POST['NombreMaquina'];
            $TipoMaquina=$_POST['TipoMaquina'];
            $FechaAdquisicion=$_POST['FechaAdquisicion'];
            $EstadoActual=$_POST['EstadoActual'];
            $MantenimientoProgramado=$_POST['MantenimientoProgramado'];
            $UltimoMantenimiento=$_POST['UltimoMantenimiento'];
            $VidaUtilEstimada=$_POST['VidaUtilEstimada'];
            $CostoAdquisicion=$_POST['CostoAdquisicion'];
            $ResponsableMantenimiento=$_POST['ResponsableMantenimiento'];
            $Nota=$_POST['Nota'];
        $sql=$conexion->query("INSERT INTO Maquinaria(NombreMaquina,TipoMaquina,FechaAdquisicion,EstadoActual,MantenimientoProgramado,
        UltimoMantenimiento,VidaUtilEstimada,CostoAdquisicion,ResponsableMantenimiento,Nota) 
        VALUES('$NombreMaquina','$TipoMaquina','$FechaAdquisicion','$EstadoActual','$MantenimientoProgramado','$UltimoMantenimiento',
        '$VidaUtilEstimada',$CostoAdquisicion,'$ResponsableMantenimiento','$Nota')");
        
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