<?php
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

$vue = new View();
$dao = new DAO();

$article = 0;

if (isset($_GET['ref'])) { // Forcement renseigné normalement car renseigné par recherche.ctrl
  $article = $dao->getArticle($_GET['ref']);
} else {
  die("reference non renseignée dans l'URL");
}

$vue->assign('article', $article);

$ajouteAuPanier = false;
if (isset($_GET['panier'])) { // Doit etre renseigné à 0 par recherche.ctrl
                              // Puis à 1 quand on clique sur ajouter au panier
  if ($_GET['panier']) { // oui ou non | 0 ou 1
  $ajouteAuPanier = true;
  if (isset($_SESSION['panier'])) {
    $_SESSION['panier'][] = $_GET['ref'];
    // a rajouter : si l'utilisateur est connecté il faut aussi enregistrer l'article dans son panier de la BDD
  } else {
    $_SESSION['panier'] = array();
    $_SESSION['panier'][] = $_GET['ref'];
    // a rajouter : si l'utilisateur est connecté il faut aussi enregistrer l'article dans son panier de la BDD
  }
  }
} else {
  die("booleen panier non renseigné dans l'URL");
}

$vue->assign('ajouteAuPanier', $ajouteAuPanier);

 ?>
