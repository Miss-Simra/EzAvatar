<?php


$password = "Z6mK^N_*";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); 



?>

<?php include '../structure/header.php'; ?>

<section class="bg_account"> 

	<div class="container">
    <div class="form_login">
    <div class="d-flex justify-content-between">
    <h1 class="h1_account">Gestion des utilisateurs</h1> 
    <a href="disconnect.php" class="btn btn-danger m-2">Se déconnecter</a>
    </div>

    <div class="info_account">
        <div class="d-flex align-items-center">

        </div>
        <div class="d-flex align-items-center">

        </div>
    </div>

    </div>
    </div>

</section> 

<?php include '../structure/footer.php'; ?>