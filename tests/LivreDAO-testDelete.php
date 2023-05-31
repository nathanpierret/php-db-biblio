<?php
require_once "./src/modele/dao/LivreDAO.php";

$livreDAO = new LivreDAO();

$livreDAO->delete(56465134);

$livre = $livreDAO->findByISBN(56465134);

if (!isset($livre)) {
    echo "Il n'y a plus de livre ayant l'isbn 56465134 dans la BDD !";
}