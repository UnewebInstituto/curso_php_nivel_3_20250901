<?php
    session_start(); #Se inicia la sesión
    echo "Se inició sesión<br>";
    echo "Bajo el identificador:" . session_id() . "<br>";
    # Se crean las variables de sesión
    if (empty($_SESSION['usuario'])){
        echo "Variables de sesión ya no existen.";
        return;
    }
    echo "Contenido de las variables de sesión:<br>";
    echo "USUARIO:" . $_SESSION['usuario'] . "<br>";
    echo "NOMBRE:" . $_SESSION['nombre'] . "<br>";
?>
