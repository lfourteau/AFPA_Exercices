<?php
include '../navbarCall.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ajouter une piste</title>
  </head>
  <body>
    <form action="ajouter.php" method="post">
      <h2>Veuillez indiquer les caractéristiques du titre</h2><br>
      <input type="text" name="title" placeholder="title" value =""><br>
      <input type="number" name="duration" placeholder="duration"><br>
      <input type="number" name="year" placeholder="year"><br>
      <input type="text" name="artist" placeholder="artist"><br>
      <label for="uploadTrackField">Charger la musique (format mp3, wma, mp4)</label>
      <input type="hidden" name="MAX_SIZE_VALUE" value="10000000">
      <input id = "uploadTrackField" type="file" name="name" value="">
      <input type="submit" name="submit">
    </form>
  </body>
</html>
