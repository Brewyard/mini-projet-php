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
        $sql = "INSERT INTO Client (email, nom, prenom, mdp, adresse, tel)
                values (:email, :nom, :prenom, :mdp, :adresse, :tel)";
        $stmt = $dao->prepare($sql);

        $email = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['pass'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];

        $stmt->BindParam(':email', $email);
        $stmt->BindParam(':nom', $nom);
        $stmt->BindParam(':prenom', $prenom);
        $stmt->BindParam(':mdp', $mdp);
        $stmt->BindParam(':adresse', $adresse);
        $stmt->BindParam(':tel', $tel);

        $stmt->execute();
    }

?>
