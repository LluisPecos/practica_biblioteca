<?php

// Si se ha hecho una busqueda guardar lo que se ha buscado en una variable y mostrarlo en la barra de busqueda
if(isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];
} else {
    $busqueda = '';
}