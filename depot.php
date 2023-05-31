<?php
$liste = [];
$recherche = [];
$recherche2 = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["liste-livres"])) {
        $listeLivres = new ListerLivres();
        $liste = $listeLivres->execute();
    } else if (isset($_POST["recherche-par-isbn"])) {
        $rechercheParIsbn = new RechercherLivreParISBN();
        $recherche = $rechercheParIsbn->execute($_POST["recherche-isbn"]);
    } else if (isset($_POST["recherche-par-auteur"])) {
        $rechercheParAuteur = new RechercherLivresD1Auteur();
        $recherche2 = $rechercheParAuteur->execute($_POST["recherche-nom"]);
    }
}

if (!empty($liste)) {
    foreach ($liste as $livre) { ?>
        <div><?= $livre->getIsbn()." ".$livre->getTitre()." ".$livre->getDateParution()->format("Y-m-d")." ".$livre->getNbPages().
            " ".$livre->getAuteur()->getId()." ".$livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom() ?></div>
    <?php }
} else if (!empty($recherche)) {?>
    <div><?= $recherche->getIsbn()." ".$recherche->getTitre()." ".$recherche->getDateParution()->format("Y-m-d")." ".$recherche->getNbPages()." "
        .$recherche->getAuteur()->getId()." ".$recherche->getAuteur()->getPrenom()." ".$recherche->getAuteur()->getNom()?></div>
<?php } else if (!empty($recherche2)) {
    foreach ($recherche2 as $livre) {?>
        <div><?=$livre->getIsbn()." ".$livre->getTitre()." ".$livre->getDateParution()->format("Y-m-d")." ".$livre->getNbPages()." "
            .$livre->getAuteur()->getId()." ".$livre->getAuteur()->getPrenom()." ".$livre->getAuteur()->getNom().PHP_EOL ?></div>
    <?php }
} ?>