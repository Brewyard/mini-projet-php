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
    $recherche = "";
    $recherche = $_GET['recherche'];
    $articlesTrouves = $dao->rechercheArticles($recherche);

    if ($articlesTrouves != -1) {
        // Note la référence du premier et dernier article affiché
        $firstRef = $articlesTrouves[0]->ref;
        $lastRef = end($articlesTrouves)->ref;

        // // Calcule la référence qui suit le dernier article
        // $nextRef = $dao->nextRecherche($lastRef, $_GET['recherche']);
        // // Si c'est la fin: reste sur le même article
        // if ($nextRef == -1) {
        //   $nextRef = $firstRef;
        // }
        // // Calcule la référence qui précède de 12 l'article courant
        // $prevRef = $dao->prevNRecherche($firstRef, 12, $_GET['recherche']);
        // // Si c'est la fin: reste sur le même article
        // if ($prevRef == -1) {
        //   $prevRef = $firstRef;
        // }
        $vue->assign('articlesTrouves', $articlesTrouves); // Donne articles à la vue
        $vue->assign('images_path',$imgArticlePath);
    } else {
        $_SESSION['message'] = "Il n'y aucun article dont le nom ou la référence contient '$recherche'";
    }
    // $vue->assign('articleNext', $nextRef); // Donne articles à la vue
    // $vue->assign('articlePrev', $prevRef); // Donne articles à la vue

    $vue->assign('recherche', $recherche);
}
//Pas forcement d'articles trouvés

//Categories
$vue->assign('categories', $dao->getCatFilles());

$vue->display("../view/recherche.view.php");

?>
