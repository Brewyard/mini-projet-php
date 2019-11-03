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
          <section class="form">
              <form class="" action="traitement_connexion.ctrl.php" method="post">
                <label for="mail">Login (adresse mail) :</label> <br>
                <input type="email" id="mail" name="mail" value="" placeholder="example@example.com">
                <br> <br> <br>
                <label for="pass">Mot de passe :</label> <br>
                <input type="password" id="pass" name="pass" value="" placeholder="password" maxlength="20" minlength="6">
                <input type="submit" name="" value="Se connecter">
              </form>
          </section>
      </section>

      <?php if (isset($message)): ?>
          <p> <?=$message?> </p>
      <?php endif; ?>
  </body>
</html>
