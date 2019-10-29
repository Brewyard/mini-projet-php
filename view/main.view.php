<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>BricoJardin</title>
        <link rel="stylesheet" href="../view/style/main.style.css">
    </head>
    <body>
        <header>
            <section class="logo">
                <img id="logo" src="../view/design/logo.png" alt="logo">
            </section>
            <h1>BricoJardin</h1>
            <section class="cats">
                <select name="categorie">
                    <option value="toutes" selected>Toutes les catégories</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?=$cat->libelle?>"><?=$cat->libelle?></option>
                    <?php endforeach; ?>
                </select>
            </section>
            <section class="midBarre">
                <form class="rech" action="../controler/recherche.ctrl.php" method="get">
                    <input id="barreRecherche" name="recherche" type="text" placeholder="Que recherchez-vous ?">
                    <input id="recherche" type="submit" name="" value="Rechercher">
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
                    <ul>
                        <li> <a class="signLog" href="../controler/traitement_deconnexion.ctrl.php">Se déconnecter</a> </li>
                    </ul>
                <?php } ?>
            </section>
        </header>
        <section class="corps">
            <aside class="catLat">
                <nav>
                    <ul>
                        <?php foreach ($categories as $cat): ?>
                            <li> <a href="../controler/main.ctrl.php?categorie=<?=$cat->libelle?>"><?=$cat->libelle?></a> </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <section class="zone">
                <?php if (isset($message)) : ?>
                    <p><?= $message ?></p>
                <?php endif; ?>
                <?php if ($categorie == 0): ?>
                    <h2>Articles en vedette</h2>
                <?php else: ?>
                    <h2><?=$categorie?></h2>
                <?php endif; ?>
                <hr>
                <section class="presentation">
                    <?php foreach ($articles as $article): ?>
                        <article class="article">
                            <a href="../controler/produit.ctrl.php?ref=<?=$article->ref?>"> <img src="<?=$images_path.''.$article->ref?>.jpg" alt="<?=$article->intitule?>"> </a>
                            <p><?=$article->intitule?></p>
                            <p><?=$article->prix?> €</p>
                        </article>
                    <?php endforeach; ?>
                </section>
            </section>
        </section>
    </body>
</html>
