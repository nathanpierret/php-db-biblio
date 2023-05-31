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
    <title>Recherche d'une bûche recyclée par son numéro bizarre</title>
</head>
<body>

<h1>Recherche d'une bûche recyclée par son numéro bizarre</h1>

<ul>
    <li><a href="index.php">Liste de vieux bouquins pas intéressants</a></li>
    <li><a href="rechercheNom.php">Recherche d'un torchon par le nom du gars qui l'a écrit</a></li>
</ul>

<form method="post">
    <label for="recherche-isbn">Donne le numéro bizarre pour trouver la bûche</label>
    <input type="text" name="recherche-isbn" id="recherche-isbn">
    <input type="submit" name="recherche-par-isbn" value="Trouver la bûche">
</form>

</body>
</html>