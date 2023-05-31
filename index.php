<?php
    require_once "./src/modele/useCase/lister-livres/ListerLivres.php";
    require_once "./src/modele/useCase/rechercher-livre-par-isbn/RechercherLivreParISBN.php";
    require_once "./src/modele/useCase/rechercher-livres-d1-auteur/RechercherLivresD1Auteur.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["liste-livres"])) {
            $listeLivres = new ListerLivres();
            $liste = $listeLivres->execute();
        }
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Site banal de recherche de bouquins ou quelque chose comme ça</title>
</head>
<body>

<h1>Site banal de recherche de bouquins ou quelque chose comme ça</h1>

<ul>
    <li><a href="rechercheISBN.php">Recherche d'une bûche recyclée par son numéro bizarre</a></li>
    <li><a href="rechercheNom.php">Recherche d'un torchon par le nom du gars qui l'a écrit</a></li>
</ul>

<form method="post">
    <input type="submit" name="liste-livres" value="Liste des vieux bouquins pas intéressants">
</form>
</body>
</html>