<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Produit</title>
  </head>
  <body>
      <section class="image">
          <img src="<?=$images_path.''.$article->urlPhoto?>" alt="<?=$article->intitule?>">
      </section>
    <section class="produit">
      <h1><?= $article->intitule ?></h1>
      <p><?=$article->infos?></p>
      <form class="" action="../controler/traitement_ajoutPanier.ctrl.php" method="get">
          <label for="quantite">Quantité : </label>
          <input id="quantite" type="number" name="quantite" value="1">
          <label>Prix à l'unité: <?=$article->prix?> €</label>
          <input type="hidden" name="ref" value="<?= $article->ref ?>">
          <input type="submit" value="Ajouter au panier">
      </form>
    </section>
  </body>
</html>
