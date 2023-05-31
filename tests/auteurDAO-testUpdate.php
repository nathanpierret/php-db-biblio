<?php
require_once "./src/modele/dao/AuteurDAO.php";

$auteurDAO = new AuteurDAO();

$auteur = $auteurDAO->findByID(1);
$auteur->setPrenom("Gregory");
$auteur->setNom("LEPETIT");

$auteurDAO->update($auteur);

$auteur2 = $auteurDAO->findByID(1);
echo $auteur2->getId()." ".$auteur2->getPrenom()." ".$auteur2->getNom();