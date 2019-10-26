<?php
session_start();
session_destroy(); // on detruit la session

session_start();
$_SESSION['message'] = 'Déconnexion réussie ! Félicitations !'; //
header('Location: main.ctrl.php'); // connecté et retour page principale
exit();
?>
