<?php
    
    if(!empty($_POST['btmRegistrarP'])){
        include "conexion.php";
        if(!empty($_POST['Nombre']) && 
        !empty($_POST['RFC']) && 
        !empty($_POST['Direccion']) && 
        !empty($_POST['Telefono']) && 
        !empty($_POST['CorreoElectronico'])){
            $Nombre=$_POST['Nombre'];
            $RFC=$_POST['RFC'];
            $Direccion=$_POST['Direccion'];
            $Telefono=$_POST['Telefono'];
            $CorreoElectronico=$_POST['CorreoElectronico'];

        $sql=$conexion->query("INSERT INTO Proveedor(Nombre,RFC,Direccion,Telefono,CorreoElectronico) VALUES('$Nombre','$RFC','$Direccion','$Telefono','$CorreoElectronico')");
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