<?php include '../structure/header.php'; ?>

<?php 
    // Initialisation/relaye la session
    session_start();

    // Définitions des fonctions utilisées plusieurs fois 
    require '../inc/inc.functions.php';

    // Lors de la soumission du formulaire
    if($_POST 
        && count($_POST) 
            && array_key_exists('login', $_POST) && array_key_exists('mdp', $_POST)
                && !empty($_POST['login']) && !empty($_POST['mdp'])){

            //~ Mauvais login
            if($_POST['login'] !== "etudiant"){
                adddMessageAlert("Le login est incorrect.");
            }else if($_POST['mdp'] !== "cvtic"){
                adddMessageAlert("Le mot de passe est incorrect.");
            }else{
                //~ Des données issues d'un formulaire de connexion sont transmises
                setConnecte($_POST['login'], $_POST['mdp']);
            }
    }
?>
            <?php lireEtSupprimeMessageSession();?>
            
            <?php if(!isConnecte()) : ?>
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
                                            <input type="password" class="form-control" placeholder="Mot de passe" name="mdp" required>
                                        </div>
                                        <button type="submit" class="form-control btn btn-primary mt-2 mb-4">Se connecter</button>
                                        <div class="form-group mb-3">
                                        <a href="" class="mt-2">Mot de passe oublié ?</a>
                                        </div>
                                        <a href="inscription.php" class="mt-2">Vous n'avez pas de compte ?</a>
                                </div>
                            </div>
                        </div>
                 </div>
            </form>

            <?php else: ?>
                <?php include 'account.php'; ?>
            <?php endif; ?> 
		</div>
	</div>

<?php include '../structure/footer.php'; ?>