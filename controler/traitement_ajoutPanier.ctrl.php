<?php

// Inclusion du modèle
include_once("../model/DAO.class.php");
$dao = new DAO();

session_start();

if (isset($_SESSION['mail'])) { // il est connecté

  $dao->ajoutPanier($_SESSION['mail'], $_GET['ref'], $_GET['quantite']);

} else { // pas connecté, on ajoute à son panier de session
    $ref = $_GET['ref'];
    $quantite = $_GET['quantite'];
    if (isset($_SESSION['panier']) ) {
      $ref = $_GET['ref'];
      $quantite = $_GET['quantite'];
      $article = $dao->getArticle($ref); //recupere l'article
      $article->quantite = $quantite; // ajoute dynamiquement la quantite à l'article
      $_SESSION['panier'][] = $article;
    } else {
      $_SESSION['panier'] = array();
      $article = $dao->getArticle($ref); //recupere l'article
      $article->quantite = $quantite; // ajoute dynamiquement la quantite à l'article
      $_SESSION['panier'][] = $article;
    }

}

$_SESSION['message'] = 'Ajout au panier effectué ! Félicitations !'; //
header('Location: main.ctrl.php'); // ajouté au panier et retour page principale

?>
