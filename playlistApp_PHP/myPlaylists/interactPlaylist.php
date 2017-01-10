<?php
include ('../navbarCall.php');

$playlistsName = $pdo->prepare("SELECT name FROM playlists WHERE id = :playlist_id");
$playlistsName->bindValue('playlist_id', $_SESSION['playlistId']);
$playlistsName->execute();
$playlistName = $playlistsName->fetch();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>modifier ma playlist</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/style.css" media="screen" title="no title">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  </head>
  <body>
    <!--Création du conainer ou il y a les deux tableaux  -->
    <div class="container-fluid">
      <header>
        <h2> Ajouter des titres </h2>
      </header>

      <div class="row">
        <!-- Partie gauche du tableau (pistes de la playlist actuelle) -->
        <div id = 'tracksAdd'class="col-md-6"> <h3> <?php echo $playlistName['name']; ?></h3>
          <?php
          $playlistTracks = $pdo->prepare ("SELECT t1.title, t1.artist, t1.duration, t1.year, t2.id
                                            FROM tracks t1
                                            INNER JOIN playlistsTracks t2
                                            ON t1.id = t2.track_id
                                            WHERE playlist_id = :playlist_id
                                            AND t1.id = t2.track_id
                                            ORDER BY t1.title");
          $playlistTracks->bindValue('playlist_id', $_SESSION['playlistId']);
          $playlistTracks->execute();
          ?>

            <table class = "table table-striped">
              <thead>
                <tr>
                  <th> Titre </th>
                  <th> Artiste </th>
                  <th> Durée </th>
                  <th> Année </th>
                </tr>
              </thead>
              <tbody>
                <!-- boucle pour créer la liste "titre, artiste, durée, année, bouton" -->
              <?php while ($trackList = $playlistTracks->fetch()){
              ?>
                  <tr>
                    <td> <strong> <?php echo $trackList['title']; ?> </strong> </td>
                    <td> <?php echo $trackList['artist']; ?> </td>
                    <td> <?php echo $trackList['duration']; ?> </td>
                    <td> <?php echo $trackList['year']; ?> </td>
                    <td> <a href="delPlaylistTracks.php?track_id=<?php echo $trackList['id']?>"><button type="button" class="btn btn-danger" title="supprimer de la playlist">x</button> </a> </td>
                  </tr>
                <?php
                }
                ?>
            </tbody>
          </table>
        </div>
        <!-- Partie droite de la page -->
        <div id = 'addTracks' class="col-md-6"> <h3> Tracks </h3>
          <?php
          $reponse = $pdo->query("SELECT * FROM tracks"); //  requête non preparée pour
                                                          //  récup des données de la BDD

          ?>

          <table class = "table table-striped">
            <thead>
              <tr>
                <th> Titre </th>
                <th> Artiste </th>
                <th> Durée </th>
                <th> Année </th>
              </tr>
            </thead>
            <tbody>
            <?php while ($track = $reponse->fetch()){
            ?>

              <tr>
                <td> <strong> <?php echo $track['title']; ?> </strong> </td>
                <td> <?php echo $track['artist']; ?> </td>
                <td> <?php echo $track['duration']; ?> </td>
                <td> <?php echo $track['year']; ?> </td>
                <td hidden> <?php echo $track['id']; ?> </td>

                <td> <a href="/view/updateTrackForm.php?trackId=<?php echo $track['id']?>"><button type="button" class="btn btn-alert myBtn">edit</button></a></td>
                <td> <a href="interactPlaylist_modal.php?trackId=<?php echo $track['id']?>"><button type="button" class="btn btn-success myBtn">+</button></a></td>
                <td> <a href="/controller/deleteTrackController.php?trackId=<?php echo $track['id']?>"><button type="button" class="btn btn-danger myBtn">x</button></a></td>
                <?php
                }
                // fin de la requête
                ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
