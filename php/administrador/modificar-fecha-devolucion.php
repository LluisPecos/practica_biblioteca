<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    modificar_fecha_devolucion();
}

function modificar_fecha_devolucion() {
    
    if(isset($_GET['fecha_devolucion'])) {
        
        $fecha_devolucion = $_GET['fecha_devolucion'];
        $id_prestamo = $_GET['id_prestamo'];
        
        require("../establecer-conexion.php");
        
        $consulta = "update prestamos set fecha_devolucion = '" . $fecha_devolucion . "' where id_prestamo = " . $id_prestamo . ";";
        
        $modificar_fecha_devolucion = mysqli_query($conn, $consulta);
        
        if($modificar_fecha_devolucion) {
            echo "Fecha modificada correctamente";
        } else {
            echo "Error al modificar la fecha " . mysqli_error($conn);
        }
        
        // Buscar id_libro del id_prestamo
        $consulta = "select id_libro from prestamos where id_prestamo = " . $id_prestamo . ";";
        $buscar_id_libro = mysqli_query($conn, $consulta);
        $id_libro;
        
        if($buscar_id_libro) {
            while($fila=mysqli_fetch_array($buscar_id_libro)) {
                $id_libro = $fila['id_libro'];
            }
        }
        
        // Sumar n_copias + 1 en el id_libro devuelto
        $consulta = "update libros set n_copias = (n_copias + 1) where id_libro = " . $id_libro . ";";
        $sumar_n_copia = mysqli_query($conn, $consulta);
        
        if($sumar_n_copia) {
            // No hacer nada
        }
        
    }
}
