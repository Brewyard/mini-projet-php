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

  if (isset($_SESSION['email'])) { // si connecté
    $dao->ajouteArticlePanier($_SESSION['email'], $_GET['ref']);
  } else { // pas connecté

      if (isset($_SESSION['panier'])) { // on ajoute au panier de la session
        $_SESSION['panier'][] = $_GET['ref'];
      } else { // pas encore de panier on le crée
        $_SESSION['panier'] = array();
        $_SESSION['panier'][] = $_GET['ref'];
      }
      
  }

  }
} else {
  die("booleen panier non renseigné dans l'URL");
}

$vue->assign('ajouteAuPanier', $ajouteAuPanier);

 ?>
