<?php
require_once "./src/modele/dao/LivreDAO.php";
require_once "./src/modele/dao/UtilisateurDAO.php";
require_once "./src/modele/dao/EmpruntsDAO.php";
require_once "./src/modele/useCase/emprunter-livre/EmprunterLivreReponse.php";
require_once "./src/modele/useCase/emprunter-livre/EmprunterLivreStatus.php";
require_once "./src/modele/useCase/emprunter-livre/EmprunterLivreRequest.php";

class EmprunterLivre {
    private LivreDAO $livreDAO;
    private UtilisateurDAO $userDAO;
    private EmpruntsDAO $empruntsDAO;

    public function __construct() {
        $this->livreDAO = new LivreDAO();
        $this->userDAO = new UtilisateurDAO();
        $this->empruntsDAO = new EmpruntsDAO();
    }

    public function execute(EmprunterLivreRequest $requete): EmprunterLivreReponse {
        //Vérifier si le livre existe
        $livre = $this->livreDAO->findByISBN($requete->isbn);
        if ($livre == null) {
            return new EmprunterLivreReponse(EmprunterLivreStatus::LIVRE_INEXISTANT,"Le livre n'existe pas !");
        }
        //Vérifier si l'utilisateur existe
        $user = $this->userDAO->findByID($requete->idUser);
        if ($user == null) {
            return new EmprunterLivreReponse(EmprunterLivreStatus::USER_INEXISTANT,"L'utilisateur n'existe pas !");
        }
        //Créer l'emprunt
        $emprunt = new Emprunts();
        $emprunt->setLivre($livre);
        $emprunt->setUser($user);
        $emprunt->setDateEmprunt(new DateTime());
        $this->empruntsDAO->create($emprunt);
        return new EmprunterLivreReponse(EmprunterLivreStatus::OK, "L'emprunt a bien été effectué !");
    }
}