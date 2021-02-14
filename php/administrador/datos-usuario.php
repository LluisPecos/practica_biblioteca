<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    mostrar_datos_usuario();
}

function mostrar_datos_usuario() {
    
    if(isset($_GET['id_usuario_dni'])) {
        
        $id_usuario_dni = $_GET['id_usuario_dni'];

        require("../establecer-conexion.php");
        $consulta = "select id_usuario, nombre, apellidos, dni, telefono, domicilio, poblacion, email, rol from usuarios where id_usuario = '" . $id_usuario_dni . "' or DNI = '" . $id_usuario_dni . "';";

        $fecha_maxima_expirada = mysqli_query($conn, $consulta);

        if ($fecha_maxima_expirada) {
    
            echo "
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Telefono</th>
                <th>Domicilio</th>
                <th>Poblacion</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>";
            
            while($fila=mysqli_fetch_array($fecha_maxima_expirada)) {
                
                echo "
                <tr>
                    <td>" . $fila['id_usuario'] . "</td>
                    <td>" . $fila['nombre'] . "</td>
                    <td>" . $fila['apellidos'] . "</td>
                    <td>" . $fila['dni'] . "</td>
                    <td>" . $fila['telefono'] . "</td>
                    <td>" . $fila['domicilio'] . "</td>
                    <td>" . $fila['poblacion'] . "</td>
                    <td>" . $fila['email'] . "</td>
                    <td>" . $fila['rol'] . "</td>
                </tr>";
            }
        }
    }
}
