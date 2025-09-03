<?php

    $servidor= "localhost";
    $usuario="root";
    $password="";
    $bd= "bd_carrito_jose";
    //$enlance = mysqli_connect ($servidor,$usuario, $password, $bd);

    /*if ($enlance){
        echo "conexion exitosa";
    }*/

    try {
        $enlace = mysqli_connect($servidor, $usuario, $password, $bd);

    } catch(\Throwable $th){
        echo $th->getmessage();
    }

?>