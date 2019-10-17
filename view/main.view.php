<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <style media="screen">

            #barreMenu {
                display: flex;
                justify-content: space-between;
            }

            .midBarre {
                display: inline;
            }

            #logo {
                width: 150px;
                height: 150px;
            }

            #recherche {
                width: 30px;
                height: 30px;
            }

            option {
                box-sizing: border-box;
            }

            #panier {
                width: 50px;
                height: 50px;
            }

        </style>
    </head>
    <body>
        <div id="barreMenu">
            <div class="logo">
                <img id="logo" src="../view/design/logo.png" alt="logo">
            </div>
            <div class="midBarre">
                <form action="index.html" method="post">
                    <input id="barreRecherche" type="text" placeholder="Que recherchez-vous ?">
                </form>
                <a href="../recherche.ctrl.php"> <img id="recherche" src="../view/design/loupe.png" alt="loupe"> </a>
                <select name="Catégories">
                    <option value="test1">Test1</option>
                    <option value="test2">Test2</option>
                    <option value="test3">Test3</option>
                </select>
            </div>
            <div class="rigthBar">
                <a href="../controler/panier.ctrl.php"> <img id="panier" src="../view/design/panier.png" alt="panier"> </a>
                <a href="../controler/inscription.ctrl.php">S'inscrire</a>
                <a href="../controler/connexion.ctrl.php">Se connecter</a>
            </div>
        </div>
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
