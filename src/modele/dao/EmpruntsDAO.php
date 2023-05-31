<?php
require_once "./src/modele/config/Database.php";
require_once "./src/modele/entites/Emprunts.php";
require_once "./src/modele/dao/LivreDAO.php";
require_once "./src/modele/dao/UtilisateurDAO.php";

class EmpruntsDAO {

    public function findAll(): array {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM emprunts";
        $requete = $connexion->prepare($requeteSQL);
        $requete->execute();
        $empruntsDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $emprunts = [];
        foreach ($empruntsDB as $empruntDB) {
            $emprunt = $this->toObject($empruntDB);
            $emprunts[] = $emprunt;
        }
        return $emprunts;
    }

    public function findByID(int $id): ?Emprunts {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM emprunts WHERE numero_emprunt = :num";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":num",$id);
        $requete->execute();
        $empruntDB = $requete->fetch(PDO::FETCH_ASSOC);
        if (!$empruntDB) {
            return null;
        }
        $emprunt = $this->toObject($empruntDB);
        return $emprunt;
    }

    public function create(Emprunts $emprunt): void {
        $connexion = Database::getConnection();
        $requeteSQL = "INSERT INTO emprunts (date_emprunt, isbn, id_user) VALUES (:date, :isbn, :idUser)";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":date", $emprunt->getDateEmprunt()->format("Y-m-d H:i:s"));
        $requete->bindValue(":isbn",$emprunt->getLivre()->getIsbn());
        $requete->bindValue(":idUser",$emprunt->getUser()->getId());
        $requete->execute();
    }

    public function delete(int $id): void {
        $connexion = Database::getConnection();
        $requeteSQL = "DELETE FROM emprunts WHERE numero_emprunt = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id",$id);
        $requete->execute();
    }

    public function update(Emprunts $emprunt): void {
        $connexion = Database::getConnection();
        $requeteSQL = "UPDATE emprunts SET date_emprunt = :date, isbn = :isbn, id_user = :idUser WHERE numero_emprunt = :num";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":date",$emprunt->getDateEmprunt()->format("Y-m-d H:i:s"));
        $requete->bindValue(":nom",$emprunt->getLivre()->getIsbn());
        $requete->bindValue(":id",$emprunt->getUser()->getId());
        $requete->execute();
    }

    private function toObject(array $empruntDB): Emprunts
    {
        $emprunt = new Emprunts();
        $livre = new LivreDAO();
        $user = new UtilisateurDAO();
        $emprunt->setDateEmprunt(DateTime::createFromFormat("Y-m-d", $empruntDB["date_emprunt"]));
        $emprunt->setLivre($livre->findByISBN($empruntDB["isbn"]));
        $emprunt->setUser($user->findByID($empruntDB["id_user"]));
        return $emprunt;
    }
}