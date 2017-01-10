<?php

require '../connectBdd.php';

$suppr = $pdo->prepare("DELETE  FROM tracks WHERE id= :id" );
$suppr->bindValue("id", $_GET['id']);
$suppr->execute();

header('Location: trackList.php');
?>
