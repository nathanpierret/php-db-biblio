<?php
require_once "./src/modele/dao/LivreDAO.php";

$livreDAO = new LivreDAO();

$livre = $livreDAO->findByISBN(14564215);

echo $livre->getIsbn()." ".$livre->getTitre()." ".$livre->getDateParution()->format("Y-m-d")." ".$livre->getNbPages()." "
    .$livre->getAuteur()->getId()." ".$livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom();