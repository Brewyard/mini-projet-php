<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="../view/style/main.style.css">
    </head>
    <body>
        <header>
            <section class="logo">
                <img id="logo" src="../view/design/logo.png" alt="logo">
            </section>
            <section class="special">
                <ul>
                    <li> <a href="#">Promos</a> </li>
                    <li> <a href="#">Codes de reduction</a> </li>
                </ul>
            </section>
            <section class="cats">
                <select>
                    <option value="toutes" selected>Toutes les catégories</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?=$cat->libelle?>"><?=$cat->libelle?></option>
                    <?php endforeach; ?>
                </select>
            </section>
            <section class="midBarre">
                <form action="../controler/recherche.ctrl.php" method="get">
                    <input id="barreRecherche" name="recherche" type="text" placeholder="Que recherchez-vous ?">
                    <input type="submit" name="" value="" id="loupe">
                </form>
            </section>
            <section class="pan">
                <a href="../controler/panier.ctrl.php"> <img id="panier" src="../view/design/panier.png" alt="panier"> </a>
            </section>
            <section class="rightBar">
            <?php
                if (!(isset($_SESSION['mail']))) { ?>
                <ul>
                    <li> <a class="signLog" href="../controler/connexion.ctrl.php">Se connecter</a> </li>
                    <li> <a class="signLog" href="../controler/inscription.ctrl.php">S'inscrire</a> </li>
                </ul>
                  <?php
                } else { ?>
                    <a class="signLog" href="../controler/traitement_deconnexion.ctrl.php">Se déconnecter</a>
                <?php } ?>
            </section>
        </header>
        <aside class="catLat">
            <nav>
                <ul>
                    <?php foreach ($categories as $cat): ?>
                        <li> <br> <a href="../controler/main.ctrl.php?categorie=<?=$cat->libelle?>"><?=$cat->libelle?></a> </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>
        <section class="zone">
            <?php if (isset($message)) : ?>
                <p><?= $message ?></p>
            <?php endif; ?>
            <?php if ($categorie = 0): ?>
                <h2>Articles en vedette</h2>
            <?php else: ?>
                <h2><?=$categorie?></h2>
            <?php endif; ?>
            <?php foreach ($articles as $article): ?>
                <article class="">
                    <a href="../controler/produit.ctrl.php?ref=<?=$article->ref?>"> <img src="<?=$images_path.''.$article->ref?>.jpg" alt="<?=$article->intitule?>"> </a>
                </article>
            <?php endforeach; ?>
        </section>
    </body>
</html>
