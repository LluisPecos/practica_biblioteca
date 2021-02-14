<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    mostrar_libro();
}

function mostrar_libro() {
    
    if(isset($_GET['id_libro'])) {
        
        $id_libro = $_GET['id_libro'];
        
        require("../establecer-conexion.php");
        
        $consulta = "select * from libros where id_libro = " . $id_libro;
        
        $buscar_libro = mysqli_query($conn, $consulta);
        
        if($buscar_libro) {
            
            echo "
            <tr>
                <th>ID Libro</th>
                <th>Título</th>
                <th>Editorial</th>
                <th>Género</th>
                <th>Autor</th>
                <th>Nº Copias</th>
            </tr>";
            
            while($fila = mysqli_fetch_array($buscar_libro)) {
                echo "
                <tr>
                    <td>" . $fila['id_libro'] . "</td>
                    <td>" . $fila['titulo'] . "</td>
                    <td>" . $fila['editorial'] . "</td>
                    <td>" . $fila['genero'] . "</td>
                    <td>" . $fila['autor'] . "</td>
                    <td>" . $fila['n_copias'] . "</td>
                </tr>";
            }
            
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
        }
        
    }
    
}