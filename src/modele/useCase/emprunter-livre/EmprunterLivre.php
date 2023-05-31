<?php
require_once "./src/modele/dao/LivreDAO.php";

class EmprunterLivre {
    private LivreDAO $livreDAO;

    public function __construct()
    {

    }

    public function execute(string $isbn, int $userID): bool {
        //Vérifier si le livre existe
        $livre = $this->livreDAO->findByISBN($isbn);
        if ($livre == null) {
            return false;
        }
        //Vérifier si l'utilisateur existe

        //Créer l'emprunt
    }
}