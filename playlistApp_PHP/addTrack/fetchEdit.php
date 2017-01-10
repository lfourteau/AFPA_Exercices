<?php

require '../connectBdd.php';
// requête préparée pour récupérer les données de la BDD
$selectEdit = $pdo->prepare("SELECT * FROM tracks WHERE id = :id" );
$selectEdit->bindValue("id", $_GET['id']);
$selectEdit->execute();

$validEdit = $selectEdit->fetch();
  ?>
<!-- Formulaire pour récupérer les données -->
<form action="updateTrack.php" method="post">
  <input type="hidden" name="id" value="<?php echo $validEdit['id']?>">
  <input type="text" name="title" value ="<?php echo $validEdit['title']?>"><br>
  <input type="text" name="artist" value="<?php echo $validEdit['artist']?>"><br>
  <input type="number" name="duration" value="<?php echo $validEdit['duration']?>"><br>
  <input type="number" name="year" value="<?php echo $validEdit['year']?>"><br>
  <input type="submit" name="submit">
</form>
<?php
?>
