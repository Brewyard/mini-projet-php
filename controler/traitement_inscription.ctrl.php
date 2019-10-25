<?php
    // Inclusion du framework
    include_once("../framework/view.class.php");

    // Inclusion du modèle
    include_once("../model/DAO.class.php");



    if ($_POST['pass'] != $_POST['confirm']) {
        $vue = new View();
        $vue->assign('message', 'Les mots de passe ne concordent pas !');
        $vue->display('../view/inscription.view.php');
    } else {
        $dao = new DAO();
        $inscriptionReussie = $dao->inscrire($_POST['mail'], $_POST['nom'], $_POST['prenom'],
                                             $_POST['pass'], $_POST['adresse'], $_POST['tel']);
        if ($inscriptionReussie) {
          session_start();
          $_SESSION['mail'] = $_POST['mail']; //
          $_SESSION['message'] = 'Inscription réussie ! Félicitations !'; //
          header('Location: main.ctrl.php'); // connecté et retour page principale
          exit();
        }
        else {
          $vue = new View();
          $vue->assign('message', 'Le compte existe déjà !');
          $vue->display('../view/inscription.view.php');
        }
    }

?>
