<?php
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

$vue = new View();
$dao = new DAO();

//Categories
$vue->assign('categories', $dao->getCatFilles());

$vue->display('../view/connexion.view.php');

?>
