
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

$vue = new View();
$dao = new DAO();
$vue->assign('categorie', 0);
if (isset($_GET['categorie'])) {
  $vue->assign('categorie', $_GET['categorie']); // On donne la categorie à la vue
  $articles = $dao->getArticlesFromCat($_GET['categorie']); // on recupere les articles de cette categories dans la BDD
}
else {
  $articles = $dao->getArticlesPlusCommandes($_GET['categorie']); // On recupere articles les plus commandés
}
$vue->assign('articles', $articles); // Donne articles à la vue

// Note la référence du premier et dernier article affiché
$firstRef = $articles[0]->getRef();
$lastRef = end($articles)->getRef();

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
} else { //Sinon on doit recuperer la ref de l'article mis en vedette suivant et précedent de 12
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
$view->assign('nextRef',$nextRef);
// Passe le résultat à la vue
$view->assign('prevRef',$prevRef);

$view->display("../view/main.view.php");

?>
