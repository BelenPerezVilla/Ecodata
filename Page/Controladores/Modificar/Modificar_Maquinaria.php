<?php
if(!empty($_POST["btmModificarM"])) {
    if(!empty($_POST["NombreMaquina"]) && 
       !empty($_POST["TipoMaquina"]) && 
       !empty($_POST["FechaAdquisicion"]) && 
       !empty($_POST["EstadoActual"]) && 
       !empty($_POST["MantenimientoProgramado"]) && 
       !empty($_POST["UltimoMantenimiento"]) &&
       !empty($_POST["VidaUtilEstimada"]) && 
       !empty($_POST["CostoAdquisicion"]) ||
       !empty($_POST["ResponsableMantenimiento"]) ||
       !empty($_POST["Nota"])) {

        //IdMaquinaria
                                        
        
        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $NombreMaquina = $_POST["NombreMaquina"];
        $TipoMaquina = $_POST["TipoMaquina"];
        $FechaAdquisicion = $_POST["FechaAdquisicion"];
        $EstadoActual = $_POST["EstadoActual"];
        $MantenimientoProgramado = $_POST["MantenimientoProgramado"];
        $UltimoMantenimiento = $_POST["UltimoMantenimiento"];
        $VidaUtilEstimada = $_POST["VidaUtilEstimada"];
        $CostoAdquisicion = $_POST["CostoAdquisicion"];
        $ResponsableMantenimiento = $_POST["ResponsableMantenimiento"];
        $Nota = $_POST["Nota"];

        // Consulta de actualización con valores correctamente interpolados
        $sql=$conexion->query("UPDATE Maquinaria SET NombreMaquina='$NombreMaquina', TipoMaquina='$TipoMaquina', FechaAdquisicion='$FechaAdquisicion', EstadoActual='$EstadoActual', MantenimientoProgramado='$MantenimientoProgramado', UltimoMantenimiento='$UltimoMantenimiento', VidaUtilEstimada='$VidaUtilEstimada', CostoAdquisicion=$CostoAdquisicion, ResponsableMantenimiento='$ResponsableMantenimiento', Nota='$Nota' WHERE IdMaquinaria='$id'");
        if($sql==1){
            header("Location: Mantenimiento-transporte-Maquinaria.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

