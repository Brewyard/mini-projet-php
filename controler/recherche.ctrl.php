<?php
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

$vue = new View();
$dao = new DAO();

$config = parse_ini_file('../config/config.ini');
$imgArticlePath = $config['imgArticlePath'];



if (isset($_GET['recherche'])) { // normalement c'est tout le temps vrai
  $articlesTrouves = $dao->rechercheArticles($_GET['recherche']);

  // Note la référence du premier et dernier article affiché
  $firstRef = $articlesTrouves[0]->getRef();
  $lastRef = end($articlesTrouves)->getRef();

  // Calcule la référence qui suit le dernier article
  $nextRef = $dao->nextRecherche($lastRef, $_GET['recherche']);
  // Si c'est la fin: reste sur le même article
  if ($nextRef == -1) {
    $nextRef = $firstRef;
  }
  // Calcule la référence qui précède de 12 l'article courant
  $prevRef = $dao->prevNRecherche($firstRef, 12, $_GET['recherche']);
  // Si c'est la fin: reste sur le même article
  if ($prevRef == -1) {
    $prevRef = $firstRef;
  }
  $vue->assign('articlesTrouves', $articlesTrouves); // Donne articles à la vue
  $vue->assign('articleNext', $nextRef); // Donne articles à la vue
  $vue->assign('articlePrev', $prevRef); // Donne articles à la vue
  $vue->assign('images_path',$imgArticlePath);
}
//Pas forcement d'articles trouvés

$vue->display("../view/recherche.view.php");

?>
