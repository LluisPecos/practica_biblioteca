<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    mostrar_libros();
}

function mostrar_libros() {
    
    if(isset($_GET['form_buscar_libro']) && isset($_GET['busqueda']) && !empty($_GET['busqueda']) && isset($_GET['opcion_busqueda'])) {
        
        $consulta;
        
        $opcion_busqueda = $_GET['opcion_busqueda'];
        $busqueda = $_GET['busqueda'];
        
        $consulta = "select id_libro, titulo, editorial, genero, autor, n_copias, img_portada from libros where " . $opcion_busqueda . " like '%" . $busqueda . "%' order by " . $opcion_busqueda . " asc;";
        
        require("php/establecer-conexion.php");
        
        $mostrar_libros = mysqli_query($conn, $consulta);
        echo mysqli_error($conn);
        if($mostrar_libros) {
            while($fila = mysqli_fetch_array($mostrar_libros)) { ?>

                <div id="libro">
                    <form onclick="cargar_pagina_libro(this)" id="form_cargar_pagina_libro" method="get" action="libro.php" style="cursor: pointer">
                        <img id="img_portada" src="<?php echo $fila['img_portada'] ?>">
                        <input name="form_cargar_libro" value="<?php echo $fila['id_libro'] ?>" type="hidden">
                        <input name="busqueda" value="<?php echo $_GET['busqueda'] ?>" type="hidden">
                        <input name="opcion_busqueda" value="<?php echo $opcion_busqueda ?>" type="hidden">
                    </form>
                    
                    <div id="propiedades_libro">
                        <span id="titulo"><?php echo $fila['titulo'] ?></span>
                        <span id="autor"><?php echo "Libro de " . $fila['autor'] ?></span>
                    </div>
                </div>

            <?php
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

?>

<script type="text/javascript">
    // Submit form_cargar_pagina_libro
    function cargar_pagina_libro(form) {
        form.submit();
    }
</script>