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
            <?php foreach ($panier as $produit): ?>
            <tr>
                <!-- reference -->
                <td><?= $produit[0] ?></td>
                <!-- quantite -->
                <td><?= $produit[1] ?></td>

                <td>Prix</td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
