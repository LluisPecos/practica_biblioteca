function validar_login() {

    let form_iniciar_sesion = document.getElementById("iniciar_sesion");
    let array_input = form_iniciar_sesion.getElementsByTagName("input");
    let id_usuario_dni = array_input[0].value;
    let contraseña = array_input[1].value;
    let respuesta;
    
    if (id_usuario_dni != "" && contraseña != "") {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "php/validar-login.php?id_usuario_dni=" + id_usuario_dni + "&contraseña=" + contraseña, true);
        
        xhttp.onreadystatechange = function () {
            
            if (this.readyState == 4 && this.status == 200) {
                
                if (this.responseText != "") {
                    respuesta = this.responseText;
                    document.getElementById("error").textContent = this.responseText;
                    
                } else {
                    document.forms['iniciar_sesion'].submit();
                }
            }
        }
        xhttp.send();
        // para que no se siga el link que llama a esta función
        return;
    }
}
