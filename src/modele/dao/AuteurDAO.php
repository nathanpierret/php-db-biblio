<?php
require_once "./src/modele/entites/Auteur.php";
require_once "./src/modele/config/Database.php";

//Cette classe va permettre de faire du CRUD et du mapping Objet-Relationnel
class AuteurDAO {
    //Méthode qui va se connecter à la BDD et qui va rechercher tous les enregistrements
    public function findAll(): array {
        //Connexion à la BDD
        $connexion = Database::getConnection();
        //Exécuter le SELECT
        $requeteSQL = "SELECT * FROM auteur";
        $requete = $connexion->prepare($requeteSQL);
        $requete->execute();
        $auteursDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        //Mapper les enregistrements vers des objets
        $auteurs = [];
        foreach ($auteursDB as $auteurDB) {
            //Création d'un objet Auteur
            $auteur = $this->toObject($auteurDB);
            $auteurs[] = $auteur;
        }
        //Retourner le résultat (tableau d'objets Auteur)
        return $auteurs;
    }

    //Méthode permettant de rechercher un auteur par son ID
    public function findByID(int $id): ?Auteur {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM auteur WHERE id_auteur = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $auteurDB = $requete->fetch(PDO::FETCH_ASSOC);
        if (!$auteurDB) {
            return null;
        }
        $auteur = $this->toObject($auteurDB);
        return $auteur;
    }

    //Méthode permettant de créer un nouvel auteur dans la BDD
    public function create(Auteur $auteur): void {
        $connexion = Database::getConnection();
        $requeteSQL = "INSERT INTO auteur (id_auteur, prenom_auteur, nom_auteur) VALUES (:id, :prenom, :nom)";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id", $auteur->getId());
        $requete->bindValue(":prenom",$auteur->getPrenom());
        $requete->bindValue(":nom",$auteur->getNom());
        $requete->execute();
    }

    //Méthode permettant de supprimer un auteur dans la BDD
    public function delete(int $id): void {
        $connexion = Database::getConnection();
        $requeteSQL = "DELETE FROM auteur WHERE id_auteur = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":id",$id);
        $requete->execute();
    }

    //Méthode permettant de modifier un auteur dans la BDD
    public function update(Auteur $auteur): void {
        $connexion = Database::getConnection();
        $requeteSQL = "UPDATE auteur SET prenom_auteur = :prenom, nom_auteur = :nom WHERE id_auteur = :id";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":prenom",$auteur->getPrenom());
        $requete->bindValue(":nom",$auteur->getNom());
        $requete->bindValue(":id",$auteur->getId());
        $requete->execute();
    }

    private function toObject(array $auteurDB): Auteur
    {
        $auteur = new Auteur();
        $auteur->setId($auteurDB["id_auteur"]);
        $auteur->setPrenom($auteurDB["prenom_auteur"]);
        $auteur->setNom($auteurDB["nom_auteur"]);
        return $auteur;
    }
}