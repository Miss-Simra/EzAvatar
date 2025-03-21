
<?php 

session_start();

// Fichier connexion à la BDD 
require '../inc/inc.connexion.php';

// Lors de la soumission du formulaire 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $messages = [];
        
    // Vérification des champs (vides ou non)
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
    
        // Requête pour récupérer l'utilisateur par son email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
    
        // Vérifie si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: account.php');
            exit;
        } else {
            $messages[] = "Identifiants incorrects";
        }
    } else {
        $messages[] = "Veuillez remplir tous les champs.";
    }
}    
?>

<?php include '../structure/header.php'; ?>

         
<section class="bg_login"> 

    <form method="POST">
        <div class="container">
            <div class="row justify-content-center m-5">
                <div class="col-md-5"> 
                    <div class="form_login">
                        <h2 class="text-center mb-4">Connexion</h2>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="form-control btn btn-primary mt-2 mb-4">Se connecter</button>

                            <!-- SI les messages ne sont pas vides, parcourt les messages et affiche les -->

                            <?php if (!empty($messages)) : ?>
                                <div class="text-danger text-center">
                                    <?php foreach ($messages as $message) {
                                        echo $message;
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
    

                            <div class="form-group mt-4 mb-3">
                            <a href="reset_password.php" class="mt-2">Mot de passe oublié ?</a>
                            </div>
                            <a href="registration.php" class="mt-2">Vous n'avez pas de compte ?</a>
                            </div>

                  
                    </div>
                </div>
            </div>   
	    </div>
	</form>

</section>

<?php include '../structure/footer.php'; ?>