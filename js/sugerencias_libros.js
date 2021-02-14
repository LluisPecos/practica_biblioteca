function sugerencias_libros() {
    
    let busqueda = document.getElementById("busqueda").value;
    let opcion_busqueda = document.getElementById("opciones_busqueda").value;
    
    let xhttp = new XMLHttpRequest();
    xhttp.open("get", "./php/buscar-libros/sugerencias-libros.php?busqueda=" + busqueda + "&opcion_busqueda=" + opcion_busqueda, true);
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200) {
            document.getElementById("sugerencias_libros").innerHTML = "";
            document.getElementById("sugerencias_libros").innerHTML = this.responseText;
            
            // Añadir event listener onclick
            let sugerencia_libro = document.getElementsByClassName("sugerencia_libro");
            
            for(let i = 0; i < sugerencia_libro.length; i++) {
                
                sugerencia_libro[i].addEventListener("click", function() {
                    document.getElementById("busqueda").value = this.textContent;
                    document.forms['buscar_libro'].submit();
                });
            }
        }
    }
    xhttp.send();
}
