<!-- Affiche la track list -->
<?php
// connexion à la Base de Données
require '../connectBdd.php';

$reponse = $pdo->query("SELECT * FROM tracks"); //  requête non preparée pour
                                                //  récup des données de la BDD

while ($track = $reponse->fetch()){             // parcours des données reçues ligne par ligne
?>
<p>
  <!-- Génération d'une "track" en récupérant les données de la BDD-->
</p>
    <hr>
    <strong> <?php echo $track['title']; ?></strong>
      <a href="supprimer.php?id=<?php echo $track['id']?>">supprimer</a>
      <a href="fetchEdit.php?id=<?php echo $track['id']?>">éditer</a> <br>
    <?php echo $track['artist']; ?> <br>
    <?php echo $track['duration']; ?> <br>
    <?php echo $track['year'] ?>
</p><?php
}
echo '<a href="addForm.php"<h1>NEW</h1></a>';
?>
