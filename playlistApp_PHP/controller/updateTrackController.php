<?php
include_once('../ObjectModels/Track.class.php');
include_once('../Dao/TrackDao.php');

//Récupération et nettoyage des données provenant du formulaire
$inputTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$inputArtist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
$inputDuration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_NUMBER_INT);
$inputYear = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
$trackId = filter_input(INPUT_POST, 'trackId', FILTER_SANITIZE_NUMBER_INT);


// Upload de la musique chargée
if (strlen($_FILES['uploadFile']['name'])>0) // s'il y a un fichier dans l'upload
{
  $fichier = uniqid(); // génère un id unique en nom de fichier
}
else //sinon, nom de fichier = vide
{
  $uploadTrack_name = "";
}
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
    // on clean le nom en éliminant tous caractères spéciaux
    $fichier = strtr($fichier,
    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

    $dossier = '../uploads/';
    $uploadTrack_name = $dossier.$fichier;
    if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadTrack_name)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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


$track = new Track($trackId, $inputTitle, $inputArtist, $inputDuration, $inputYear, $uploadTrack_name);
var_dump($track);
TrackDao::updateTrack($track);

// header ('Location: /myPlaylists/interactPlaylist.php');
