<?php 
session_start();

// la liste des styles de dicebear (l'api qu'on utilise)
$styles = [
    "adventurer", "adventurer-neutral", "avataaars", "avataaars-neutral",
    "big-ears", "big-ears-neutral", "big-smile", "bottts",
    "croodles", "croodles-neutral", "identicon", "micah",
    "miniavs", "open-peeps", "personas", "pixel-art",
    "pixel-art-neutral"
];

// shuffle = prend un style au hasard de la liste de la variable $styles
shuffle($styles);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avatars Aléatoires - EzAvatar</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/dist/css/style.css">
</head>
<body>

<?php include '../structure/header.php'; ?>

<main class="container mt-5">
    <h1>10 Avatars Aléatoires !</h1>
    <p>Voici 10 avatars générés aléatoirement avec des styles aléatoires !</p>
    <p>Notez que certaines couleurs ne peuvent pas fonctionner sur certains styles d'avatars</p>

    <div class="row row-cols-5 g-1" id="avatars-container2">
        <!-- contiens les avatars générés -->
    </div>

    <div class="text-center mt-4">
    <button id="generate-btn" class="btn btn-primary">Générer de nouveaux avatars</button>
    </div>
</main>

<?php include '../structure/footer.php'; ?>

<!-- je peut pas mettre de code php dans mon fichier javascript donc je le met ici -->
<script>
    const styles = <?php echo json_encode($styles); ?>;
</script>

<script src="../assets/dist/js/script10randomsavatargenerator.js"></script>

</body>
</html>
