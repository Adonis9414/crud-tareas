<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
define('RUTA_RAIZ', '/crud-impulsora'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($titulo) ? $titulo : 'Gestión de Empleados y Equipos' ?></title>
    <?php include '../assets/libs/librerias.php';
   ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Gestión</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= RUTA_RAIZ ?>/empleados/listar.php">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= RUTA_RAIZ ?>/equipos/listar.php">Equipos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">