// Fecha de devolución expirada
function fecha_devolucion_expirada() {
    
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./php/administrador/fecha-devolucion-expirada.php", true);

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            
            // Borramos la tabla actual si existe
            if(document.getElementById('tabla_btn')) {
                document.getElementById('tabla_btn').remove();
            }
            
            // Nueva tabla
            let nueva_tabla = document.createElement("table");
            nueva_tabla.id = "tabla_btn";
            nueva_tabla.innerHTML = this.responseText;
            
            // Insertar tabla
            let btns_cargar_tabla = document.getElementById("btns_cargar_tabla");
            let insert_before_buscar_usuario = document.getElementById("insert_before_buscar_usuario");
            btns_cargar_tabla.insertBefore(nueva_tabla, insert_before_buscar_usuario);
        }
    }
    xhttp.send();
}

// Pendientes de devolver
function pendientes_devolver() {
    
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./php/administrador/pendientes-devolver.php", true);

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            
            // Borramos la tabla actual si existe
            if(document.getElementById('tabla_btn')) {
                document.getElementById('tabla_btn').remove();
            }
            
            // Nueva tabla
            let nueva_tabla = document.createElement("table");
            nueva_tabla.id = "tabla_btn";
            nueva_tabla.innerHTML = this.responseText;
            
            // Insertar tabla
            let btns_cargar_tabla = document.getElementById("btns_cargar_tabla");
            let insert_before_buscar_usuario = document.getElementById("insert_before_buscar_usuario");
            btns_cargar_tabla.insertBefore(nueva_tabla, insert_before_buscar_usuario);
        }
    }
    xhttp.send();
}

// Mostrar datos del usuario y sus libros prestados sin devolver
function mostrar_datos_usuario() {
    
    let id_usuario_dni = document.getElementById("id_usuario_dni").value;
    
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./php/administrador/datos-usuario.php?id_usuario_dni=" + id_usuario_dni, true);
    
    xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
            
            // Borramos la tabla actual si existe
            if(document.getElementById('tabla_usuario')) {
                document.getElementById('tabla_usuario').remove();
            }
            
            // Borramos el texto actual si existe
            if(document.getElementById("txt_datos_usuario")) {
                document.getElementById("txt_datos_usuario").remove();
            }
            
            // Nueva tabla
            let nueva_tabla = document.createElement("table");
            nueva_tabla.id = "tabla_usuario";
            nueva_tabla.innerHTML = this.responseText;
            
            // Nuevo p
            let nuevo_p = document.createElement("p");
            nuevo_p.textContent = "Datos del usuario";
            nuevo_p.id = "txt_datos_usuario";
            
            // Insertar tabla
            let buscar_usuario = document.getElementById("buscar_usuario");
            let insert_before_tabla_prestamos = document.getElementById("insert_before_tabla_prestamos");
            buscar_usuario.insertBefore(nuevo_p, insert_before_tabla_prestamos);
            buscar_usuario.insertBefore(nueva_tabla, insert_before_tabla_prestamos);
        }
    }
    xhttp.send();
    
    // Segunda tabla de prestamos del usuario sin devolver
    let xhttp2 = new XMLHttpRequest();
    xhttp2.open("GET", "./php/administrador/datos-prestamos-usuario.php?id_usuario_dni=" + id_usuario_dni, true);
    
    xhttp2.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
            
            // Borramos la tabla actual si existe
            if(document.getElementById('tabla_prestamos_usuario')) {
                document.getElementById('tabla_prestamos_usuario').remove();
            }
            
            // Borramos el texto actual si existe
            if(document.getElementById("txt_prestamos_usuario")) {
                document.getElementById("txt_prestamos_usuario").remove();
            }
            
            // Nueva tabla
            let nueva_tabla = document.createElement("table");
            nueva_tabla.id = "tabla_prestamos_usuario";
            nueva_tabla.innerHTML = this.responseText;
            
            // Nuevo p
            let nuevo_p = document.createElement("p");
            nuevo_p.textContent = "Libros pendientes de devolver del usuario";
            nuevo_p.id = "txt_prestamos_usuario";
            
            // Insertar tabla
            let buscar_usuario = document.getElementById("buscar_usuario");
            let insert_before_modificar_fecha_devolucion = document.getElementById("insert_before_modificar_fecha_devolucion");
            buscar_usuario.insertBefore(nuevo_p, insert_before_modificar_fecha_devolucion);
            buscar_usuario.insertBefore(nueva_tabla, insert_before_modificar_fecha_devolucion);
        }
    }
    xhttp2.send();
}

// Mostrar libro
function mostrar_libro() {
    
    let id_libro = document.getElementById("id_libro").value;
    
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./php/administrador/mostrar-libro.php?id_libro=" + id_libro, true);
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState = 4 && this.status == 200) {
            console.log(this.responseText);
            
            if(document.getElementById("tabla_libro")) {
                document.getElementById("tabla_libro").remove();
            }
            
            let nueva_tabla = document.createElement("table");
            nueva_tabla.id = "tabla_libro";
            nueva_tabla.innerHTML = this.responseText;
            
            let mostrar_libro = document.getElementById("mostrar_libro");
            let last_insert_before = document.getElementById("last_insert_before");
            mostrar_libro.insertBefore(nueva_tabla, last_insert_before);
        }
    }
    xhttp.send();
}