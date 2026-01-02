<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf'])) {
$_SESSION['csrf'] = bin2hex(random_bytes(16));
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing - Divcal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="topbar">
        <div class="container topbar-inner">
            <a class="brand" href="#inicio">
                <img src="assets/img/logodivcalv1web1.png" alt="Logo">
                <div class="brand-text">
                </div>
            </a>
        <nav class="nav" id="nav">
            <a class="nav-link active" href="#inicio">Inicio</a>
            <a class="nav-link" href="#nosotros">Nosotros</a>
            <a class="nav-link" href="#servicios">Servicios</a>
            <a class="nav-link" href="#contacto">Contacto</a>
            <!-- <a class="nav-link" href="#clientes">Clientes</a> -->
            <a class="nav-link" href="#porque">¿Por qué elegirnos?</a>
        </nav>
        <button class="burger" id="burger" aria-label="Abrir menú">☰</button>
        </div>
</header>
<main>
