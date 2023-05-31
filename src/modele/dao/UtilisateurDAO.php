<?php
require_once "./src/modele/config/Database.php";
require_once "./src/modele/entites/Utilisateur.php";

class UtilisateurDAO {
    public function findAll(): array {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM utilisateur";
        $requete = $connexion->prepare($requeteSQL);
        $requete->execute();
        $usersDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($usersDB as $userDB) {
            $user = $this->toObject($userDB);
            $users[] = $user;
        }
        return $users;
    }

    public function findByID(int $id): ?Utilisateur {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM utilisateur WHERE id_user = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $userDB = $requete->fetch(PDO::FETCH_ASSOC);
        if (!$userDB) {
            return null;
        }
        $user = $this->toObject($userDB);
        return $user;
    }

    public function create(Utilisateur $user): void {
        $connexion = Database::getConnection();
        $requeteSQL = "INSERT INTO utilisateur (id_user, prenom_user, nom_user) VALUES (:id, :prenom, :nom)";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id", $user->getId());
        $requete->bindValue(":prenom",$user->getPrenom());
        $requete->bindValue(":nom",$user->getNom());
        $requete->execute();
    }

    //Méthode permettant de supprimer un auteur dans la BDD
    public function delete(int $id): void {
        $connexion = Database::getConnection();
        $requeteSQL = "DELETE FROM utilisateur WHERE id_user = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id",$id);
        $requete->execute();
    }

    //Méthode permettant de modifier un auteur dans la BDD
    public function update(Utilisateur $user): void {
        $connexion = Database::getConnection();
        $requeteSQL = "UPDATE utilisateur SET prenom_user = :prenom, nom_user = :nom WHERE id_user = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":prenom",$user->getPrenom());
        $requete->bindValue(":nom",$user->getNom());
        $requete->bindValue(":id",$user->getId());
        $requete->execute();
    }

    private function toObject(array $userDB): Utilisateur
    {
        $user = new Utilisateur();
        $user->setId($userDB["id_user"]);
        $user->setPrenom($userDB["prenom_user"]);
        $user->setNom($userDB["nom_user"]);
        return $user;
    }
}