<?php
require_once "./src/modele/dao/AuteurDAO.php";

$auteurDAO = new AuteurDAO();

$auteur = new Auteur();
$auteur->setId(3);
$auteur->setPrenom("Alexis");
$auteur->setNom("Bassignot");
$auteurDAO->create($auteur);

$auteur2 = $auteurDAO->findByID(3);
echo $auteur2->getId()." ".$auteur2->getPrenom()." ".$auteur2->getNom();