<?php

require("../establecer-conexion.php");
$consulta = "select *, DATEDIFF(fecha_maxima, current_date()) as dias_restantes from prestamos where fecha_devolucion is null and DATEDIFF(fecha_maxima, current_date()) > 0;";

$fecha_maxima_expirada = mysqli_query($conn, $consulta);

if ($fecha_maxima_expirada) {
    
    echo "
    <tr>
        <th>ID Prestamo</th>
        <th>Fecha salida</th>
        <th>Fecha máxima</th>
        <th>Fecha devolución</th>
        <th>Días restantes</th>
        <th>ID Usuario</th>
        <th>ID Libro</th>
    </tr>";
    

        
    while($fila=mysqli_fetch_array($fecha_maxima_expirada)) {
        
        echo "
        <tr>
            <td>" . $fila['id_prestamo'] . "</td>
            <td>" . $fila['fecha_salida'] . "</td>
            <td>" . $fila['fecha_maxima'] . "</td>
            <td>NO DEVUELTO</td>
            <td>" . $fila['dias_restantes'] . "</td>
            <td>" . $fila['id_usuario'] . "</td>
            <td>" . $fila['id_libro'] . "</td>
        </tr>";
    }
}
