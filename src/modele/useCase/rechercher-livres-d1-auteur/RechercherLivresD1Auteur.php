<?php

require_once "./src/modele/dao/LivreDAO.php";

class RechercherLivresD1Auteur {

    private LivreDAO $livreDAO;

    public function __construct() {
        $this->livreDAO = new LivreDAO();
    }

    public function execute(string $nomAuteur): array {
        return $this->livreDAO->findByAuthorName($nomAuteur);
    }
}