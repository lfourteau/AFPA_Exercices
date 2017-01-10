<?php
session_start();
require ('../connectBdd.php');
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
<link rel="stylesheet" href="style.css" media="screen" title="no title">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    .modal-header, h4, .close {
        background-color: #5cb85c;
        color:white !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-footer {
        background-color: #f9f9f9;
    }
    </style>

  </head>
  <body>
    <div class="container-fluid">
      <header>
        <h2> Ajouter des titres </h2>
        <div class="row">
          <div id = 'tracksAdd'class="col-md-6"> <h3> <?php echo $playlistName['name']; ?> </h3>
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

                    <td><button type="button" class="btn btn-success myBtn">+</button></td>

                    <div class="modal fade" id="myModal" role="dialog">

                      <div class="modal-dialog">

                        <div class="modal-content">
                          <div class="modal-header" style="padding:35px 50px;">
                            <a href="interactPlaylist.php"><button type="button" class="close" >&times;</button></a>

                            <?php
                              $reqtest = $pdo->prepare("SELECT * FROM tracks WHERE id =:id");
                              $reqtest->bindValue('id', $_GET['trackId']);
                              $reqtest->execute();

                              $reqtestend = $reqtest->fetch();
                             ?>

                            <h4><span><?php echo $reqtestend['title']; ?></span></h4>
                          </div>
                          <div class="modal-body" style="padding:40px 50px;">
                            <ul>
                              <li> artiste: <?php echo $reqtestend['artist']; ?></li>
                              <li> durée: <?php echo $reqtestend['duration']; ?></li>
                              <li>année: <?php echo $reqtestend['year']; ?></li>
                              <li hidden> id: <?php echo $reqtestend['id']; ?></li>
                            </ul>
                            <?php
                            // $uploadTrack_name = $reqtestend['uploadTrack_name'];
                             ?>
                            <span><audio src='../uploads/<?php echo $reqtestend['uploadTrack_name']; ?>' controls></audio></span>
                          </div>
                          <div class="modal-footer">
                            <a href="interactPlaylist.php"><button type="submit" class="btn btn-danger btn-default pull-left"><span class="glyphicon glyphicon-remove"></span> Annuler</button></a>
                            <a href="insertplaylistsTracks.php?track_id=<?php echo $_GET['trackId']?>"><button type="button" class="btn btn-success" title="Ajouter une piste">Ajouter</button> </a>
                          </div>
                        </div>
                      </div>
                  </tr>
                  </div>
                  <?php
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </header>
    </div>
    <script>
    $(document).ready(function(){
        // $(".myBtn").click(function(){
            $("#myModal").modal();
        // });
    });
    </script>
  </body>
</html>
