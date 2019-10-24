<?php
    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    $dao = new DAO();
    $dao->connecter($_POST['mail'], $_POST['pass']);

?>
