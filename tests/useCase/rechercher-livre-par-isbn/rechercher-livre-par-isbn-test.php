<?php

require_once "./src/modele/useCase/rechercher-livre-par-isbn/RechercherLivreParISBN.php";

$rechercheParISBN = new RechercherLivreParISBN();

$recherche = $rechercheParISBN->execute(14564216);

if (isset($recherche)) {
    echo $recherche->getIsbn()." ".$recherche->getTitre()." ".$recherche->getDateParution()->format("Y-m-d")." ".$recherche->getNbPages()." "
        .$recherche->getAuteur()->getId()." ".$recherche->getAuteur()->getPrenom()." ".$recherche->getAuteur()->getNom();
} else {
    echo "Il n'y a aucun livre qui possède cet ISBN dans la base de données !";
}