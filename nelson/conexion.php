<?php
    // Docker environment database configuration
    $servidor = "uneweb.database"; // Docker service name
    $usuario = "root";
    $password = "root"; // MYSQL_ROOT_PASSWORD from environment
    $bd = "bd_carrito_nelson";
    
    $enlace = null; // Initialize the variable
    
    try {
        $enlace = mysqli_connect($servidor, $usuario, $password, $bd);
        if (!$enlace) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }
    } catch (\Throwable $th) {
        $mensaje = "Error de conexión: " . $th->getMessage();
        $severidad = 4;
        if (!headers_sent()) {
            setcookie('mensaje', $mensaje, time()+30);
            setcookie('severidad', $severidad, time()+30);
        }
    }
?>