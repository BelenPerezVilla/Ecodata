<?php
if(!empty($_POST['btmRegistrarT'])){
    include "conexion.php";
    if(!empty($_POST['TipoTransporte']) && 
    !empty($_POST['MarcaModelo']) && 
    !empty($_POST['AñoFabricacion']) && 
    !empty($_POST['Matricula']) &&
    !empty($_POST['EstadoActual'])&& 
    !empty($_POST['MantenimientoProgramado'])&& 
    !empty($_POST['UltimoMantenimiento'])&& 
    !empty($_POST['CapacidadCarga']) &&
    !empty($_POST['KilometrajeActual']) &&
    !empty($_POST['ResponsableMantenimiento'])&& 
    !empty($_POST['Notas'])){

    
                                        
     //$IdUsuario=$_POST['IdUsuario'];
     $TipoTransporte = $_POST['TipoTransporte'];
     $MarcaModelo = $_POST['MarcaModelo'];
     $AñoFabricacion =$_POST['AñoFabricacion']; // Convertir a entero
     $Matricula = $_POST['Matricula'];
     $EstadoActual = $_POST['EstadoActual']; // Si se envía desde el formulario
     $MantenimientoProgramado = $_POST['MantenimientoProgramado']; // Si se envía desde el formulario
     $UltimoMantenimiento = $_POST['UltimoMantenimiento']; // Si se envía desde el formulario
     $CapacidadCarga = $_POST['CapacidadCarga']; // Convertir a flotante
     $KilometrajeActual = $_POST['KilometrajeActual']; // Si se envía desde el formulario
     $ResponsableMantenimiento = $_POST['ResponsableMantenimiento']; // Si se envía desde el formulario
     $Notas = $_POST['Notas']; // Si se envía desde el formulario
    $sql = "INSERT INTO Transporte (TipoTransporte, MarcaModelo, AñoFabricacion, Matricula, EstadoActual, MantenimientoProgramado, 
    UltimoMantenimiento, CapacidadCarga, KilometrajeActual, ResponsableMantenimiento, Notas) 
    VALUES ('$TipoTransporte', '$MarcaModelo', $AñoFabricacion, '$Matricula', '$EstadoActual', '$MantenimientoProgramado', 
    '$UltimoMantenimiento',$CapacidadCarga, '$KilometrajeActual', '$ResponsableMantenimiento', '$Notas')";

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
