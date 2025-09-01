<?php
    
    session_start(); #Se Inicia la sesion
    echo "Se inicio sesion <br>";
    echo "Bajo el identificador:" . session_id() . "<br>"; #Se crean las variables de sesion

    echo "Contenido de las variables de sesion:<br>";

    echo "USUARIO:" . $_SESSION ['usuario'] . "<br>";
    echo "NOMBRE:" . $_SESSION ['nombre '] . "<br>";
    
?>