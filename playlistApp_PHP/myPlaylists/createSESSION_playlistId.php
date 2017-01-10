<?php
session_start();
$_SESSION['playlistId']= $_GET['playlistId'];
header ("Location: interactPlaylist.php");
 ?>
