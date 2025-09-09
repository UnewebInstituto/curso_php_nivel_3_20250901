<?php
    /*
    if (!empty($_COOKIE['nombre'])){
        echo "Contenido de la variable cookie:<br>";
        echo $_COOKIE['nombre'];
        echo "<hr>";
    }else{
        echo "La variable de tipo cookie, ya expiró<br>";
    }
    */

     
    if (empty($_COOKIE['nombre'])){
        echo "La variable de tipo cookie, ya expiró<br>";
        return;
    }
    echo "Contenido de la variable cookie:<br>";
    echo $_COOKIE['nombre'];
    echo "<hr>";
    
?>