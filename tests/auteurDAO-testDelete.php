<?php
require_once "./src/modele/dao/AuteurDAO.php";

$auteurDAO = new AuteurDAO();

$auteurDAO->delete(3);

$auteur = $auteurDAO->findByID(3);

if (!isset($auteur)) {
    echo "Il n'y a plus d'auteur ayant l'id 3 dans la BDD !";
}