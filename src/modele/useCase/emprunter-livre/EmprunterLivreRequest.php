<?php

class EmprunterLivreRequest {
    public string $isbn;
    public int $idUser;

    public function __construct(string $isbn, int $idUser)
    {
        $this->isbn = $isbn;
        $this->idUser = $idUser;
    }

}