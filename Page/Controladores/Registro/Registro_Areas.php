<?php
    
    if(!empty($_POST['btmRegistrarA'])){
        include "conexion.php";
        if(!empty($_POST['Tipo']) ){
            $Tipo=$_POST['Tipo'];
        $sql=$conexion->query("INSERT INTO Areas(Tipo) VALUES('$Tipo')");
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