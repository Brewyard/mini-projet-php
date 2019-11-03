<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../view/style/general.style.css">
    <link rel="stylesheet" href="../view/style/inscription.style.css">
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
              <form class="" action="../controler/traitement_inscription.ctrl.php" method="post">
                <label for="nom">Nom : </label>
                <input id="nom" type="text" name="nom" placeholder="Nom" required><br>
                <br> <br> <br>
                <label for="prenom">Prenom : </label>
                <input id="prenom" type="text" name="prenom" placeholder="Prenom" required><br>
                <br> <br> <br>
                <label for="adresse">Adresse postale : </label>
                <input id="adresse" type="text" name="adresse" placeholder="Adresse" required><br>
                <br> <br> <br>
                <label for="tel">Téléphone : </label>
                <input id="tel" type="tel" name="tel" placeholder="01 23 45 67 89" minlength=4 maxlength="10" required><br>
                <br> <br> <br>
                <label for="login">Login (adresse mail) : </label>
                <input id="login" type="email" name="mail" placeholder="example@example.com" required><br>
                <br> <br> <br>
                <label for="mdp">Mot de passe : </label>
                <input id="mdp" type="password" name="pass" maxlength="20" minlength="6" placeholder="Mot de passe" required><br>
                <br> <br> <br>
                <label for="confirm">Confirmation du mot de passe : </label>
                <input id="confirm" type="password" name="confirm" maxlength="20" minlength="6" placeholder="Mot de passe" required><br>
                <br> <br> <br>
                <input type="submit" name="" value="S'inscrire">
              </form>
          </section>
          <?php if (isset($message)): ?>
            <p> <?=$message?> </p>
          <?php endif; ?>
      </section>
  </body>
</html>
