function modificar_fecha_devolucion() {
    
    let fecha_devolucion = document.getElementById("fecha_devolucion").value;
    let id_prestamo = document.getElementById("id_prestamo").value;
    
    // Si la fecha de devolución no se encuentra vacía
    if(fecha_devolucion) {
        
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "./php/administrador/modificar-fecha-devolucion.php?fecha_devolucion=" + fecha_devolucion + "&id_prestamo=" + id_prestamo, true);
        
        xhttp.onreadystatechange = function() {
            
            if(this.readyState == 4 && this.status == 200) {
                
                // TXT éxito al modificar la fecha o error
                if(this.responseText == "Fecha modificada correctamente") {
                    
                    let txt_modificar_fecha_devolucion = document.getElementById("txt_error_modificar_fecha_devolucion");
                    txt_modificar_fecha_devolucion.textContent = this.responseText;
                    txt_modificar_fecha_devolucion.style.color = "green";
                    
                } else if(this.responseText == "Error al modificar la fecha") {
                    
                    let txt_modificar_fecha_devolucion = document.getElementById("txt_error_modificar_fecha_devolucion");
                    txt_modificar_fecha_devolucion.textContent = this.responseText;
                    txt_modificar_fecha_devolucion.style.color = "red";
                }
            }
        }
        xhttp.send();
        
    } else {
        // TXT la fecha se encuentra vacía
        let txt_modificar_fecha_devolucion = document.getElementById("txt_error_modificar_fecha_devolucion");
        txt_modificar_fecha_devolucion.textContent = "La fecha se encuentra vacía";
        txt_modificar_fecha_devolucion.style.color = "red";
    }
}