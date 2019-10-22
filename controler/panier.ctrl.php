<?php
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

$config = parse_ini_file('../config/config.ini');
$imgArticlePath = $config['imgArticlePath'];

$vue = new View();
$dao = new DAO();

$articlesDansPanier = 0;
// utiliser le panier de la session si utilisateur pas connecté ou alors son panier de la BDD
if (isset($_SESSION['email'])) { // si on a son email dans la session il est connecté
  $articlesDansPanier = $dao->getPanierClient($_SESSION['email']); // panier BDD
} else {
  $articlesDansPanier = $_SESSION['panier']; // panier session
}

$vue->assign('panier', $articlesDansPanier);
$vue->assign('images_path',$imgArticlePath);
$vue->assign('images_path',$imgArticlePath);

?>
