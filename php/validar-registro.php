<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validarRegistro();
}

function validarRegistro() {
    
    if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['dni']) && isset($_POST['contraseña']) && isset($_POST['contraseña_repetida'])) {
        
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $contraseña = $_POST['contraseña'];
        $contraseña_repetida = $_POST['contraseña_repetida'];
        
        $telefono = $_POST['telefono'];
        $domicilio = $_POST['domicilio'];
        $poblacion = $_POST['poblacion'];
        $email = $_POST['email'];
        
        /* CAMPOS OPCIONALES
        if(empty($_POST['telefono'])){
            $telefono = null;
        } else {
            $telefono = $_POST['telefono'];
        }
        
        if(empty($_POST['domicilio'])){
            $domicilio = null;
        } else {
            $domicilio = $_POST['domicilio'];
        }
        
        if(empty($_POST['poblacion'])){
            $poblacion = null;
        } else {
            $poblacion = $_POST['poblacion'];
        }
        
        if(empty($_POST['email'])){
            $email = null;
        } else {
            $email = $_POST['email'];
        }
        */
        
        // Comprobar que ambas contraseñas coincidan
        if($contraseña == $contraseña_repetida) {
            
            // Cifrar la contraseña
            $ctrs_cifrada = password_hash($contraseña, PASSWORD_DEFAULT);
            
            require("php/establecer-conexion.php");
            
            $consulta = "insert into usuarios(id_usuario, nombre, apellidos, dni, telefono, domicilio, poblacion, email, contraseña, rol) values(null, '" . $nombre . "', '" . $apellidos . "', '" . $dni . "'," . $telefono . ",'" . $domicilio . "', '" . $poblacion . "', '" . $email . "', '" . $ctrs_cifrada . "', default)";
            
            $insertar_usuario = mysqli_query($conn, $consulta);
            
            // Si inserta al usuario correctamente
            if($insertar_usuario) {
                
                // id_usuario del último usuario insertado
                $consulta = "select LAST_INSERT_ID();";
                
                $ultimo_insertado = mysqli_query($conn, $consulta);
                
                while($fila = mysqli_fetch_array($ultimo_insertado)) {
                    
                    // Guardo el id_usuario del último usuario insertado en la variable $_SESSION
                    $_SESSION['id_usuario'] = $fila['LAST_INSERT_ID()'];
                    
                    // Columna nombre del último usuario insertado
                    $consulta = "select nombre, email from usuarios where id_usuario = " . $fila['LAST_INSERT_ID()'];
                    
                    $buscar_nombre = mysqli_query($conn, $consulta);
                    
                    while($fila2 = mysqli_fetch_array($buscar_nombre)) {
                        
                        // Guardo el nombre y el email en la varible $_SESSION
                        $_SESSION['nombre'] = $fila2['nombre'];
                        $_SESSION['email'] = $fila2['email'];
                    }
                }
                
                header("Location: registro-exitoso.php");
                
            } else {
                echo "<span id='error'>* Error al registrar: " . mysqli_error($conn) . "</span>";
            }
            
        } else {
            echo "<span id='error'>* Las contraseñas no coinciden</span>";
        }
    }
}

?>