<?php

class Auteur {
    private int $id;
    private string $prenom;
    private string $nom;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $idAuteur): void
    {
        $this->id = $idAuteur;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenomAuteur): void
    {
        $this->prenom = $prenomAuteur;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nomAuteur): void
    {
        $this->nom = $nomAuteur;
    }


}