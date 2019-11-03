<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Panier</title>
        <link rel="stylesheet" href="../view/style/general.style.css">
        <link rel="stylesheet" href="../view/style/panier.style.css">
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
          <?php if ($panier) :?>
          <table>
              <tr>
                  <th>Produit</th>
                  <th>Référence</th>
                  <th>Quantité</th>
                  <th>Prix</th>
              </tr>
              <?php foreach ($panier as $article): ?>
              <tr>
                  <td class="prod"><?= $article->intitule ?></td>

                  <td><?= $article->ref ?></td>

                  <td><?= $article->quantite ?></td>

                  <td><?= ($article->quantite) * ($article->prix) ?> €</td>
                  <td>
                  <form action="../controler/traitement_deletePanier.ctrl.php" method="post">
                    <input name="ref" value="<?= $article->ref ?>" type="hidden">
                    <input type="submit" value="Supprimer du panier">
                  </form>
                  </td>
              </tr>
            <?php endforeach; ?>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total : <?= $total ?> €</td>
              </tr>
          </table>
          <a href="../controler/traitement_commande.ctrl.php">Commander mon panier</a>
          <?php else :  ?>
          <p>Votre panier est vide !</p>
        <?php endif; ?>

      </section>
    </body>
</html>
