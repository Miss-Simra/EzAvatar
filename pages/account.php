<?php 
    // Initialisation/relaye la session
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

?>

<?php include '../structure/header.php'; ?>

	<div class="container">

    <div class="d-flex-column justify-content-center align-items-center">
    <h1>Vos informations personnelles</h1>
    
    
    <a href="disconnect.php" class="btn btn-danger m-2">Se déconnecter</a>
    </div>
    </div>


<?php include '../structure/footer.php'; ?>