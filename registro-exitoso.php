<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio</title>
        <?php require("head.php") ?>
        <link rel="stylesheet" href="css/registro-exitoso.css">
    </head>
    
    <body>
        
        <?php require("header.php") ?>
        
        <div id="fondobody">
            <div id="contenedor">
                <div id="contenido">
                    <?php 
    
                    if(isset($_SESSION['id_usuario'])) { ?> 
                    
                    <span id='registrado'>¡Ya estás registrado!</span>
                    
                    <span id='txtRegistrado'>Tu ID de usuario es <b><?php echo $_SESSION['id_usuario'] ?></b>. Te servirá para iniciar sesión, también puedes utilizar tu <b>DNI</b>.</span>
                    <div id="contenedorBotones">
                        <button type='button'><a href='indice.php'>Página inicio</a></button>
                        <button type='button'><a href='buscar-libros.php'>Buscar libros</a></button>
                    </div>
                    
                    <?php
                        
                    } else { ?>
                    
                    <div id="contenedorBotones">
                        <span id="noIniciado">¡No has iniciado sesión!</span>
                        
                        <button type="button"><a href="iniciar-sesion.php">Iniciar sesión</a></button>
                    
                        <button type="button"><a href="registro.php">Regístrate</a></button>
                    </div>
                    
                    <?php
                        
                    } ?>
                </div>
            </div>
        </div>
        
        <?php require("footer.php") ?>
        
    </body>
</html>