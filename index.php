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
    <link rel="stylesheet" href="assets/dist/js/bootstrap.js" />
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  </head>
  <body>
    <header id="haut">
        <div class="logo">
            <img src="assets/img/logo.png" alt="LogoEZavatar">
            <span>EzAvatar</span>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="pages/tutoriel.php">Tutoriel</a>
            <a href="#">À propos</a>
            <a href="pages/contact.php">Contact</a>
            <?php if(!isConnecte()) : ?>
            <a href="pages/connexion.php" class="btn-compte">Compte</a>
            <?php else: ?>
                <a href="pages/account.php" class="btn-compte">Mon compte</a>
            <?php endif; ?> 
        </nav>
    </header>

    <main>
        <section class="left-section">
            <div class="title">
                <h1>
                    Créer votre avatar<br>
                    <span class="blue-text">personnalisé avec</span><br>
                    <span class="highlight">EzAvatar</span>
                </h1>
            </div>

            <div class="about">
                <img src="assets/img/remplacercetteimageparlabonne.png" class="imagegauche" alt="LogoEZavatar">
                <h2>À propos</h2>
                <p>Altera sententia est, quasi definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum.</p>
                <p>Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in terram defluat, aut ne plus aequo quid in amicitiam congeratur.</p>
                <button class="btn-discover">Tout découvrir</button>
            </div>

            <div class="editor">
                <h2>Éditeur</h2>
                <div class="editor-buttons">
                    <button class="editor-btn">Fond</button>
                    <button class="editor-btn active">Visage</button>
                    <button class="editor-btn">Yeux</button>
                    <button class="editor-btn">Nez</button>
                    <button class="editor-btn">Bouche</button>
                    <button class="editor-btn">Cheveux</button>
                </div>
            </div>
            <section class="right-section">
            <div class="preview-area"></div>
            <div class="colors-grid">
                <div class="color-item"></div>
                <div class="color-item"></div>
                <div class="color-item"></div>
                <div class="color-item"></div>
                <div class="color-item"></div>
                <div class="color-item"></div>
                <div class="color-item"></div>
                <div class="color-item"></div>
                <div class="color-item active"></div>
            </div>
            <div class="preview-navigation">
                <button class="nav-arrow">←</button>
                <span>1/2</span>
                <button class="nav-arrow">→</button>
            </div>
        </section>
        </section>


    </main>

    <footer>
        <div class="footer-links">
            <a href="#">Mentions légales</a>
            <span>|</span>
            <a href="#">Politique de confidentialité</a>
            <span>|</span>
            <a href="#">Informations</a>
        </div>
        <div class="website-name">Copyright ©2025 <span>EzAvatar</span></div>
        <div class="footer-buttons">
        <a href="#haut" class="footer-btn">
    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 384 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
        <path fill="#FFFFFF" d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg></a>
            <a href ="pages/connexion.php" class="footer-btn">Compte</a>
            <a href="pages/contact.php" class="footer-btn">Contact</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2"></script>
  </body>
</html>
