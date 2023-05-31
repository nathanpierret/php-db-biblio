<?php

require_once "./src/modele/useCase/rechercher-livres-d1-auteur/RechercherLivresD1Auteur.php";

$rechercheAuteur = new RechercherLivresD1Auteur();

$recherche = $rechercheAuteur->execute("Racine");

foreach ($recherche as $livre) {
        echo $livre->getIsbn()." ".$livre->getTitre()." ".$livre->getDateParution()->format("Y-m-d")." ".$livre->getNbPages()." "
            .$livre->getAuteur()->getId()." ".$livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom().PHP_EOL;
}