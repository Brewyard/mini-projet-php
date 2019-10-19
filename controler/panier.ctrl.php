<?php
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

$vue = new View();
$dao = new DAO();

$articlesDansPanier = 0;
// utiliser le panier de la session si utilisateur pas connecté ou alors son panier de la BDD
if (isset($_SESSION['email'])) { // si on a son email dans la session il est connecté
  $articlesDansPanier = $dao->getPanierClient($_SESSION['email']);
} else {
  $articlesDansPanier = $_SESSION['panier'];
}

$vue->assign('panier', $articlesDansPanier);

 ?>
