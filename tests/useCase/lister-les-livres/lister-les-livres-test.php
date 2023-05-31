<?php

require_once "./src/modele/useCase/lister-livres/ListerLivres.php";

$listesLivres = new ListerLivres();

$liste = $listesLivres->execute();

foreach ($liste as $livre) {
    echo $livre->getIsbn()." ".$livre->getTitre()." ".$livre->getDateParution()->format("Y-m-d")." ".$livre->getNbPages().
        " ".$livre->getAuteur()->getId()." ".$livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom();
    echo PHP_EOL;
}