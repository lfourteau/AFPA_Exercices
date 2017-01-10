<?php
include_once('../ObjectModels/Track.class.php');
include_once('../Dao/TrackDao.php');

$trackId = filter_input(INPUT_GET, 'trackId', FILTER_SANITIZE_NUMBER_INT);

TrackDao::deleteTrack($trackId);

header ('Location: /myPlaylists/interactPlaylist.php');
?>
