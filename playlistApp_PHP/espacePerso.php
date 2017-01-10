<!-- Espace perso de l'application qui reprend la navbar et le carroussel -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Espace perso</title>
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
      <?php require ('navbar.php');?>
    </header>

    <?php require ('carrousel.php');?>
  </body>
</html>
