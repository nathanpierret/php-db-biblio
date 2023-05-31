<?php

require_once "./src/modele/dao/LivreDAO.php";

class ListerLivres {

    private LivreDAO $livreDAO;

    //Méthode qui permet d'exécuter la fonctionnalité
    public function __construct() {
        $this->livreDAO = new LivreDAO();
    }

    public function execute(): array {
        return $this->livreDAO->findAll();
    }
}