<?php

// Définitions des fonctions utilisées plusieurs fois 
require_once '../inc/inc.functions.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EzAvatar</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/dist/css/style.css" />
    <link rel="stylesheet" href="../assets/dist/js/bootstrap.js" />
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        /* BG de la page reset_password */
        .bg_password {
            background: linear-gradient(135deg, #4c79fb, #4de1fc);
            padding-bottom: <?= $isUserConnected ? '240px' : '215px' ?>;
            padding-top: <?= $isUserConnected ? '240px' : '215px' ?>;
            position: relative;
            z-index: 0;
        }
    </style>
  </head>


  <header class="container-fluid py-2 fixed-top bg-white shadow-sm">
    <div class="row align-items-center">
        <!-- Logo à gauche -->
        <div class="col-auto d-flex align-items-center">
            <img src="../assets/img/logo.png" alt="LogoEZavatar" class="logo-img me-2">
            <span class="logo-text">EzAvatar</span>
        </div>

        <!-- Bouton hamburger visible en mobile -->
        <div class="col text-end d-lg-none">
            <button id="menuToggle" class="btn btn-primary">☰</button>
        </div>

        <!-- Menu principal (desktop) -->
        <div class="col-lg text-end me-3 d-none d-lg-block">
            <nav>
                <a href="../index.php" class="nav-link d-inline-block">Home</a>
                <a href="tutorial.php" class="nav-link d-inline-block">Tutoriel</a>
                <a href="randomavatar.php" class="nav-link d-inline-block">Avatars et styles aléatoire</a>
                <a href="../index.php#a_propos" class="nav-link d-inline-block">À propos</a>
                <a href="contact.php" class="nav-link d-inline-block">Contact</a>
                <?php if(!isConnecte()) : ?>
                    <a href="login.php" class="btn btn-primary ms-2">Compte</a>
                <?php else: ?>
                    <a href="account.php" class="btn btn-primary ms-2">Mon compte</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>

<!-- Menu mobile en plein écran -->
<div id="mobileMenu" class="menu-overlay">
    <div class="menu-content">
        <button id="closeMenu" class="close-btn">✖</button>
        <a href="../index.php">Home</a>
        <a href="tutorial.php">Tutoriel</a>
        <a href="randomavatar.php">Avatars et styles aléatoire</a>
        <a href="../index.php#a_propos">À propos</a>
        <a href="contact.php">Contact</a>
        <?php if(!isConnecte()) : ?>
            <a href="login.php" class="btn btn-primary ms-2">Compte</a>
        <?php else: ?>
            <a href="account.php" class="btn btn-primary ms-2">Mon compte</a>
        <?php endif; ?>
    </div>
</div>


<script src="../assets/dist/js/script.js" defer></script>

