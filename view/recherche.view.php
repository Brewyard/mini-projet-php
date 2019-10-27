<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Recherche</title>
    </head>
    <body>
        <?php foreach ($articlesTrouves as $article): ?>
            <article class="article">
                <a href="../controler/produit.ctrl.php?ref=<?=$article->ref?>"> <img src="<?=$images_path.''.$article->ref?>.jpg" alt="<?=$article->intitule?>"> </a>
            </article>
        <?php endforeach; ?>
    </body>
</html>
