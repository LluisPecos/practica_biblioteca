<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio</title>
        <?php require("head.php") ?>
        <link rel="stylesheet" href="css/libro.css">
    </head>
    
    <body>
        
        <?php require("header.php") ?>
        
        <div id="fondobody">
        	<div id="contenedor">
                
                <?php require("php/buscar-libros/buscador-libros.php") ?>
                
                <?php require("php/buscar-libros/reservar-libro.php") ?>
                <?php require("php/buscar-libros/cargar-libro.php") ?>
                
            </div>
        </div>
        
        <?php require("sugerencias.php") ?>
        
        <?php require("footer.php") ?>
        
    </body>
</html>