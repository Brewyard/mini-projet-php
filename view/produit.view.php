<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Produit</title>
  </head>
  <body>
      <section class="image">
          <img src="<?=$images_path.''.$article->ref?>.jpg" alt="<?=$article->intitule?>">
      </section>
    <section class="produit">
      <h1><?= $article->intitule ?></h1>
      <p><?=$article->infos?></p>
      <form class="" action="../controler/produit.ctrl.php" method="get">
          <label for="quantite">Quantité : </label>
          <input id="quantite" type="number" name="quantite" value="1">
          <label>Prix à l'unité: <?=$article->prix?> €</label>
          <label>Prix total : <?=$article->prix * $quantite?> €</label>
          <input type="submit" value="Commander">
      </form>
    </section>
  </body>
</html>
