<?php
if(!empty($_POST["btmModificarIM"])) {
    if(!empty($_POST['IdAlmacen']) &&
            !empty($_POST['IdCompra']) &&
            !empty($_POST['IdFierro']) &&
            !empty($_POST['IdProveedor']) &&
            !empty($_POST['TipoMetal']) &&
            !empty($_POST['CantidadDisponible']) &&
            !empty($_POST['FechaEntrada']) &&
            !empty($_POST['EstadoCalidad']) &&
            !empty($_POST['UbicacionAlmacen']) &&
            !empty($_POST['EstadoDisponible'])){    

        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdAlmacen=$_POST['IdAlmacen'];
        $IdCompra=$_POST['IdCompra'];
        $IdFierro=$_POST['IdFierro'];
        $IdProveedor=$_POST['IdProveedor'];
        $TipoMetal=$_POST['TipoMetal'];
        $CantidadDisponible=$_POST['CantidadDisponible'];
        $FechaEntrada=$_POST['FechaEntrada'];
        $EstadoCalidad=$_POST['EstadoCalidad'];
        $UbicacionAlmacen=$_POST['UbicacionAlmacen'];
        $EstadoDisponible=$_POST['EstadoDisponible'];

        // Consulta de actualización con valores correctamente interpolados
        $sql=$conexion->query("UPDATE InventarioMetal SET IdAlmacen=$IdAlmacen, IdCompra=$IdCompra, IdFierro=$IdFierro,
          TipoMetal='$TipoMetal', CantidadDisponible=$CantidadDisponible, FechaEntrada='$FechaEntrada',IdProveedor=$IdProveedor, EstadoCalidad='$EstadoCalidad',
         UbicacionAlmacen='$UbicacionAlmacen',EstadoDisponible='$EstadoDisponible' WHERE IdInventarioM='$id'");
        if($sql==1){
            header("Location: Bodegas-InventarioMetal.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

