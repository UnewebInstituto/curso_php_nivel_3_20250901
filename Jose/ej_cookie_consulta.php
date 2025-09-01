<?php

    if (!empty($_COOKIE['nombre'])){
        echo "Contenido de la variable cookie:<br>";
        echo $_COOKIE ['nombre'];
        echo "hr";

    } else {
        echo "la variable de cookie, ya expiro <br>";
    }

?>