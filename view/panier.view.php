<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Panier</title>
    </head>
    <body>
        <?php if ($panier) :?>
        <table>
            <tr>
                <td>Produit</td>
                <td>Quantité</td>
                <td>Prix</td>
            </tr>
            <?php foreach ($panier as $article): ?>
            <tr>
                <!-- reference -->
                <td><?= $article->intitule ?></td>
                <!-- quantite -->
                <td><?= $article->quantite ?></td>

                <td><?= ($article->quantite) * ($article->prix) ?> </td>
            </tr>
          <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td>Total : <?= $total ?> </td>
            </tr>
        </table>
        <?php else :  ?>
        <p>Votre panier est vide !</p>
      <?php endif; ?>
    </body>
</html>
