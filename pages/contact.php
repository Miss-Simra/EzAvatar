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
                            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="form-control btn btn-primary mt-2">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>

<?php include '../structure/footer.php'; ?>