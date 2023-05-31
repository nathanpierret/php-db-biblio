<?php
require_once "./src/modele/useCase/emprunter-livre/EmprunterLivre.php";
require_once "./src/modele/useCase/emprunter-livre/EmprunterLivreStatus.php";
require_once "./src/modele/useCase/emprunter-livre/EmprunterLivreRequest.php";
require_once "./src/modele/useCase/emprunter-livre/EmprunterLivreReponse.php";

$emprunterLivre = new EmprunterLivre();
$requete = new EmprunterLivreRequest("1456414567",1);

$reponse = $emprunterLivre->execute($requete);

echo $reponse->message;
