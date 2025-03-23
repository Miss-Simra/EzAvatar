<?php 
    // Initialisation/relaye la session
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    // Fichier connexion à la BDD 
    require_once '../inc/inc.connexion.php';

    // Stocke l'ID de l'user dans la session
    $user_id = $_SESSION['user_id'];

    if (isset($_SESSION['user_email'])) {
        $userEmail = $_SESSION['user_email'];
    } else {
        echo "L'email n'est pas disponible dans la session.";
    }

    // Récupère le nom et l'email dans la BDD
    $sql = "SELECT nom, email FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch();
?>

<?php include '../structure/header.php'; ?>

<section class="bg_account"> 

	<div class="container">
    <div class="form_login">
    <div class="d-flex justify-content-between">
    <h1 class="h1_account">Vos informations personnelles</h1> 
    <a href="disconnect.php" class="btn btn-danger m-2">Se déconnecter</a>
    </div>

    <div class="info_account">
        <div class="d-flex align-items-center">
            <p>Nom : <?php echo htmlspecialchars($user['nom']) ?></p>
        </div>
        <div class="d-flex align-items-center">
            <p>Email : <?php echo htmlspecialchars($user['email']) ?></p>
        </div>
        
        <a href="reset_password.php">Modifier le mot de passe</a>
    </div>

    <h1 class="h1_account">Vos avatars</h1>



    </div>
    </div>

</section> 

<?php include '../structure/footer.php'; ?>