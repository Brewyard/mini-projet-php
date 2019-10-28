<?php
session_start();

if (isset($_SESSION['mail'])) { // il est connecté

  // Inclusion du modèle
  include_once("../model/DAO.class.php");
  $dao = new DAO();

  $dao->ajoutPanier($_SESSION['mail'], $_GET['ref'], $_GET['quantite']);

} else { // pas connecté, on ajoute à son panier de session

  if (isset($_SESSION['panier']) ) {
    $_SESSION['panier'][$ref] = $quantite;
  } else {
    $_SESSION['panier'] = array();
    $_SESSION['panier'][$ref] = $quantite;
  }

}

$_SESSION['message'] = 'Ajout au panier effectué ! Félicitations !'; //
header('Location: main.ctrl.php'); // ajouté au panier et retour page principale

?>
