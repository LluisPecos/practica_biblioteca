let select_opcion_busqueda = document.getElementById("opciones_busqueda");
let array_options = select_opcion_busqueda.getElementsByTagName("option");

let opcion_busqueda = document.getElementById("opciones_busqueda").className;

for (let i = 0; i < array_options.length; i++) {
    if (array_options[i].value == opcion_busqueda) {
        array_options[i].setAttribute("selected", "selected");
        break;
    }
}