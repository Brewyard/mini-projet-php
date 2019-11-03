<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Produit</title>
    <link rel="stylesheet" href="../view/style/general.style.css">
    <link rel="stylesheet" href="../view/style/produit.style.css">
  </head>
  <body>
      <header>
          <section class="logo">
              <img id="logo" src="../view/design/logo.png" alt="logo">
          </section>
          <a href="../controler/main.ctrl.php"><h1>BricoJardin</h1></a>
          <form class="rech" action="../controler/recherche.ctrl.php" method="get">
              <select name="categorie">
                  <option value="toutes" selected>Toutes les catégories</option>
                  <?php foreach ($categories as $cat): ?>
                      <option value="<?=$cat->libelle?>"><?=$cat->libelle?></option>
                  <?php endforeach; ?>
              </select>
              <input id="barreRecherche" name="recherche" type="text" placeholder="Que recherchez-vous ?">
              <input id="recherche" type="submit" name="" value="Rechercher">
          </form>
          <section class="pan">
              <a href="../controler/panier.ctrl.php"> <img id="panier" src="../view/design/panier.png" alt="panier"> </a>
          </section>
          <section class="rightBar">
          <?php
              if (!(isset($_SESSION['mail']))) { ?>
              <ul>
                  <li> <a class="signLog" href="../controler/connexion.ctrl.php">Connexion</a> </li>
                  <li> <a class="signLog" href="../controler/inscription.ctrl.php">Inscription</a> </li>
              </ul>
                <?php
              } else { ?>
                  <ul>
                      <li> <a class="signLog" href="../controler/traitement_deconnexion.ctrl.php">Se déconnecter</a> </li>
                  </ul>
              <?php } ?>
          </section>
      </header>
      <section class="corps">
        <section class="image">
          <img src="<?=$images_path.''.$article->urlPhoto?>" alt="<?=$article->intitule?>">
        </section>
        <section class="produit">
          <h1><?=$article->intitule?></h1>
          <p>Ref : <?=$article->ref?></p>
          <p>Informations : <?=$article->infos?></p>
          <p>Catégorie : <?=$categorie->libelle?></p>
          <form class="" action="../controler/traitement_ajoutPanier.ctrl.php" method="get">
              <label for="quantite">Quantité : </label>
              <input id="quantite" type="number" name="quantite" value="1">
              <br> <br>
              <label>Prix à l'unité: <?=$article->prix?> €</label>
              <input type="hidden" name="ref" value="<?= $article->ref ?>">
              <br> <br>
              <input type="submit" value="Ajouter au panier">
          </form>
        </section>
      </section>

  </body>
</html>
