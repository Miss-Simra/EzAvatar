<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriel - EzAvatar</title>
</head>
<body>

<?php include '../structure/header.php'; ?>

<div class="bg_tutorial"> 
<main class="container tutoriel-container mt-5">
    <h1 class="text-center">Tutoriel : Créez votre avatar facilement</h1>

    <section class="mt-4 tutoriel-section">
        <h2>1 - Choisir un style</h2>
        <p>Vous pouvez choisir parmi plusieurs styles d’avatars : Aventurier, Robot et Micah.</p>
    </section>

    <section class="mt-4 tutoriel-section">
        <h2>2 - Personnaliser les couleurs</h2>
        <p>Modifiez la couleur des cheveux, de la peau et de l’arrière-plan selon votre style.</p>
    </section>

    <section class="mt-4 tutoriel-section">
        <h2>3 - Générer et télécharger votre avatar</h2>
        <p>Cliquez sur le bouton "Générer un Avatar" pour voir le résultat et l’enregistrer.</p>
    </section>

    <div class="text-center mt-5">
        <a href="../index.php#editor" class="btn btn-primary btn-lg tutoriel-btn">Créer mon avatar maintenant !</a>
    </div>
</main>
</div>

<?php include '../structure/footer.php'; ?>



