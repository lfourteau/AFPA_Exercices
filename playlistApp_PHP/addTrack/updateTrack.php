<?php
require '../connectBdd.php';


$edit = $pdo->prepare("UPDATE tracks SET title = :title, artist = :artist, duration = :duration, year = :year
                        WHERE id = :id" );
$edit->bindValue("id", $_POST['id']);
$edit->bindValue("title",$_POST['title']);
$edit->bindValue("artist", $_POST['artist']);
$edit->bindValue("duration", $_POST['duration']);
$edit->bindValue("year", $_POST['year']);


$edit->execute();

header('Location: trackList.php');

?>
