<?php
    session_start(); #Se inicia la sesión
    echo "Se inició sesión<br>";
    echo "Bajo el identificador:" . session_id() . "<br>";
    # Se crean las variables de sesión
    $_SESSION['usuario'] = 'hduque';
    $_SESSION['nombre'] = 'HENRY DUQUE';
    echo "Las variables de sesión fueron declaradas<br>";
?>