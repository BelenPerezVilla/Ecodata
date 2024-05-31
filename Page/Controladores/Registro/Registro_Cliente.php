
<?php
if(!empty($_POST['btmRegistrarClientes'])){
    include "conexion.php";

    if(!empty($_POST['Nombre']) && 
    !empty($_POST['Apellido']) &&
    !empty($_POST['Direccion']) &&
    !empty($_POST['RFC']) &&
    !empty($_POST['Contacto']) &&
    !empty($_POST['Email'])){

        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Direccion = $_POST['Direccion'];
        $RFC = $_POST['RFC'];
        $Contacto = $_POST['Contacto'];
        $Email = $_POST['Email'];
        
        $sql=$conexion->query("INSERT INTO Clientes(Nombre,Apellido,Direccion,RFC,Contacto,Email)
        VALUES('$Nombre','$Apellido','$Direccion','$RFC','$Contacto','$Email')");

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

    

