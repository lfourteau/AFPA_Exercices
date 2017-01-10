<?php
session_start();
require ('../connectBdd.php');

$deleteData = $pdo->prepare("DELETE FROM playlistsTracks WHERE id= :currentTrack_id");
$deleteData->bindValue('currentTrack_id', $_GET['track_id']);
$deleteData->execute();
header ("Location: interactPlaylist.php")

?>
