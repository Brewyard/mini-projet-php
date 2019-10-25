<?php
    // Inclusion du framework
    include_once("../framework/view.class.php");

    // Inclusion du modèle
    include_once("../model/DAO.class.php");



    if ($_POST['pass'] != $_POST['confirm']) {
        $vue = new View();
        $vue->assign('message', 'Les mots de passe ne concordent pas !');
        $vue->display('../view/inscription.view.php');
    } else { //rajouter cas existe deja
        $dao = new DAO();
        $dao->inscrire($_POST['mail'], $_POST['nom'], $_POST['prenom'],
                       $_POST['pass'], $_POST['adresse'], $_POST['tel']);
        $dao->connecter($_POST['mail'], $_POST['pass']); // sert a rien
        //Redirection sur le main et message inscription réussie
        $_SESSION['mail'] = $_POST['mail']; //
        $_SESSION['message'] = 'Inscription réussie ! Félicitations !'; //
        header('Location: main.ctrl.php'); // connecté et retour page principale
        exit();
    }

?>
