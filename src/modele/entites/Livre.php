<?php
require_once "Auteur.php";

class Livre {
    private string $isbn;
    private string $titre;
    private DateTime $dateParution;
    private int $nbPages;
    private Auteur $auteur;

    public function __construct()
    {
    }

    public function getIsbn(): int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDateParution(): DateTime
    {
        return $this->dateParution;
    }

    public function setDateParution(DateTime $dateParution): void
    {
        $this->dateParution = $dateParution;
    }

    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    public function setNbPages(int $nbPages): void
    {
        $this->nbPages = $nbPages;
    }

    public function getAuteur(): Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(Auteur $auteur): void
    {
        $this->auteur = $auteur;
    }


}