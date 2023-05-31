<?php
require_once "./src/modele/useCase/lister-livres/ListerLivres.php";
require_once "./src/modele/useCase/rechercher-livre-par-isbn/RechercherLivreParISBN.php";
require_once "./src/modele/useCase/rechercher-livres-d1-auteur/RechercherLivresD1Auteur.php";
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recherche d'un torchon par le nom du gars qui l'a écrit</title>
</head>
<body>

<h1>Recherche d'un torchon par le nom du gars qui l'a écrit</h1>

<ul>
    <li><a href="index.php">Liste de vieux bouquins pas intéressants</a></li>
    <li><a href="rechercheISBN.php">Recherche d'une bûche recyclée par son numéro bizarre</a></li>
</ul>

<form method="post">
    <label for="recherche-nom">Donne le nom du gars qui a écrit le torchon que tu veux</label>
    <input type="text" name="recherche-nom" id="recherche-nom">
    <input type="submit" name="recherche-par-auteur" value="Recherche du torchon">
</form>

</body>
</html>
