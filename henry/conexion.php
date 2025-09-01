<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "bd_carrito_henry";
    /*
    $enlace = mysqli_connect($servidor, $usuario, $password, $bd);
    if ($enlace){
        echo "Conexión exitosa";
    }else{
        echo "No conexión exitosa";
    }
    */
    try {
        $enlace = mysqli_connect($servidor, $usuario, $password, $bd);
    } catch (\Throwable $th) {
        echo $th->getmessage();
    }
?>