<?php
session_start();
require ('../Dao/playlistDao.php');
$createplaylistName = filter_var($_POST['playlistName'], FILTER_SANITIZE_STRING);

if (strlen($createplaylistName)>0) {
playlist::createPlaylist($_POST['playlistName'], $_SESSION['id']);
header('Location: ../espacePerso.php');
}
else {
}
?>
