<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="../view/style/main.style.css">
    </head>
    <body>
        <header>
            <div class="logo">
                <img id="logo" src="../view/design/logo.png" alt="logo">
            </div>
            <div class="special">
                <ul>
                    <li> <a href="#">Promos</a> </li>
                    <li> <a href="#">Codes de reduction</a> </li>
                </ul>
            </div>
            <div class="cats">
                <select>
                    <option value="categories" selected>Toutes les catégories</option>
                    <option value="test1">Test1</option>
                    <option value="test2">Test2</option>
                    <option value="test3">Test3</option>
                </select>
            </div>
            <div class="midBarre">
                <form action="index.html" method="post">
                    <input id="barreRecherche" type="text" placeholder="Que recherchez-vous ?">
                </form>
                <a href="../recherche.ctrl.php"> <img id="loupe" src="../view/design/loupe.png" alt="loupe"> </a>
            </div>
            <div class="pan">
                <a href="../controler/panier.ctrl.php"> <img id="panier" src="../view/design/panier.png" alt="panier"> </a>
            </div>
            <div class="rigthBar">
                <a class="signLog" href="../controler/inscription.ctrl.php">S'inscrire</a>
                <a class="signLog" href="../controler/connexion.ctrl.php">Se connecter</a>
            </div>
        </header>
        <div class="zone">
            <nav>
                <ul>
                    <li>Test1</li>
                    <li>Test2</li>
                    <li>Test3</li>
                </ul>
            </nav>
        </div>
    </body>
</html>
