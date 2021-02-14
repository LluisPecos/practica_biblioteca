<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrador</title>
        <?php require("head.php") ?>
        <link rel="stylesheet" href="css/administrador.css">
    </head>
    
    <body>
        
        <?php require("header.php") ?>
        
        <div id="fondobody">
        
        <?php 
            if(isset($_SESSION['rol'])) {
                if($_SESSION['rol'] == "adm") { ?>
            
                <div id="btns_cargar_tabla">
                    <p id="txt_btns_cargar_tabla">Mostrar prestamos</p>
                    
                    <div id="inputs">
                        <button type="button" onclick="fecha_devolucion_expirada()">Fecha de devolución expirada</button>
                        <button type="button" onclick="pendientes_devolver()">Pendientes de devolver</button>
                    </div>
                    
                    <hr id="insert_before_buscar_usuario">
                </div>
            
                <div id="buscar_usuario">
                    <p id="txt_buscar_usuario">Buscar usuario por su ID o DNI</p>
                    
                    <div id="inputs">
                        <input id="id_usuario_dni" type="text" placeholder="ID Usuario o DNI">
                        <input type="submit" value="Buscar" onclick="mostrar_datos_usuario()">
                    </div>
                    
                    <div id="insert_before_tabla_prestamos" style="display: none"></div>
                    
                    <hr id="insert_before_modificar_fecha_devolucion">
                </div>
            
                <div id="modificar_fecha_devolucion">
                    <p id="txt_modificar_fecha_devolucion">Modificar fecha de devolución de un prestamo</p>
                    
                    <div id="inputs">
                        <input id="id_prestamo" type="number" placeholder="ID Prestamo">
                        <input id="fecha_devolucion" type="date">
                        <input type="button" value="Hoy" onclick="fecha_actual()">
                        <input type="submit" value="Modificar" onclick="modificar_fecha_devolucion()">
                        <p id="txt_error_modificar_fecha_devolucion"></p>
                    </div>
                    
                    <hr id="insert_before_mostrar_libro">
                </div>
                
            
                <div id="mostrar_libro">
                    <p id="txt_mostrar_libro">Buscar libro por su ID</p>
                    
                    <div id="last_inputs">
                        <input id="id_libro" type="number" placeholder="ID Libro">
                        <input type="submit" value="Buscar" onclick="mostrar_libro()">
                    </div>
                    
                    <div id="last_insert_before" style="display: none"></div>
                </div>
            
                <script type="text/javascript" src="js/administrador/cargar_tablas_admin.js"></script>
                <script type="text/javascript" src="js/administrador/fecha_actual_devolucion.js"></script>
                <script type="text/javascript" src="js/administrador/modificar_fecha_devolucion.js"></script>
            
                <?php
                } else {
                    header("Location: bienvenida.php");
                }
                
            } else {
                header("Location: bienvenida.php");
            }
            
        ?>
            
        </div>
        
        <?php require("sugerencias.php") ?>
        <?php require("footer.php") ?>
            
    </body>
</html>