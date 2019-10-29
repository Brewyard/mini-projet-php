<?php
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

$config = parse_ini_file('../config/config.ini');
$imgArticlePath = $config['imgArticlePath'];

$vue = new View();
$dao = new DAO();

$article = 0;

if (isset($_GET['ref'])) { // Forcement renseigné normalement car renseigné par recherche.ctrl
  $article = $dao->getArticle($_GET['ref']);
} else {
  die("reference non renseignée dans l'URL");
}

$categorie = $dao->getCat($article->idMere);

$vue->assign('categories', $dao->getCatFilles());
$vue->assign('article', $article);
$vue->assign('categorie', $categorie);
$vue->assign('images_path',$imgArticlePath);

$vue->display('../view/produit.view.php');

 ?>
