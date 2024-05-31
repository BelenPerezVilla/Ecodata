<?php

?>

<!DOCTYPE html>
<?php
            include("conexion.php");
            include("Controlador.php");
                        
        ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        
            <h2>Inicio de Sesion</h2>
            
            <input type="text" name="Usuario" placeholder="Usuario">
            <input type="password" name="Contraseña" placeholder="Contraseña">
            <input type="submit" name ="btmingresarI" value="Iniciar Sesion">
        </form>
    </body>
</html>


