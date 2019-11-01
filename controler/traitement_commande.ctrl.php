<?php

session_start();
if (isset($_SESSION['mail'])) { // il est connecté
    // Evidemment il manque la phase de paiement à rajouter
    // Inclusion du modèle
    include_once("../model/DAO.class.php");
    $dao = new DAO();
    $articlesPanier = $dao->getPanierClient($_SESSION['mail']); // recup le panier du client
    foreach ($articlesPanier as $article) { // commande chaque article du panier du client
      $dao->commande($_SESSION['mail'], $article);
    }
    //Envoyer un mail ce serait mieux
    $_SESSION['message'] = 'Commande effectuée avec succès, vous recevrez un mail de confirmation prochainement !';
    header('Location: main.ctrl.php'); // connecté et retour page principale
    exit();
} else {
    $_SESSION['message'] = 'Veuillez vous connecter pour passer la commande !';
    header('Location: main.ctrl.php'); // connecté et retour page principale
    exit();
}

?>
