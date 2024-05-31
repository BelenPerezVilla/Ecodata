<?php
if(!empty($_POST["btmModificarClientes"])) {
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

        $sql=$conexion->query("UPDATE Clientes SET Nombre='$Nombre',Apellido='$Apellido',Direccion='$Direccion',RFC='$RFC',Contacto='$Contacto',
        Email='$Email' WHERE IdClientes='$id'");
                                        
        if($sql==1){
            header("Location: Admin-Clientes.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

