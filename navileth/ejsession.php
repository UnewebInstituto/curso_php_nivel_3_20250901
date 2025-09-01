<?php
    session_start(); #Se inicia la sesion
    echo'Se inicio sesión<br>';
    echo "Bajo el identificador: " . session_id() . "<br>";
    #Se crean las variables de sesion
    $_SESSION['usuario'] = 'nleon';
    $_SESSION['nombre'] = 'Navileth Leon';
    echo 'Las variables de sesión fueron declaradas<br>';



?>