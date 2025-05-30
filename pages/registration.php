
<?php 

    // Fichier connexion à la BDD 
    require_once '../inc/inc.connexion.php';

    // Lors de la soumission du formulaire 

    if (isset($_POST['submit'])) {
        $messages = [];
    
        // Vérification des champs (vides ou non)

        if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password'])) {

            // Récupère ces champs via le formulaire 
            // TRIM : supression des espaces inutiles 
            // HTMLSPECIALCHARS : connvertit certains caractères prédéfinis en entités HTML

            $nom = htmlspecialchars(trim($_POST['nom']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = $_POST['password'];   
    
            // Vérification de la taille du nom (30 caractères max)
            if (strlen($nom) > 30) {
                $messages[] = "La taille du nom ne doit pas dépasser 30 caractères.";
            }
    
            // Vérification du format du nom
            if (!preg_match("/^[A-Z][a-z]+([ '-][A-Z][a-z]+)*$/", $nom)) {
                $messages[] = "Format du nom non valide. Requis : 1 majuscule suivie de lettres minuscules (ex : Dupont, Van Der, Weber-Bauer)<br>";
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
    
            // SI aucune erreur n'est détectée -> on vérifie l'email en BDD
            if (empty($messages)) {
    
                // Vérifie si l'email est déjà utilisé
                $testmail = $pdo->prepare("SELECT 1 FROM users WHERE email = ?");
                $testmail->execute([$email]);
                
                if ($testmail->rowCount() > 0) {
                    $messages[] = "Cette adresse mail est déjà utilisée.";
                } else {

                    // Hachage du mot de passe 
                    $password_hache = password_hash($password, PASSWORD_DEFAULT);

    
                    // Insertion des données dans la BDD
                    $insertion = $pdo->prepare("INSERT INTO users(nom, email, mot_de_passe) VALUES (?,?,?)");
                    $insertion->execute([$nom, $email, $password_hache]);
    
                    $messages[] = "<div class='text-success text-center'>Votre compte a bien été créé.</div>";

                    // Ajoute un délai de 2 sec avant de rediriger vers la page connexion
                    echo "<meta http-equiv='refresh' content='2;url=login.php'>";
                }
                } 
            } else {
            $messages[] = "Veuillez remplir tous les champs.";
        }
    }
       
    ?>

<?php include '../structure/header.php'; ?>

    
    <section class="bg_inscription">
        <form method="POST">
            <div class="container">
                <div class="row justify-content-center m-5">
                    <div class="col-md-5"> 
                        <div class="form_login">
                            <h2 class="text-center mb-4">Créer un compte</h2>
                            <div class="form-group mb-3">
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="form-control btn btn-primary mt-2">S'inscrire</button>

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