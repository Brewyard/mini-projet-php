<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../view/style/general.style.css">
    <link rel="stylesheet" href="../view/style/connexion.style.css">
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
          <section class="form">
              <form class="" action="traitement_connexion.ctrl.php" method="post">
                <label for="mail">Login (adresse mail) :</label> <br>
                <input type="email" name="mail" value="" placeholder="example@example.com">
                <br> <br> <br>
                <label for="pass">Mot de passe :</label> <br>
                <input type="password" name="pass" value="" placeholder="password" maxlength="20" minlength="6">
                <input type="submit" name="" value="Se connecter">
              </form>
          </section>
      </section>

      <?php if (isset($message)): ?>
          <p> <?=$message?> </p>
      <?php endif; ?>
  </body>
</html>
