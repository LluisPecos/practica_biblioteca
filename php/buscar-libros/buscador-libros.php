<?php require("php/buscar-libros/guardar-busqueda-libro.php") ?>
<?php require("php/buscar-libros/guardar-opcion-busqueda.php") ?>

<form id="buscar_libro" action="<?php echo htmlspecialchars("buscar-libros.php") ?>" method="get">
    
    <input id="busqueda" name="busqueda" type="text" placeholder="Buscar por..." value="<?php echo $busqueda ?>" oninput="sugerencias_libros()" autocomplete="off">
    
    <select id="opciones_busqueda" class="<?php echo $opcion_busqueda ?>" name="opcion_busqueda" oninput="sugerencias_libros()">
        <option value="titulo">Título</option>
        <option value="autor">Autor</option>
        <option value="editorial">Editorial</option>
        <option value="genero">Género</option>
    </select>
                    
    <input type="submit" value="Buscar">
    <input name="form_buscar_libro" type="hidden">
    
    <div id="sugerencias_libros"></div>
</form>

<script type="text/javascript" src="js/sugerencias_libros.js"></script>
<script type="text/javascript" src="js/guardar_opcion_busqueda.js"></script>