<?php
    session_start();
    // error_reporting(0);
    ob_start(); // Start output buffering to prevent header issues
    
    // Initialize session variables if not set
    if (!isset($_SESSION['tipo_usuario'])) {
        $_SESSION['tipo_usuario'] = '';
    }
    if (!isset($_SESSION['ver_carrito'])) {
        $_SESSION['ver_carrito'] = false;
    }
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
    <title>Carrito de compras - Nelson Rivas</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Carrito de compras - Nelson Rivas</h1>
        </header>
