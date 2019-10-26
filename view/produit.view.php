<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Produit</title>
  </head>
  <body>
    <div class="produit">
      <h1><?= $article->intitule ?></h1>
      <img src="<?=$images_path.''.$article->ref?>.jpg" alt="<?=$article->intitule?>">
      <p><?=$article->infos?></p>
    </div>
  </body>
</html>
