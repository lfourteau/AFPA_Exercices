<!-- Création d'une navbar qui sera appelée sur toutes les pages du site une fois connecté -->
<?php session_start();
require ('connectBdd.php');
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/espacePerso.php">Yolu's Ultimate Playlist</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Mes playlists
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <!-- Permet de récupérer le nom des playlists dans la BDD et de les ajouter au dropdown menu de la navbar -->
          <?php
          $playlists = $pdo->prepare("SELECT name, id FROM playlists WHERE user_id = :userid");
          $playlists->bindValue('userid', $_SESSION['id']);
          $playlists->execute();

          while ($playlist = $playlists->fetch()) {
            ?>
            <!-- Quand on clique sur le nom d'une playlist, envoie dans l'URL l'id de la playlist qui sera réccupéré pour générer une variable de session qui permet de savoir dans quelle playlist on se trouve -->
            <li><a href="/myPlaylists/createSESSION_playlistId.php?playlistId=<?php echo $playlist['id']?>"> <?php echo $playlist['name'] ?></a></li>
            <?php
          }
          ?>
        </ul>
      </li>
      <!-- Bouton de création d'une nouvelle playlist -->
      <li><a role="button" data-toggle="modal" data-target="#newPlaylistModal">Créer une nouvelle playlist</a>
      </li>
      <!-- Bouton d'ajout d'un nouveau titre -->
      <li><a role="button" data-toggle="modal" data-target="#newTrackModal">Ajouter un nouveau titre</a>
      </li>

      <!-- New playlist Modal creation -->
      <div id="newPlaylistModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- New playlist Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Créer une nouvelle playlist</h4>
            </div>
            <div class="modal-body">
              <form action="/controller/createPlaylistController.php" method="post">
                <input type="text" placeholder="Nom de la playlist" name="playlistName" value="" required><br>
                <input type="submit" name="name" value="Valider">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- New track Modal creation -->
      <div id="newTrackModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- New track Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Veuillez indiquer les caractéristiques du titre</h4>
            </div>
            <div class="modal-body">
              <form action="/controller/addTrackController.php" method="post" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title" value ="" required><br>
                <input type="text" name="artist" placeholder="Artist" required><br>
                <input type="number" name="duration" placeholder="Duration" required><br>
                <input type="number" name="year" placeholder="Year" required><br>
                <label for="uploadTrackField">Charger la musique (format mp3, wma, mp4)</label>
                <input type="hidden" name="MAX_SIZE_VALUE" value="10000000">
                <input id = "uploadTrackField" type="file" name="uploadFile" value="">
                <input type="submit" name="submit" value ="Valider">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- Affiche le nom de l'utilisateur réccupéré par la variable de session -->
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo ' Bonjour ' .$_SESSION['pseudo']; ?></a></li>
      <!-- Bouton de déconnexion -->
      <li><a href="/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
