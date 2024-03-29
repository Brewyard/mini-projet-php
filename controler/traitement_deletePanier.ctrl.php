<?php
// Inclusion du modèle
include_once("../model/DAO.class.php");
session_start();
if (isset($_POST['ref'])) {
    if (isset($_SESSION['mail'])) { // connecté
        $dao = new DAO();
        //suppression de l'article du panier BDD
        $bool = $dao->supprimerPanier($_SESSION['mail'], $_POST['ref']);
        //Retour au panier
    } else {
        //On recherche l'article à supprimer avec sa reference et on le supprime du panier session
        foreach ($_SESSION['panier'] as $key => $article) {
            if (((string)$article->ref) == ((string)$_POST['ref'])) {
                unset($_SESSION['panier'][$key]);
            }
        }
    }
    header('Location: ../controler/panier.ctrl.php');
    exit();
}
else {
    die('reference non renseignée');
}

?>
