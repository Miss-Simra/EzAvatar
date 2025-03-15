<?php include '../structure/header.php'; ?>

<?php

    // Fichier connexion à la BDD 
    require '../inc/inc.connexion.php';

    // Lors de la soumission du formulaire 
    if (isset($_POST['submit'])) {
        $messages = [];
    
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];   
    
            // Vérification de la taille du mot de passe
            if (strlen($password) > 20) {
                $messages[] = "La taille du mot de passe ne doit pas dépasser 20 caractères.";
            }
    
            // Vérification du format du mot de passe
            if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password)) {
                $messages[] = "<br>Mot de passe invalide. Il doit contenir : <ul>
                                <li>Au moins 8 caractères</li>
                                <li>Au moins 1 majuscule</li>
                                <li>Au moins 1 minuscule</li>
                                <li>Au moins 1 chiffre</li>
                                <li>Au moins 1 caractère spécial (#?!@$%^&*-)</li>
                              </ul>";
            }

            // SI aucune erreur n'est détectée 
            if (empty($messages)) {
    
                } else {

                    // Hachage du mot de passe 
                    $password_hache = password_hash($password, PASSWORD_DEFAULT);

                    // Insertion des données dans la BDD
                    $insertion = $pdo->prepare("INSERT INTO users(mot_de_passe) VALUES (?)");
                    $insertion->execute([$password_hache]);
    
                    $messages[] = "<div class='text-success text-center'>Mot de passe sauvegardé !</div>";

                }
            }
        } else {
            $messages[] = "Veuillez remplir le champ.";
        }

?>

<section class="bg_password"> 
    <form method="POST">
        <div class="container">
            <div class="row justify-content-center m-5">
                <div class="col-md-5"> 
                    <div class="form_login">
                        <h2 class="text-center mb-4">Modifier votre mot de passe</h2>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="mdp" required>
                            </div>
                            <button type="submit" class="form-control btn btn-primary mt-2 mb-4">Sauvegarder</button>
                            </div>

                            <!-- SI les messages ne sont pas vides, parcourt les messages et affiche les -->

                            <?php if (!empty($messages)) : ?>
                                <div class="text-danger text-center">
                                    <?php foreach ($messages as $message) {
                                        echo $message;
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                        </div>
                 </div>
            </div>  
		</div>
	</form> 
</section>

<?php include '../structure/footer.php'; ?>