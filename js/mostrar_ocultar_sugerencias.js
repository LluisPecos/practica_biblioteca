function mostrar_ocultar_sugerencias() {

    // Div sugerencias
    let div_sugerencias = document.getElementById("sugerencias");

    // Clase de box_sugerencias
    let class_box_sugerencias = document.getElementById("box_sugerencias").className;

    // Elemento box_sugerencias
    let box_sugerencias = document.getElementById("box_sugerencias");
    
    // Img sugerencias
    let img_sugerencias = document.getElementById("img_sugerencias");
    
    if (class_box_sugerencias == "ocultar_box_sugerencias") {

        // Cambiar nombre de la clase y imágen
        box_sugerencias.className = "mostrar_box_sugerencias";
        img_sugerencias.src = "imgs/x.png";

        // Display block a box_sugerencias
        box_sugerencias.style.display = "block";

        // Start the animation with JavaScript
        box_sugerencias.style.WebkitAnimation = "aumentarOpacidad 0.3s ease 1 forwards"; // Code for Chrome, Safari and Opera
        box_sugerencias.style.animation = "aumentarOpacidad 0.3s ease 1 forwards"; // Standard syntax

    } else {

        // Cambiar nombre de la clase y imágen
        box_sugerencias.className = "ocultar_box_sugerencias";
        img_sugerencias.src = "imgs/chat.png";

        // Start the animation with JavaScript
        box_sugerencias.style.WebkitAnimation = "disminuirOpacidad 0.3s ease 1 forwards"; // Code for Chrome, Safari and Opera
        box_sugerencias.style.animation = "disminuirOpacidad 0.3s ease 1 forwards"; // Standard syntax

        // Code for Chrome, Safari and Opera
        box_sugerencias.addEventListener("webkitAnimationEnd", finalAnimacion);

        // Standard syntax
        box_sugerencias.addEventListener("animationend", finalAnimacion);

        function finalAnimacion() {
            // Si el nombre de la clase actualmente es "ocultar_box_sugerencias"
            if (box_sugerencias.className == "ocultar_box_sugerencias") {
                box_sugerencias.style.display = "none";
            }
        }
    }
}