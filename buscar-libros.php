<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Buscar libros</title>
        <?php require("head.php") ?>
        <link rel="stylesheet" type="text/css" href="css/buscar-libros.css">
    </head>
    
    <body>
        <?php require("header.php") ?>
        
        <div id="fondobody">
            <div id="contenido">
                
                <?php require("php/buscar-libros/buscador-libros.php") ?>
                
                <div id="contenedor_libros">
                    
                    <?php require("php/buscar-libros/mostrar-libros.php") ?>
                    
                </div>
            </div>
        </div>
        
        <?php require("sugerencias.php") ?>
        <?php require("footer.php") ?>
        
    </body>
</html>
