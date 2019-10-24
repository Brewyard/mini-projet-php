<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <form class="" action="../controler/traitement_inscription.ctrl.php" method="post">
      <label for="nom">Nom : </label>
      <input id="nom" type="text" name="nom" placeholder="Nom" required><br>
      <label for="prenom">Prenom : </label>
      <input id="prenom" type="text" name="prenom" placeholder="Prenom" required><br>
      <label for="adresse">Adresse postale : </label>
      <input id="adresse" type="text" name="adresse" placeholder="Adresse" required><br>
      <label for="tel">Téléphone : </label>
      <input id="tel" type="tel" name="tel" placeholder="01 23 45 67 89" minlength=4 maxlength="10" required><br>
      <label for="login">Login (adresse mail) : </label>
      <input id="login" type="email" name="mail" placeholder="example@example.com" required><br>
      <label for="mdp">Mot de passe : </label>
      <input id="mdp" type="password" name="pass" maxlength="20" minlength="6" placeholder="Mot de passe" required><br>
      <label for="confirm">Confirmation du mot de passe : </label>
      <input id="confirm" type="password" name="confirm" maxlength="20" minlength="6" placeholder="Mot de passe" required><br>
      <input type="submit" name="" value="S'inscrire">
    </form>

    <?php if (isset($message)): ?>
        <p> <?=$message?> </p>
    <?php endif; ?>

  </body>
</html>
