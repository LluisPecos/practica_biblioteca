<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro</title>
        <?php require("head.php") ?>
        <link rel="stylesheet" href="css/registro.css">
    </head>
    
    <body>
        
        <?php require("header.php") ?>
        
        <div id="fondobody">
            <div id="contenedor">
                <form id="registrar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    
                    <input name="nombre" type="text" placeholder="Nombre" autocomplete="off" required>
                    
                    <input name="apellidos" type="text" placeholder="Apellidos" autocomplete="off" required>
                    
                    <input name="dni" type="text" placeholder="DNI" autocomplete="off" required>
                    
                    <input name="telefono" type="number" placeholder="Teléfono" required>
                    
                    <input name="domicilio" type="text" placeholder="Domicilio" autocomplete="off" required>
                    
                    <input name="poblacion" type="text" placeholder="Población" autocomplete="off" required>
                    
                    <input name="email" type="email" placeholder="Email" autocomplete="off" required>
                    
                    <div id="txtContraseña">
                        <hr>
                        <span>Contraseña</span>
                    </div>
                    
                    <input name="contraseña" type="password" placeholder="Contraseña" required>
                    
                    <input name="contraseña_repetida" type="password" placeholder="Repite la contraseña" required>
                    
                    <input type="submit" value="Registrar">
                    
                    <?php require("php/validar-registro.php") ?>
                    
                    <span id="txtCambiarForm">¿Ya tienes cuenta? <a href="iniciar-sesion.php"><b>Incia sesión</b></a></span>
                    
                </form>
            </div>
        </div>
        
        <?php require("sugerencias.php") ?>
        
        <?php require("footer.php") ?>
        
    </body>
</html>