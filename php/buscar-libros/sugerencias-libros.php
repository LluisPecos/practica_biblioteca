<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    mostrar_sugerencias_libros();
}

function mostrar_sugerencias_libros() {
    
    if(isset($_GET['busqueda']) && !empty($_GET['busqueda']) && isset($_GET['opcion_busqueda'])) {
        
        $busqueda = $_GET['busqueda'];
        $opcion_busqueda = $_GET['opcion_busqueda'];
        
        require("../establecer-conexion.php");
        
        $consulta = "select " . $opcion_busqueda . " from libros where " . $opcion_busqueda . " like '%" . $busqueda . "%' group by " . $opcion_busqueda . " limit 10;";
        
        $buscar_sugerencias = mysqli_query($conn, $consulta);
        
        if($buscar_sugerencias) {
        
            while($fila = mysqli_fetch_array($buscar_sugerencias)) {
                if(stristr($fila[$opcion_busqueda], $busqueda)) {
                    echo "<div class='sugerencia_libro'>" . $fila[$opcion_busqueda] . "</div>";
                }
            }
        
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
        }
    }
}