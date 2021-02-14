<?php

if($_SERVER['REQUEST_METHOD'] === "GET") {
    reservar_libro();
}

function reservar_libro() {
    
    if(isset($_GET['form_reservar_libro'])) {
        
        if(isset($_SESSION['id_usuario'])) {
            
            require("php/establecer-conexion.php");
            
            // id_libro que el usuario quiere reservar
            $id_libro = $_GET['form_cargar_libro'];
            
            $consulta = "select count(*) from prestamos where id_usuario = " . $_SESSION['id_usuario'] . " && fecha_devolucion is NULL;";
            
            $cantidad_libros_reservados = mysqli_query($conn, $consulta);
            
            $total_libros_reservados;
            while($fila = mysqli_fetch_array($cantidad_libros_reservados)) {
                $total_libros_reservados = $fila['count(*)'];
            }
            
            $max_libros_reservados = 5;
            // Comprobar si el usuario tiene menos del máximo de libros reservados permitidos
            if($total_libros_reservados < $max_libros_reservados) {
                
                $consulta = "select fecha_devolucion, id_usuario, id_libro from prestamos where id_usuario = " . $_SESSION['id_usuario'] . " and id_libro = " . $id_libro . " and fecha_devolucion is NULL;";
        
                $libro_pendiente_devolver = mysqli_query($conn, $consulta);
        
                // Comprobar si el usuario tiene el libro pendiente de devolver
                if(mysqli_num_rows($libro_pendiente_devolver) >= 1) {
                    
                    echo "<span id='error_prestamo'>Ya tienes este libro reservado.</span>";
                    // El usuario TIENE el libro pendiente de devolver.
            
                } else {
                
                    // El usuario NO tiene el libro pendiente de devolver.
                
                    $consulta = "select n_copias from libros where id_libro = " . $id_libro;
        
                    $buscar_n_copias = mysqli_query($conn, $consulta);
            
                    // Comprobar que el n_copias sea >= 1
                    if($buscar_n_copias) {
            
                        while($fila = mysqli_fetch_array($buscar_n_copias)) {
                    
                            // Si el libro tiene 1 o más n_copias
                            if($fila['n_copias'] >= 1) {
                                
                                $n_copias = $fila['n_copias'];
                                $n_copias = $n_copias - 1;
                        
                                $consulta = "update libros set n_copias = " . $n_copias . " where id_libro = " . $id_libro . ";";
                                $disminuir_n_copias = mysqli_query($conn, $consulta);
                        
                                // Disminuir en 1 el n_copias
                                if($disminuir_n_copias) {
                                
                                    $consulta = "insert into prestamos(id_prestamo, fecha_salida, fecha_maxima, fecha_devolucion, id_usuario, id_libro) values (null, curdate(), (curdate()+INTERVAL 7 DAY), NULL, " . $_SESSION['id_usuario'] . ", " . $id_libro . ")";
                                
                                    $insertar_nuevo_prestamo = mysqli_query($conn, $consulta);
                                
                                    if($insertar_nuevo_prestamo) {
                                        // Nuevo prestamo insertado en la tabla "prestamos"
                                        echo "<span id='prestamo_exitoso'>Nuevo prestamo realizado.</span>";
                                    
                                    } else {
                                        echo "<span id='error_prestamo'>Error al insertar el nuevo prestamo." . mysqli_error($conn) . "</span>";
                                    }
                                }
                                
                            } else {
                                // El número de copias es < a 1
                                echo "<span id='error_prestamo'>Lo sentimos, ahora mismo no quedan copias de ese libro.</span>";
                            }
                        }
                    }
                }
                
            } else {
                // El usuario tiene 5 libros reservados
                echo "<span id='error_prestamo'>No se pueden reservar más de " . $max_libros_reservados . " libros al mismo tiempo.</span>";
            }
            
        } else {
            // No has iniciado sesión
            header("Location: bienvenida.php");
        }
    }
}
