<?php
    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    $dao = new DAO();
    $connexionReussie = $dao->connecter($_POST['mail'], $_POST['pass']);

    if ($connexionReussie) {
      session_start(); //demarre la session pour enregistrer le mail de la personne dedans
      $_SESSION['mail'] = $_POST['mail']; //
      $_SESSION['message'] = 'Connexion réussie ! Félicitations !'; //
      //il faut enregistrer le panier de la session dans la BDD
      if (isset($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $article) {
          $dao->ajoutPanier($_SESSION['mail'], $article->ref, $article->quantite);
        }
      }
      header('Location: main.ctrl.php'); // connecté et retour page principale
      exit();
    } else { // connexion echouée, soit mdp/mail pas bon soit pas inscrit
      // Inclusion du framework
      include_once("../framework/view.class.php");
      $vue = new View();
      $vue->assign('message', 'La connexion a échoué, compte inexistant ou mot de passe/adresse mail incorrectes');
      $vue->display('../view/connexion.view.php');
    }
?>
