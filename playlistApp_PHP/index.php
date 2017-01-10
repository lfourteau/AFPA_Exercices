<!-- Première page appelée qui permet de se connecter ou de s'inscrire -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 70%;
        margin: auto;
    }
    </style>
  </head>

  <body>
    <header>
      <!-- Crétion d'une navbar spécifique à la page d'index (différente de "navbar.php") -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Yolu's Ultimate Playlist</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a class="btn btn-default" role="button" data-toggle="modal" data-target="#mySignUpModal">S'inscrire</a></li>
            <li><a class="btn btn-default" role="button" data-toggle="modal" data-target="#mySignInModal">Se connecter</a></li>
          </ul>
        </div>
      </nav>

      <!-- Sign up Modal creation -->
      <div id="mySignUpModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Sign up Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Créer votre compte personnel</h4>
            </div>
            <div class="modal-body">
              <form action="/inscription/sendInscription.php" method="post">
                <input type="text" placeholder="Pseudo" name="pseudo" value="" required><br>
                <input type="password" placeholder="Mot de passe" name="password" value="" required><br>
                <input type="password" placeholder="Confirmation du mot de passe" name="password_confirm" value="" required><br>
                <input type="email" placeholder="Adresse email" name="email" value="" required><br>
                <input type="submit" name="name" value="Valider">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Sign in Modal creation -->
      <div id="mySignInModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Sign in Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Veuillez entrer vos identifiants</h4>
            </div>
            <div class="modal-body">
              <form action="connection.php" method="post">
                <input type="text" placeholder = "Username" name="username" value="" required>
                <input type="password" placeholder="Password" name="password" value="" required>
                <input type="submit" name="name" value="Valider">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Appel du carroussel -->
    <div id = "carroussel">
      <h1>Actualité musicale</h1>
      <?php
      include ('carrousel.php');
      ?><!-- Page d'accueil contenant le login et le bouton envoyant au signin-->
    </div>






  </body>
</html>
