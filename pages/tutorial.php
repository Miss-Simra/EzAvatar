<?php

session_start();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriel - EzAvatar</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/dist/css/style.css">
</head>
<body>
<main class="container mt-5">
    <h1 class="text-center">📖 Tutoriel : Créez votre avatar facilement !</h1>

    <section class="mt-4">
        <h2>1 - Choisir un style</h2>
        <p>Vous pouvez choisir parmi plusieurs styles d’avatars : Aventurier, Robot et Micah.</p>
    </section>

    <section class="mt-4">
        <h2>2 - Personnaliser les couleurs</h2>
        <p>Modifiez la couleur des cheveux, de la peau et de l’arrière-plan selon votre style.</p>
    </section>

    <section class="mt-4">
        <h2>3 - Générer et télécharger votre avatar</h2>
        <p>Cliquez sur le bouton "Générer un Avatar" pour voir le résultat et l’enregistrer.</p>
    </section>

    <div class="text-center mt-5">
        <a href="../index.php#editor" class="btn btn-primary btn-lg">Créer mon avatar maintenant !</a>
    </div>
</main>

</body>
</html>


<?php include '../structure/header.php'; ?>


<?php include '../structure/footer.php'; ?>