<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validarLogin();
}

function validarLogin() {
    
    if(isset($_POST['id_usuario_dni']) && isset($_POST['contraseña'])) {
        
        require("establecer-conexion.php");
        
        $id_usuario_dni = $_POST['id_usuario_dni'];
        $contraseña = $_POST['contraseña'];

        $consulta = "select id_usuario, dni, nombre, email, contraseña, rol from usuarios where id_usuario = '" . $id_usuario_dni . "' or dni = '" . $id_usuario_dni . "';";

        $buscar_usuario = mysqli_query($conn, $consulta);
        
        while($fila = mysqli_fetch_array($buscar_usuario)) {

            if($id_usuario_dni == $fila['id_usuario'] || $id_usuario_dni == $fila['dni']) {
                
                if(password_verify($contraseña, $fila['contraseña'])) {
                    
                    $_SESSION['id_usuario'] = $fila['id_usuario'];
                    $_SESSION['nombre'] = $fila['nombre'];
                    $_SESSION['email'] = $fila['email'];
                    $_SESSION['rol'] = $fila['rol'];
                    
                    header("Location: bienvenida.php");
                    
                } else {
                    echo "* Contraseña incorrecta";
                }
                
            } else {
                echo "* El usuario con DNI o ID de usuario " . $id_usuario_dni . " no existe";
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    validarLogin_XMLHttpRequest();
}

function validarLogin_XMLHttpRequest() {
    if(isset($_GET['id_usuario_dni']) && isset($_GET['contraseña'])) {
        
        require("establecer-conexion.php");
        
        $id_usuario_dni = $_GET['id_usuario_dni'];
        $contraseña = $_GET['contraseña'];

        $consulta = "select id_usuario, dni, nombre, email, contraseña from usuarios where id_usuario = '" . $id_usuario_dni . "' or dni = '" . $id_usuario_dni . "';";
        
        $buscar_usuario = mysqli_query($conn, $consulta);
        
        if($buscar_usuario) {
            
            while($fila = mysqli_fetch_array($buscar_usuario)) {
                
                if($id_usuario_dni == $fila['id_usuario'] || $id_usuario_dni == $fila['dni']) {
                    
                    if(password_verify($contraseña, $fila['contraseña'])) {
                    
                    } else {
                        echo "* Contraseña incorrecta";
                    }
                
                } else {
                    echo "* El usuario con DNI o ID de usuario '" . $id_usuario_dni . "' no existe";
                }
            }
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
        }
    }
}

?>