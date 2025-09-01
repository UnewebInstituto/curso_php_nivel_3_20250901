<?php
    
    session_start(); #Se Inicia la sesion
    echo "Se inicio sesion <br>";
    echo "Bajo el identificador:" .session_id() ."<br>"; #Se crean las variables de sesion
    $_SESSION ['usuario']= 'jocurre';
    $_SESSION ['nombre ']= 'Jose';
    echo "Las varibles de sesion fueron declaradas <br>";


?>