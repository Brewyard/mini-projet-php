<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Recherche</title>
        <link rel="stylesheet" href="../view/style/general.style.css">
        <link rel="stylesheet" href="../view/style/main.style.css">
        <link rel="stylesheet" href="../view/style/recherche.style.css">
    </head>
    <body>
        <header>
            <section class="logo">
                <a href="../controler/main.ctrl.php"><img id="logo" src="../view/design/logo.png" alt="logo"></a>
            </section>
            <a href="../controler/main.ctrl.php">BricoJardin</a>
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
                            <li> <a href="../controler/main.ctrl.php?categorie=<?=$cat->id?>"><?=$cat->libelle?></a> </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <section class="zone">
                <h2>Produits trouvés pour la recherche "<?=$recherche?>"</h2>
                <hr>
                <?php if (isset($articlesTrouves) && $articlesTrouves != -1): ?>
                    <section class="presentation">
                        <?php foreach ($articlesTrouves as $article): ?>
                            <article class="article">
                                <a href="../controler/produit.ctrl.php?ref=<?=$article->ref?>"> <img src="<?=$images_path.''.$article->ref?>.jpg" alt="<?=$article->intitule?>"> </a>
                                <p><?=$article->intitule?></p>
                                <p><?=$article->prix?> €</p>
                            </article>
                        <?php endforeach; ?>
                    </section>
                <?php else: ?>
                    <p id="message"><?=$_SESSION['message']?></p>
                <?php endif; ?>
            </section>
        </section>
    </body>
</html>
