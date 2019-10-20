<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <form class="" action="traitement.inscription.ctrl.php" method="post">
      <p>Nom :</p><br>
      <input type="text" name="nom" value="Nom"><br>
      <p>Prenom :</p><br>
      <input type="text" name="prenom" value="Prenom"><br>
      <p>Adresse postale :</p><br>
      <input type="text" name="adresse" value="Adresse"><br>
      <p>Téléphone :</p><br>
      <input type="number" name="tel" value="0123456789"><br>
      <p>Login (adresse mail) :</p><br>
      <input type="email" name="mail" value="example@example.com"><br>
      <p>Mot de passe :</p><br>
      <input type="password" name="pass" value="password" maxlength="20" minlength="6"><br>
      <input type="submit" name="" value="Se connecter">
    </form>
  </body>
</html>
