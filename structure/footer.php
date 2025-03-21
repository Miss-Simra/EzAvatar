<?php

// Définitions des fonctions utilisées plusieurs fois 
require '../inc/inc.functions.php';

?>

<footer class="footer d-flex justify-content-between align-items-center p-4">
    
    <!-- Mentions légales -->
    <div class="footer-links">
        <a href="legal_notice.php">Mentions légales</a>
        <span>|</span>
        <a href="privacy_policy.php">Politique de confidentialité</a>
        <span>|</span>
        <a href="informations.php">Informations</a>
    </div>

    <!-- Copyright -->
    <div class="website-name text-center">
        Copyright ©2025 <span class="fw-bold">EzAvatar</span>
    </div>

    <!-- Boutons à droite -->
    <div class="footer-buttons d-flex gap-3">
    <?php if(!isConnecte()) : ?>
        <a href="login.php" class="footer-btn">Compte</a>
    <?php else: ?>
        <a href="account.php" class="footer-btn">Mon compte</a>
    <?php endif; ?>
        <a href="contact.php" class="footer-btn">Contact</a>
    </div>

</footer>


