<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire de connexion</title>
  </head>
  <body>
    <label for="user">Veuillez entrer vos identifiants</label>
    <form id="connectForm" action="connection.php" method="post">
      <input id="user" type="text" placeholder = "Username" name="username" value="">
      <input type="password" placeholder="Password" name="password" value="">
      <button type="submit" name="Login">Login</button>
    </form>
  </body>
</html>
