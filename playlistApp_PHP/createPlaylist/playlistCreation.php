<?php
$playlistSan = filter_var($_POST['playlistName'], FILTER_SANITIZE_STRING);

if (strlen($playlistSan)>0) {
// envoie des données en bdd
session_start();
require ('../connectBdd.php');

$insertPlaylist = $pdo->prepare("INSERT INTO playlists VALUES (0, :name, :userid)");
$insertPlaylist->bindValue('name', $playlistSan);
$insertPlaylist->bindValue('userid', $_SESSION['id']);
$insertPlaylist->execute();

header('Location: ../espacePerso.php');
}

else {
  ?><script type="text/javascript">

alert("Champs de saisie vide");
window.location = "playlistForm.php";

</script><?php

}

?>
