function fecha_actual() {
    let fecha_devolucion = document.getElementById("fecha_devolucion");
    let fecha_actual = new Date();
    
    let mes;
    let dia;
    
    if((fecha_actual.getMonth()+1) < 10) {
        mes = "0" + (fecha_actual.getMonth()+1);
        
    } else {
        mes = fecha_actual.getMonth()+1;
    }
    
    if((fecha_actual.getDate()) < 10) {
        dia = "0" + fecha_actual.getDate();
        
    } else {
        dia = fecha_actual.getDate();
    }
    
    let fecha_actual_yyyy_mm_dd = fecha_actual.getFullYear() + "-" + mes + "-" + dia;
    fecha_devolucion.value = fecha_actual_yyyy_mm_dd;
}