<?php
include ('../navbarCall.php');
 ?>
<!-- création d'une nouvelle playlist -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body> Créer ma nouvelle playlist
    <form class="" action="playlistCreation.php" method="post">
      <input type="text" placeholder="nom de la playlist" name="playlistName" value="">
      <button type="submit" name="button">Valider</button>
    </form>
  </body>
</html>
