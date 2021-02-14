<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    mostrar_datos_prestamos_usuario();
}

function mostrar_datos_prestamos_usuario() {
    
    if(isset($_GET['id_usuario_dni'])) {
        
        $id_usuario_dni = $_GET['id_usuario_dni'];
        
        require("../establecer-conexion.php");
        $consulta = "select p.id_prestamo, p.fecha_salida, p.fecha_maxima, p.fecha_devolucion, p.id_libro
        from prestamos p join usuarios u on p.id_usuario = u.id_usuario
        where p.fecha_devolucion is null and (p.id_usuario = '" . $id_usuario_dni . "' or u.dni = '" . $id_usuario_dni . "');";
        
        $fecha_maxima_expirada = mysqli_query($conn, $consulta);
        
        if ($fecha_maxima_expirada) {
            
            echo "
            <tr>
                <th>ID Prestamo</th>
                <th>Fecha salida</th>
                <th>Fecha máxima</th>
                <th>Fecha devolución</th>
                <th>ID Libro</th>
            </tr>";
            
            while($fila=mysqli_fetch_array($fecha_maxima_expirada)) {
                
                echo "
                <tr>
                    <td>" . $fila['id_prestamo'] . "</td>
                    <td>" . $fila['fecha_salida'] . "</td>
                    <td>" . $fila['fecha_maxima'] . "</td>
                    <td>NO DEVUELTO</td>
                    <td>" . $fila['id_libro'] . "</td>
                </tr>";
            }
        }
    }
}
