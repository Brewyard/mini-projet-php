<?php
    // Inclusion du framework
    include_once("../framework/view.class.php");

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    $vue = new View();

    if ($_POST['pass'] != $_POST['confirm']) {
        $vue->assign('message', "Les mots de passe ne concordent pas !");
        $vue->display('../view/inscription.view.php');
    } else {
        $dao = new DAO();
        $dao->inscrire($_POST['mail'], $_POST['nom'], $_POST['prenom'],
                        $_POST['pass'], $_POST['adresse'], $_POST['tel']);
    }
?>
