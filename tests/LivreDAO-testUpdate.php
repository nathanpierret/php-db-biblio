<?php
require_once "./src/modele/dao/LivreDAO.php";
require_once "./src/modele/dao/AuteurDAO.php";

$livreDAO = new LivreDAO();
$auteurDAO = new AuteurDAO();

$auteur = $auteurDAO->findByID(2);

$livre = $livreDAO->findByISBN(14564215);
$livre->setTitre("Comment placer du placo ?");
$livre->setDateParution(DateTime::createFromFormat("Y-m-d", "2023-05-30"));
$livre->setNbPages(402);
$livre->setAuteur($auteur);

$livreDAO->update($livre);

$livre2 = $livreDAO->findByISBN(14564215);
echo $livre2->getIsbn()." ".$livre2->getTitre()." ".$livre2->getDateParution()->format("Y-m-d")." ".$livre2->getNbPages()." "
    .$livre2->getAuteur()->getId()." ".$livre2->getAuteur()->getPrenom()." ".$livre2->getAuteur()->getNom();