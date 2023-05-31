<?php

require_once "./src/modele/dao/LivreDAO.php";

class RechercherLivreParISBN {

    private LivreDAO $livreDAO;

    public function __construct() {
        $this->livreDAO = new LivreDAO();
    }

    public function execute(int $isbn): ?Livre {
        return $this->livreDAO->findByISBN($isbn);
    }
}