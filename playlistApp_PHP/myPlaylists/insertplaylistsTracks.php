<?php
session_start();
require ('../connectBdd.php');

$insertData = $pdo->prepare("INSERT INTO playlistsTracks VALUES (0, :playlist_id,:tracks_id)");
$insertData->bindValue('playlist_id', $_SESSION['playlistId']);
$insertData->bindValue('tracks_id', $_GET['track_id']);
$insertData->execute();
header ("Location: interactPlaylist.php")

?>
