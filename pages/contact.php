<?php

session_start();

// Fichier connexion à la BDD 
require '../inc/inc.connexion.php';

// Lors de la soumission du formulaire 

 if (isset($_POST['submit'])) {
    $messages = [];

    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['note'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $note = htmlspecialchars($_POST['note']);   

        // Vérification de la taille du nom (30 caractères max)
        if (strlen($nom) > 30) {
            $messages[] = "La taille du nom ne doit pas dépasser 30 caractères.";
        }

        // Vérification du format du nom
        if (!preg_match("/^[A-Z][a-z]+([ '-][A-Z][a-z]+)*$/", $nom)) {
            $messages[] = "Format du nom non valide. Requis : 1 majuscule suivie de lettres minuscules (ex : Dupont, Van Der, Weber-Bauer)<br>";
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
	
		// Vérification de la taille du message (255 caractères max)
		if(strlen($note) > 255){
            $messages[] = "La taille du message ne doit pas dépasser les 255 caractères.<br>";
		}

        // SI aucune erreur n'est détectée 
        if (empty($messages)) {
            
            // Insertion des données dans la BDD
            $insertion = $pdo->prepare("INSERT INTO messages(nom, email, message) VALUES (?,?,?)");
            $insertion->execute([$nom, $email, $note]);

            $messages[] = "<div class='text-success text-center'>Votre message a été envoyé !</div>";

        }

    } else {
        $messages[] = "Veuillez remplir tous les champs.";
    }
 }

?>

<?php include '../structure/header.php'; ?>

<section class="bg_contact"> 

    <form method="POST">
        <div class="container">
            <div class="row justify-content-center m-5">
                <div class="col-md-5"> 
                    <div class="form_login">
                        <h2 class="text-center mb-4">Contact</h2>
                            <div class="form-group mb-3">
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                            <textarea id="note" name="note" rows="4" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="form-control btn btn-primary mt-2">Envoyer</button>

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