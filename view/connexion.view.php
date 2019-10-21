<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <body>
    <form class="" action="traitement.connexion.ctrl.php" method="post">
      <label for="pass">Login (adresse mail) :</label> <br>
      <input type="email" name="mail" value="example@example.com"><br>
      <p>Mot de passe :</p><br>
      <input type="password" name="pass" value="password" maxlength="20" minlength="6"><br>
      <input type="password" name="confirm" value="confirmPassword" maxlength="20" minlength="6"><br>
      <input type="submit" name="" value="Se connecter">
    </form>
  </body>
</html>
