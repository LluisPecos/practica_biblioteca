<div id="sugerencias">
    
    <div id="box_sugerencias" class="ocultar_box_sugerencias" style="display: none">
        <h3>Sugerencias</h3>
        <div id="box_sugerencias_contenido">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                
                <input name="asunto" type="text" placeholder="Asunto" autocomplete="off">
                
                <textarea name="sugerencia" placeholder="Escribe tu sugerencia..."></textarea>
                
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    
    <div id="cont_img" onclick="mostrar_ocultar_sugerencias()">
        <img id="img_sugerencias" src="imgs/chat.png">
    </div>
</div>

<script type="text/javascript" src="js/mostrar_ocultar_sugerencias.js"></script>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    enviarSugerencia();
}

function enviarSugerencia() {
    if(isset($_POST['asunto']) && isset($_POST['sugerencia'])) {
        if(!empty($_POST['asunto']) || !empty($_POST['sugerencia'])) {
            require("php/enviar-email.php");
        }
    }
}

?>