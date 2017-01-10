<?php
require ('../connectBdd.php');
include_once('../ObjectModels/Track.class.php');



class TrackDao
{
  // Permet d'envoyer une track dans la base de données
  function dbAddTrack($track)
  {
    global $pdo; // Permet de réccupérer la variable globale $pdo et de l'instancier
    $addTrack = $pdo->prepare("INSERT INTO tracks VALUES( 0,
                                                      :title,
                                                      :artist,
                                                      :duration,
                                                      :year,
                                                      :uploadTrack_name)");
    $addTrack->bindValue("title", $track->getTitle());
    $addTrack->bindValue("artist", $track->getArtist());
    $addTrack->bindValue("duration", $track->getDuration());
    $addTrack->bindValue("year", $track->getYear());
    $addTrack->bindValue("uploadTrack_name", $track->getUploadTrackName());
    $res = $addTrack->execute();
    if ($res){
      return $pdo->lastInsertId();
    } else {
      return -1;
    }
  }
  function deleteTrack($trackId)
  {
    global $pdo;
    $deleteTrack = $pdo->prepare("DELETE FROM tracks WHERE id= :Track_id");
    $deleteTrack->bindValue('Track_id', $trackId);
    $deleteTrack->execute();

  }
  function selectTrack($trackId)
  {
    global $pdo;
    $prep = $pdo->prepare("SELECT * FROM tracks WHERE id = :Track_id" );
    $prep->bindValue("Track_id", $trackId);
    $prep->execute();
    return $prep->fetch();
  }

  function updateTrack($track)
  {
    global $pdo;
    $updateTrack= $pdo->prepare("UPDATE tracks SET title = :title, artist = :artist, duration = :duration, year = :year, uploadTrack_name = :uploadTrack_name WHERE id = :Track_id" );
    $updateTrack->bindValue("Track_id", $track->getId());
    $updateTrack->bindValue("title", $track->getTitle());
    $updateTrack->bindValue("artist", $track->getArtist());
    $updateTrack->bindValue("duration", $track->getDuration());
    $updateTrack->bindValue("year", $track->getYear());
    $updateTrack->bindValue("uploadTrack_name", $track->getUploadTrackName());
    $updateTrack->execute();
  }
}

?>
