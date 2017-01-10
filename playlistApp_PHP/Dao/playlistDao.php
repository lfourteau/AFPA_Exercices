<?php
require '../connectBdd.php';

class playlist {

static function createPlaylist($name, $userid) // Permet d'ajouter une playlist dans la Bdd

{
  global $pdo;
  $insertPlaylist = $pdo->prepare("INSERT INTO playlists VALUES (0, :name, :userid)");
  $insertPlaylist->bindValue('name', $name);
  $insertPlaylist->bindValue('userid', $userid);
  $insertPlaylist->execute();

  return $pdo->lastInsertId();
}


static function readPlaylist()
{

}

static function updatePlaylist()
{

}

static function deletePlaylist()
{

}

}
?>
