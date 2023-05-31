<?php

require_once "Livre.php";
require_once "Utilisateur.php";

class Emprunts {

    private int $numero;
    private DateTime $dateEmprunt;
    private ?DateTime $dateRetour;
    private Livre $livre;
    private Utilisateur $user;

    public function __construct()
    {
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getDateEmprunt(): DateTime
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(DateTime $dateEmprunt): void
    {
        $this->dateEmprunt = $dateEmprunt;
    }

    public function getLivre(): Livre
    {
        return $this->livre;
    }

    public function setLivre(Livre $livre): void
    {
        $this->livre = $livre;
    }

    public function getUser(): Utilisateur
    {
        return $this->user;
    }

    public function setUser(Utilisateur $user): void
    {
        $this->user = $user;
    }

    public function getDateRetour(): ?DateTime
    {
        return $this->dateRetour;
    }

    public function setDateRetour(?DateTime $dateRetour): void
    {
        $this->dateRetour = $dateRetour;
    }
}