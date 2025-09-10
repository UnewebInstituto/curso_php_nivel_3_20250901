<?php
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">  
    <link rel="stylesheet" href="./css/style.css"> 
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="../img/uneweb_icono.png" type="image/x-icon">
    <title>Carrito de Compras</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Carrito de compras</h1>
            <?php
            if ($_SESSION['activo']){
            ?>
                <div class="text-end">
                    <b>Usuario:</b><?php echo $_SESSION['nombre_apellido'];?>
                    <br>
                    <a href="./cerrar_sesion.php">Cerrar sesión</a>
                </div>
            <?php
            }
            ?>
        </header>
