<?php
require_once "./src/modele/dao/LivreDAO.php";

$livreDAO = new LivreDAO();

$livres = $livreDAO->findAll();

foreach ($livres as $livre) {
    echo $livre->getIsbn()." ".$livre->getTitre()." ".$livre->getDateParution()->format("Y-m-d")." ".$livre->getNbPages().
        " ".$livre->getAuteur()->getId()." ".$livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom();
    echo PHP_EOL;
}