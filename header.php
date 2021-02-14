<?php session_start(); ?>

<header>
    <div id="cabecera">
        <img src="imgs/logo.png">
        
        <?php 
        
        if(isset($_SESSION['id_usuario'])) {
            echo "<a id='btnIniciar' href='cerrar-sesion.php'>Cerrar sesión</a>";
        } else {
            echo "<a id='btnIniciar' href='iniciar-sesion.php'>Iniciar sesión</a>";
        }
        
        ?>
        

    </div>

    <nav id="menu">
        <ul>
            <li><a href="indice.php">Inicio</a></li>
            <li><a href="buscar-libros.php">Buscar libros</a></li>
            <?php
            if(isset($_SESSION['rol'])) {
                
                if($_SESSION['rol'] == "adm") {
                    
                echo "<li><a href='administrador.php'>Administrador</a></li>";
                    
                }
            }
            ?>
        </ul>
    </nav>
</header>