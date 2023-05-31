<?php
require_once "./src/modele/config/Database.php";
require_once "./src/modele/entites/Livre.php";
require_once "./src/modele/entites/Auteur.php";

class LivreDAO {

    public function findAll(): array {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM livre l INNER JOIN auteur a on l.id_auteur = a.id_auteur";
        $requete = $connexion->prepare($requeteSQL);
        $requete->execute();
        $livresDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $livres = [];
        foreach ($livresDB as $livreDB) {
            $livre = $this->toObject($livreDB);
            $livres[] = $livre;
        }
        return $livres;
    }

    public function findByISBN(string $isbn): ?Livre {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM livre l INNER JOIN auteur a on l.id_auteur = a.id_auteur WHERE isbn = :isbn";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":isbn",$isbn);
        $requete->execute();
        $livreDB = $requete->fetch(PDO::FETCH_ASSOC);
        if (!$livreDB) {
            return null;
        }
        $livre = $this->toObject($livreDB);
        return $livre;
    }

    public function findByAuthorName(string $nomAuteur): array {
        $connexion = Database::getConnection();
        $requeteSQL = "SELECT * FROM livre l INNER JOIN auteur a on l.id_auteur = a.id_auteur WHERE nom_auteur = :nomAuteur";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":nomAuteur",$nomAuteur);
        $requete->execute();
        $livresDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $livres = [];
        foreach ($livresDB as $livreDB) {
            $livre = $this->toObject($livreDB);
            $livres[] = $livre;
        }
        return $livres;
    }

    public function create(Livre $livre): void {
        $connexion = Database::getConnection();
        $requeteSQL = "INSERT INTO livre (isbn, titre, date_parution, nb_pages, id_auteur) VALUES (:isbn, :titre, :date, :nbPages, :idAuteur)";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":isbn", $livre->getIsbn());
        $requete->bindValue(":titre", $livre->getTitre());
        $requete->bindValue(":date", $livre->getDateParution()->format("Y-m-d"));
        $requete->bindValue(":nbPages", $livre->getNbPages());
        $requete->bindValue(":idAuteur", $livre->getAuteur()->getId());
        $requete->execute();
    }

    public function delete(string $isbn): void {
        $connexion = Database::getConnection();
        $requeteSQL = "DELETE FROM livre WHERE isbn = :isbn";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":isbn",$isbn);
        $requete->execute();
    }

    public function update(Livre $livre): void {
        $connexion = Database::getConnection();
        $requeteSQL = "UPDATE livre SET titre = :titre, date_parution = :date, nb_pages = :nbPages, id_auteur = :idAuteur WHERE isbn = :isbn";
        $requete = $connexion->prepare($requeteSQL);
        $requete->bindValue(":titre",$livre->getTitre());
        $requete->bindValue(":date",$livre->getDateParution()->format("Y-m-d"));
        $requete->bindValue(":nbPages",$livre->getNbPages());
        $requete->bindValue(":idAuteur",$livre->getAuteur()->getId());
        $requete->bindValue(":isbn",$livre->getIsbn());
        $requete->execute();
    }

    private function toObject(array $livreDB): Livre
    {
        $livre = new Livre();
        $livre->setIsbn($livreDB["isbn"]);
        $livre->setTitre($livreDB["titre"]);
        $livre->setDateParution(DateTime::createFromFormat("Y-m-d",$livreDB["date_parution"]));
        $livre->setNbPages($livreDB["nb_pages"]);
        $auteur = new Auteur();
        $auteur->setId($livreDB["id_auteur"]);
        $auteur->setPrenom($livreDB["prenom_auteur"]);
        $auteur->setNom($livreDB["nom_auteur"]);
        $livre->setAuteur($auteur);
        return $livre;
    }
}