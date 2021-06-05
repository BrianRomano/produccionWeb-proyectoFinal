<?php 
    include('./../helpers/conecction.php');
    include('./../logic/ProductoBusiness.php');
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="Keywords" content="Funda, Case, Celular, Smartphone ">
        <meta name="Description" content="Tienda de fundas para Smartphones">
        <meta name="Author" content="Brian Romano">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Links a CSS, Bootstrap y Favicon -->
        <link rel="icon" href="assets/images/logos/favicon/logo.png">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/bootstrap/bootstrap/css/bootstrap.min.css">
        <!-- Fuente -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <!-- Titulo -->
        <title>Cases | Fundas para celulares</title>
    </head>

    <body> 
        <header>
            <!-- Barra de navegación -->
            <nav class="navbar navbar-light">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.php">
                        <img class="logo d-none d-md-block" src="assets/images/logos/desktop/logo.png" alt="Cases" title="Cases" width="354" heigth="89">
                        <img class="logo d-md-none d-block " src="assets/images/logos/tablet-mobile/logo.png" width="101" height="89" alt="Cases">
                    </a>

                    <!-- Boton Hamburguesa -->
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><img src="assets/icons/menu-hamburguesa/inicio.png" alt="Inicio" width="512" heigth="512">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productos.php"><img src="assets/icons/menu-hamburguesa/productos.png" alt="Productos" width="512" height="512">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contacto.php"><img src="assets/icons/menu-hamburguesa/contacto.png" alt="Contacto" width="512" height="512">Contacto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>