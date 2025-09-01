<?php
    session_start(); #Se inicia la sesion
    echo'Se inicio sesión<br>';
    echo "Bajo el identificador: " . session_id() . "<br>";
    #Se crean las variables de sesion
    if (empty($_SESSION['usuario'])) {
        echo 'No existe la sesión.';
        return;
    }
    echo 'Contenido de las variables de sesión:<br>';
    echo 'Usuario: ' . $_SESSION['usuario'] . "<br>";
    echo "Nombre: " . $_SESSION['nombre'] . "<br>";



?>