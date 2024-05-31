<?php
if(!empty($_POST["btmModificarIP"])) {
    if(!empty($_POST['IdAlmacen']) &&
            !empty($_POST['IdProducto']) &&
            !empty($_POST['IdProduccion']) &&
            !empty($_POST['TipoProducto']) &&
            !empty($_POST['CantidadStock']) &&
            !empty($_POST['UbicacionAlmacen']) &&
            !empty($_POST['FechaFabricacion']) &&
            !empty($_POST['FechaEntrada']) &&
            !empty($_POST['PrecioCompraUnitario']) &&
            !empty($_POST['PrecioVenta']) &&
            !empty($_POST['EstadoDisponibilidad']) &&
            !empty($_POST['Rebastecimiento'])){    

               

        // Incluir archivo de conexión
        include "conexion.php";

        // Obtener valores del formulario
        $id = $_POST["id"];
        $IdAlmacen=$_POST['IdAlmacen'];
        $IdProducto=$_POST['IdProducto'];
        $IdProduccion=$_POST['IdProduccion'];
        $TipoProducto=$_POST['TipoProducto'];
        $CantidadStock=$_POST['CantidadStock'];
        $UbicacionAlmacen=$_POST['UbicacionAlmacen'];
        $FechaFabricacion=$_POST['FechaFabricacion'];
        $FechaEntrada=$_POST['FechaEntrada'];
        $PrecioCompraUnitario=$_POST['PrecioCompraUnitario'];
        $PrecioVenta=$_POST['PrecioVenta'];
        $EstadoDisponibilidad=$_POST['EstadoDisponibilidad'];
        $Rebastecimiento=$_POST['Rebastecimiento'];

        // Consulta de actualización con valores correctamente interpolados
        $sql=$conexion->query("UPDATE InventarioProductos SET IdAlmacen=$IdAlmacen, IdProducto=$IdProducto, IdProduccion=$IdProduccion,
          TipoProducto='$TipoProducto', CantidadStock=$CantidadStock, UbicacionAlmacen='$UbicacionAlmacen', FechaFabricacion='$FechaFabricacion',
          FechaEntrada='$FechaEntrada', PrecioCompraUnitario=$PrecioCompraUnitario, PrecioVenta=$PrecioVenta, EstadoDisponibilidad='$EstadoDisponibilidad',
          Rebastecimiento=$Rebastecimiento WHERE IdInventarioP='$id'");   

        
        if($sql==1){
            header("Location: Admin-InventarioProductos.php");

        }else{
            echo "Error al modificar usuario";

        }
    } else {
        echo "Algunos campos están vacíos";
    }
}
?>

