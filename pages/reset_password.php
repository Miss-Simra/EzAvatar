<?php
    // Initialisation/relaye la session
    session_start();

    $isUserConnected = isset($_SESSION['user_id']); // Vérifie si l'utilisateur est connecté
    $userEmail = $isUserConnected ? isset($_SESSION['user_email']) : ''; // SI la variable est TRUE alors stocke le mail de la session SINON elle est vide 

    // Définitions des fonctions utilisées plusieurs fois 
    require_once '../inc/inc.functions.php';

    // Fichier connexion à la BDD 
    require_once '../inc/inc.connexion.php';

    // Lors de la soumission du formulaire 
    if (isset($_POST['submit'])) {
        $messages = [];
    
            // SI la variable est TRUE alors stocke le mail de la session SINON récupère le mail via le formulaire 
            // TRIM : supression des espaces inutiles 
            // HTMLSPECIALCHARS : connvertit certains caractères prédéfinis en entités HTML

            $email = $isUserConnected ? $userEmail : htmlspecialchars(trim($_POST['email']));
            $password = $_POST['password']; // Récupère le mdp via le formulaire
            
            // Vérifie si le champ email est vide
            if (empty($email) && !$isUserConnected) {
                $messages[] = "Veuillez remplir le champ email.";
            }

            // Vérifie si le champ mdp est vide
            if (empty($password)) {
                $messages[] = "Veuillez remplir le champ mot de passe.";
            }

    
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

            // Vérification de la taille de l'email
            if (strlen($email) > 100) {
                $messages[] = "La taille de l'email ne doit pas dépasser 100 caractères.";
            }
    
            // Vérification du format de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $messages[] = "Format d'email non valide. Requis : 
                <ul>
                <li>1 nom local</li>
                <li>1 signe (@)</li>
                <li>1 nom de domaine</li>
                <li>1 extension (.com, .fr, .net)</li>
                <li>(exemple : bonjour@gmail.com)</li>
                </ul>";
            }

            // SI aucune erreur n'est détectée 
            if (empty($messages)) {

                // Vérifie si l'email n'existe pas
                $testmail = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $testmail->execute([$email]);
                $user = $testmail->fetch();
    
                if (!$user) {
                    $messages[] = "Cette adresse mail n'existe pas.";

                } else {

                // Hachage du mot de passe 
                $password_hache = password_hash($password, PASSWORD_DEFAULT);

                // MAJ mot de passe dans la BDD
                $maj = $pdo->prepare("UPDATE users SET mot_de_passe = ? WHERE email = ?");
                $maj->execute([$password_hache, $email]);

                $messages[] = "<div class='text-success text-center'>Mot de passe sauvegardé !</div>"; 
                }
            } 
    }

?>

<?php include '../structure/header.php'; ?>

<section class="bg_password"> 
    <form method="POST">
        <div class="container">
            <div class="row justify-content-center m-5">
                <div class="col-md-5"> 
                    <div class="form_login">
                        <h2 class="text-center mb-4">Modifier votre mot de passe</h2>

                        <?php if(!isConnecte()) : ?>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                        <?php else: ?>
                            <div class="form-group mb-3 d-none">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        <?php endif; ?>

                            <div class="form-group mb-3">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                            </div>
                            <button type="submit"  class="form-control btn btn-primary mt-2 mb-4" name="submit">Sauvegarder</button>

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