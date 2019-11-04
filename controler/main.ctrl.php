<?php
//Le controleur main a besoin :
//  - Toutes les catégories et sous catégories
//  - Les articles mis en vedette sur la page principale (si aucun choix)
//  - Ou alors les articles et la categorie choisis
//  - la reference du premier article à afficher
//  - Si le client est connecté ou non (plus tard) et peut etre son login aussi pour pouvoir l'afficher en haut à droite
//  - le nombre de choses dans le panier (plus tard) pour l'afficher en haut à droite
// Inclusion du framework
include_once("../framework/view.class.php");

// Inclusion du modèle
include_once("../model/DAO.class.php");

define("NB_ARTICLES", "5");

$config = parse_ini_file('../config/config.ini');
$imgArticlePath = $config['imgArticlePath'];

$vue = new View();
$dao = new DAO();

if(isset($_GET['firstId']) && $_GET['firstId'] + 5 <= $nbMusic){
  $firstId = $_GET['firstId'];
}
else{
  $firstId = 1;
}

if (isset($_GET['categorie'])) {
  $vue->assign('categorie', $_GET['categorie']); // On donne la categorie à la vue
  $articles = $dao->getArticlesFromCat($_GET['categorie']); // on recupere les articles de cette categories dans la BDD
  $nomCateg = $dao->getCat($_GET['categorie'])->libelle;
  $vue->assign('categorie', $nomCateg);
}
else {
  $vue->assign('categorie', 'Articles les plus commandés');
  $articles = $dao->getArticlesPlusCommandes($firstId,NB_ARTICLES); // On recupere articles les plus commandés
}
$vue->assign('articles', $articles); // Donne articles à la vue

// Note la référence du premier et dernier article affiché
$firstRef = $articles[0]->ref;
$lastRef = end($articles)->ref;

if ($articles != NULL) {
  if (isset($_GET['categorie'])) {
    // Calcule la référence qui suit le dernier article
    $nextRef = $dao->next($lastRef);
    // Si c'est la fin: reste sur le même article
    if ($nextRef == -1) {
      $nextRef = $firstRef;
    }
    // Calcule la référence qui précède de 12 l'article courant
    $prevRef = $dao->prevN($firstRef,12);
    // Si c'est la fin: reste sur le même article
    if ($prevRef == -1) {
      $prevRef = $firstRef;
    }
  } else { //Sinon on doit recuperer la ref de l'article mis en vedette suivant
    $nextRef = $dao->nextPlusCommande($lastRef);
    // Si c'est la fin: reste sur le même article
    if ($nextRef == -1) {
      $nextRef = $firstRef;
    }
    // Calcule la référence qui précède de 12 l'article courant
    $prevRef = $dao->prevNPlusCommande($firstRef,12);
    // Si c'est la fin: reste sur le même article
    if ($prevRef == -1) {
      $prevRef = $firstRef;
  }
}


  // Passe le résultat à la vue
  $vue->assign('nextRef',$nextRef);
  // Passe le résultat à la vue
  $vue->assign('prevRef',$prevRef);
}

//message pour la creation du compte ou autres
session_start(); // toujours faire session_start avant d'utiliser la session
if (isset($_SESSION['message'])) {
  $vue->assign('message', $_SESSION['message']);
  unset($_SESSION['message']);
}

//Categories
$vue->assign('categories', $dao->getCatFilles());

$vue->assign('images_path',$imgArticlePath);

$vue->display("../view/main.view.php");

?>
