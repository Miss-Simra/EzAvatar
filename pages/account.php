<?php include '../structure/header.php'; ?>

<?php 
    // Initialisation/relaye la session
    session_start();

    // Définitions des fonctions utilisées plusieurs fois 
    require '../inc/inc.functions.php';

?>
	
    
    <a href="disconnect.php" class="btn btn-danger m-2">Se déconnecter</a>


<?php include '../structure/footer.php'; ?>