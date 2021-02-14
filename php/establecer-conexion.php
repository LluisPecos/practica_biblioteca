<?php

$host = "localhost";
$usuario = "root";
$contraseña = "";
$database = "biblioteca";

$conn = mysqli_connect($host, $usuario, $contraseña, $database);

if($conn) {
    
} else {
    echo "Error al conectarse con la base de datos " . mysqli_connect_error();
}

?>