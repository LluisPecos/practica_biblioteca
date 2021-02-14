<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio</title>
        <?php require("head.php") ?>
        <link rel="stylesheet" href="css/iniciar-sesion.css">
    </head>
    
    <body>
        
        <?php require("header.php") ?>
        
        <div id="fondobody">
            <div id="contenedor"> 
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="iniciar_sesion">
                    <input name="id_usuario_dni" type="text" placeholder="DNI o ID de usuario" autocomplete="off" required>
                    <input name="contraseña" type="password" placeholder="Contraseña" required>
                    
                    <button type="button" onclick="validar_login()">Iniciar</button>
                    
                    <span id="error"></span>
                    
                    <script type="text/javascript" src="js/validar_login.js"></script>
                    
                    <?php require("php/validar-login.php") ?>
                    
                    <span id="txtCambiarForm">¿No estás registrado? <a href="registro.php"><b>Regístrate</b></a></span>
                    
                </form>
            </div>
        </div>
        
        <?php require("sugerencias.php") ?>
        
        <?php require("footer.php") ?>
        
    </body>
</html>