<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Panier</title>
    </head>
    <body>
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
            <?php $total += ( ($article->quantite) * ($article->prix) ) ?>
          <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td>Total : <?= $total ?> </td>
            </tr>
        </table>
    </body>
</html>
