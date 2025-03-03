<?php include '../structure/header.php'; ?>

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
                                <input type="password" class="form-control" placeholder="Mot de passe" name="mdp" required>
                            </div>
                            <button type="submit" class="form-control btn btn-primary mt-2">S'inscrire</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<?php include '../structure/footer.php'; ?>