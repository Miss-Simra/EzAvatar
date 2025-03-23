<?php 
    // Initialisation/relaye la session
    session_start();

    // Définitions des fonctions utilisées plusieurs fois 
    require 'inc/inc.functions.php';

?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EzAvatar</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/dist/css/style.css" />
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  </head>
  
  <body>
  <header class="container-fluid py-2 fixed-top bg-white shadow-sm">
    <div class="row align-items-center">
        <!-- Logo à gauche -->
        <div class="col-auto d-flex align-items-center">
            <img src="assets/img/logo.png" alt="LogoEZavatar" class="logo-img me-2">
            <span class="logo-text">EzAvatar</span>
        </div>

        <!-- Menu à droite -->
        <div class="col text-end me-3">
            <nav class="d-inline">
                <a href="index.php" class="nav-link d-inline-block">Home</a>
                <a href="pages/tutorial.php" class="nav-link d-inline-block">Tutoriel</a>
                <a href="pages/randomavatar.php" class="nav-link d-inline-block">Avatars et styles aléatoire</a>
                <a href="#a_propos" class="nav-link d-inline-block">À propos</a>
                <a href="pages/contact.php" class="nav-link d-inline-block">Contact</a>
                <?php if(!isConnecte()) : ?>
                    <a href="pages/login.php" class="btn btn-primary ms-2">Compte</a>
                <?php else: ?>
                    <a href="pages/account.php" class="btn btn-primary ms-2">Mon compte</a>
                <?php endif; ?>
                <!-- <a href="pages/admin.php" class="nav-link d-inline-block">Admin</a> -->
            </nav>
        </div>
    </div>
</header>



    <main>

<!-- Section 1 : Image + Titre -->
<section class="left-section container-fluid">
    <div class="row g-0 align-items-center">
        <!-- Image à gauche, grande et collée au bord -->
        <div class="col-12 col-md-6">
            <img src="assets/img/image1.png" alt="Logo EZavatar" class="fullscreen-img">
        </div>
        <!-- Titre à droite, justifié à gauche -->
        <div class="col-12 col-md-6 text-start px-5">
            <h1>
                <span class="avatar-text"> CRÉER VOTRE AVATAR</span>
                <span class="blue-text"> PERSONNALISÉ AVEC</span>
                <span class="highlight">EZAVATAR</span>
            </h1>
        </div>
    </div>
</section>


<!-- Section 2 : À Propos -->
<section class="degrade" id="a_propos"> 
    <section class="propos d-flex align-items-center justify-content-center min-vh-100">
        <div class="about text-start">
            <h2 class="display-3 fw-bold">À propos</h2>
            <p class="fs-5">Ez Avatar, c'est la plateforme où créer un avatar unique devient facile et rapide. Que ce soit pour les jeux, 
      les réseaux sociaux ou juste pour le fun, personnalisez votre image virtuelle
       en quelques clics. Pas de prise de tête, juste un résultat à la hauteur de vos attentes. Créez, modifiez, et adoptez l'avatar qui vous ressemble !</p>
            <button class="btn btn-prime btn-lg btn-discover d-inline-block">Tout découvrir</button>
        </div>
    </section>






    <!-- Section 3 : Éditeur -->

    <section class="right-section d-flex justify-content-center align-items-center min-vh-100">
    <div class="editor-container card shadow-lg p-5 text-center">
        <h2 class="mb-4 text-uppercase fw-bold gradient-text">Éditeur d'Avatar</h2>
        
        <!-- Avatar Display -->
        <div id="avatar-container" class="avatar-display mx-auto mb-4">
            <div id="avatar"></div>
        </div>



        <!-- Sélection du style -->
        <label for="style-select" class="form-label fs-5">Choisir un style :</label>
        <select id="style-select" class="form-select form-control-lg stylish-select">
            <option value="adventurer">Aventurier</option>
            <option value="bottts">Robot</option>
            <option value="avataaars">Avatars</option>
            <option value="micah">Micah</option>
        </select>
        
        <!-- sélection des options -->
        <div class="custom-option" data-option="hairColor">
            <label for="hair-color-select" class="form-label fs-5">Couleur des cheveux :</label>
            <input type="color" id="hair-color-select" class="form-control form-control-color" value="#000000">
        </div>

        <div class="custom-option" data-option="skinColor">
            <label for="skin-color-select" class="form-label fs-5">Couleur de peau :</label>
            <input type="color" id="skin-color-select" class="form-control form-control-color" value="#ffcc99">
        </div>

        <div class="custom-option">
            <label for="background-color-select" class="form-label fs-5">Couleur du fond :</label>
            <input type="color" id="background-color-select" class="form-control form-control-color" value="#ffffff">
        </div>

        <!-- bouton Générer -->
        <div class="mt-4">
            <button onclick="generateAvatar()" class="btn btn-custom btn-lg" id="generate-btn">Générer un Avatar </button>
        </div>

    </div>
</section>
</section>

    </main>

    <footer class="footer d-flex justify-content-between align-items-center p-4">
    
    <!-- Mentions légales -->
    <div class="footer-links">
        <a href="pages/legal_notice.php">Mentions légales</a>
        <span>|</span>
        <a href="pages/privacy_policy.php">Politique de confidentialité</a>
        <span>|</span>
        <a href="pages/informations.php">Informations</a>
    </div>

    <!-- Copyright -->
    <div class="website-name text-center">
        Copyright ©2025 <span class="fw-bold">EzAvatar</span>
    </div>

    <!-- Boutons à droite -->
    <div class="footer-buttons d-flex gap-3">
    <?php if(!isConnecte()) : ?>
        <a href="pages/login.php" class="footer-btn">Compte</a>
    <?php else: ?>
        <a href="pages/account.php" class="footer-btn">Mon compte</a>
    <?php endif; ?>
        <a href="pages/contact.php" class="footer-btn">Contact</a>
    </div>

</footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2"></script>
    <script src="assets/dist/js/script.js"></script>
    <script src="assets/dist/js/bootstrap.js"></script>
  </body>
</html>
