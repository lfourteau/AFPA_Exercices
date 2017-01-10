<!--Ajouter une piste dans la base de données  -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3;../espacePerso.php" />
    <title> </title>
  </head>
  <body>

  </body>
</html>
<?php

require '../connectBdd.php';

$prep =$pdo->prepare("INSERT INTO tracks VALUES( 0,
                                                  :title,
                                                  :artist,
                                                  :duration,
                                                  :year,
                                                  :uploadTrack_name)");
$prep->bindValue("title",$_POST['title']);
$prep->bindValue("artist", $_POST['artist']);
$prep->bindValue("duration", $_POST['duration']);
$prep->bindValue("year", $_POST['year']);
$prep->bindValue("uploadTrack_name", $_FILES['uploadFile']['name']);
$prep->execute();

// Upload de la musique chargée
// Dans les versions de PHP antiéreures à 4.1.0, la variable $HTTP_POST_FILES
// doit être utilisée à la place de la variable $_FILES.
$fichier = basename($_FILES['uploadFile']['name']);
$extensions = array(".ogg", ".mp4", ".mp3", ".wmv", ".flac", ".m4a");
$extension = strrchr($_FILES['uploadFile']['name'], '.');
$taille_maxi = 10000000;
$taille = filesize($_FILES['uploadFile']['tmp_name']);


if(!in_array($extension, $extensions)) {
  $erreur = 'Vous devez utiliser une extenion de type .png, .jpeg ou .mp3';
}
if($taille>$taille_maxi) {
  $erreur = 'Fichier trop volumineux';
}
if($_FILES['uploadFile']['error'] > 0) {
  $erreur = "Erreur lors du transfert";
}
if(!isset($erreur)) {
  // on clean le nom en élinant tous caractères spéciaux
  $fichier = strtr($fichier,
  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
  $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

  $dossier = '../uploads/';
  if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
  {
    echo 'Upload effectué avec succès, redirection dans 3 secondes...';
  }
  else //Sinon (la fonction renvoie FALSE).
  {
    echo 'Echec de l\'upload !';
  }
}
else {
  echo $erreur .'<br>' .'Veuillez réessayer, redirection dans 3 secondes...';
}
?>
