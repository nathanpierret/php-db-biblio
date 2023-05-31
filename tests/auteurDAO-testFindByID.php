<?php
require_once "./src/modele/dao/AuteurDAO.php";

$auteurDAO = new AuteurDAO();

$auteur = $auteurDAO->findByID(2);
echo $auteur->getId()." ".$auteur->getPrenom()." ".$auteur->getNom();