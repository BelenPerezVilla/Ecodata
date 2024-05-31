<?php

if(!empty($_POST['btmRegistrarL'])){
    include "conexion.php";

    if(!empty($_POST['IdUsuario']) && 
    !empty($_POST['IdArea']) && 
    !empty($_POST['Usuario']) && 
    !empty($_POST['Contraseña'])){

    $IdUsuario=$_POST['IdUsuario'];
    $IdArea=$_POST['IdArea'];
    $Usuario=$_POST['Usuario'];
    $Contraseña=$_POST['Contraseña'];
    $sql=$conexion->query("INSERT INTO InicioLog(IdUsuario,IdArea,Usuario,Contraseña) VALUES('$IdUsuario','$IdArea','$Usuario','$Contraseña')");
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