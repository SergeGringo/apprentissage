<?php
session_start();

if (isset($_GET['noname'])) {
    unset($_SESSION['nom']);
}
$name = $_SESSION['nom'] ?? 'Invité';
$genre = $_COOKIE['genre'] ?? 'Inconnu';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Pizza — les pizzas maison</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="site-header">
        <nav class="navbar site-nav" aria-label="Navigation principale">
            <a href="index.php" class="navbar-brand">
                <span class="brand-mark" aria-hidden="true">N</span>
                <span>NINJA PIZZA</span>
            </a>
            <p class="welcome">Bienvenue <strong><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></strong>
                <span class="genre">(<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>)</span>
            </p>
            <a href="ajouteur.php" class="btn btn-primary ajout">Ajouter une pizza</a>
        </nav>
    </header>