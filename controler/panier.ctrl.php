<?php
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

$config = parse_ini_file('../config/config.ini');
$imgArticlePath = $config['imgArticlePath'];

$vue = new View();
$dao = new DAO();
session_start();
$articlesDansPanier = [];
// utiliser le panier de la session si utilisateur pas connecté ou alors son panier de la BDD
if (isset($_SESSION['mail'])) { // si on a son email dans la session il est connecté
  $articlesDansPanier = $dao->getPanierClient($_SESSION['mail']); // panier BDD
} else {
    if (isset($_SESSION['panier'])) {
        $articlesDansPanier = $_SESSION['panier']; // panier session
    }
}

if ($articlesDansPanier) { // si panier pas vide
  $total = 0;
  foreach ($articlesDansPanier as $article) {
    $total += ($article->quantite) * ($article->prix) ;
  }
  $vue->assign('total', $total);
}

$vue->assign('categories', $dao->getCatFilles());

$vue->assign('panier', $articlesDansPanier);

$vue->assign('images_path',$imgArticlePath);

$vue->display('../view/panier.view.php');

?>
