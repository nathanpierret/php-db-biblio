<?php
require_once "./src/modele/dao/LivreDAO.php";
require_once "./src/modele/dao/AuteurDAO.php";

$auteurDAO = new AuteurDAO();
$livreDAO = new LivreDAO();

$auteur = $auteurDAO->findByID(2);

$livre = new Livre();
$livre->setIsbn(56465134);
$livre->setTitre("Comment créer un alibi ?");
$livre->setDateParution(DateTime::createFromFormat("Y-m-d", "2023-04-15"));
$livre->setNbPages(164);
$livre->setAuteur($auteur);

$livreDAO->create($livre);

$livre2 = $livreDAO->findByISBN(56465134);
echo $livre->getIsbn()." ".$livre->getTitre()." ".$livre->getDateParution()->format("Y-m-d")." ".$livre->getNbPages()." "
    .$livre->getAuteur()->getId()." ".$livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom();