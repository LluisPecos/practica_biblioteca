<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    cargarLibro();
}

function cargarLibro() {
    
    if(isset($_GET['form_cargar_libro'])) {
        
        $id_libro = $_GET['form_cargar_libro'];
        
        require("php/establecer-conexion.php");
        
        $consulta = "select id_libro, titulo, editorial, genero, autor, n_copias, img_portada from libros where id_libro = " . $id_libro;
        
        $buscar_libro = mysqli_query($conn, $consulta);
        
        while($fila = mysqli_fetch_array($buscar_libro)) { ?>
            <div id="contenido">
                <div id="header_libro">
                    <img id="img_portada" src="<?php echo $fila['img_portada'] ?>">
                    <span id="sinopsis"></span>
                </div>

                <div id="propiedades_libro">
                    <h1 id="titulo"><?php echo $fila['titulo'] ?></h1>
                    <span id="autor">Libro de <?php echo $fila['autor'] ?></span>  
                    <span id="editorial"><b>Editorial: </b><?php echo $fila['editorial'] ?></span>
                    <span id="genero"><b>Género: </b><?php echo $fila['genero'] ?></span>
                    <span id="n_copias"><b>Número de copias: </b><?php echo $fila['n_copias'] ?></span>
                    
                    <?php require("php/buscar-libros/guardar-busqueda-libro.php") ?>
                    <?php require("php/buscar-libros/guardar-opcion-busqueda.php") ?>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
                        <input type="submit" value="Reservar">
                        <input name="form_cargar_libro" value="<?php echo $fila['id_libro'] ?>" type="hidden">
                        <input name="busqueda" value="<?php echo $busqueda ?>" type="hidden">
                        <input name="opcion_busqueda" value="<?php echo $opcion_busqueda ?>" type="hidden">
                        <input name="form_reservar_libro" type="hidden">
                    </form>
                </div>
            </div>
    <?php
        }
    }
}

/* CON CLASE LIBRO
class Libro {
    
    // Atributos
    private $id_libro;
    
    
    public function obtener_id_libro($libro) {
        if($_SERVER['REQUEST_METHOD'] === "GET") {
            
            if(isset($_GET['form_cargar_libro'])) {
                
                $id_libro = $_GET['form_cargar_libro'];
                
                $this->id_libro = $id_libro;
                
                $libro->cargar_libro($this->id_libro);
            }
        }
    }
    
    public function cargar_libro($id_libro) {
        
        require("./php/establecer-conexion.php");
        
        $consulta = "select id_libro, titulo, editorial, genero, autor, n_copias, img_portada from libros where id_libro = " . $id_libro;
        
        $buscar_libro = mysqli_query($conn, $consulta);
        
        while($fila = mysqli_fetch_array($buscar_libro)) { ?>
            <div id="contenido">
                <div id="header_libro">
                    <img id="img_portada" src="<?php echo $fila['img_portada'] ?>">
                    <span id="sinopsis"></span>
                </div>
                
                <div id="propiedades_libro">
                    <h1 id="titulo"><?php echo $fila['titulo'] ?></h1>
                    <span id="autor">Libro de <?php echo $fila['autor'] ?></span>  
                    <span id="editorial"><b>Editorial: </b><?php echo $fila['editorial'] ?></span>
                    <span id="genero"><b>Género: </b><?php echo $fila['genero'] ?></span>
                    <span id="n_copias"><b>Número de copias: </b><?php echo $fila['n_copias'] ?></span>
                    
                    <?php require("./php/buscar-libros/guardar-busqueda-libro.php") ?>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
                        <input type="submit" value="Reservar">
                        <input name="form_cargar_libro" value="<?php echo $fila['id_libro'] ?>" type="hidden">
                        <input name="titulo_libro" value="<?php echo $busqueda ?>" type="hidden">
                        <input name="form_reservar_libro" type="hidden">
                    </form>
                </div>
            </div>
        <?php
        }
    }
}
*/