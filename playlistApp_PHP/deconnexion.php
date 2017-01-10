<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5; URL=index.php">
    <title>Deconnexion</title>
  </head>
  <body>
  Vous avez été déconnecté avec succès, redirection dans 5 secondes sinon, cliquer sur <a href="index.php">click here.</a>
  </body>
  <?php
  // Détruit les variables de session quand on se déconnecte
  session_start();
  session_destroy ();
  ?>

</html>
