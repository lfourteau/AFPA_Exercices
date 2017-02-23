<!-- Envoie des données "user" dans la Bdd -->

<?php
require ('../connectBdd.php');

if ((sha1($_POST['password']) === sha1($_POST['password_confirm']))) { // Si les mdp correspondent : lance la création du user en bdd

$insertUser = $pdo->prepare ("INSERT INTO Users VALUES(0, :pseudo, :password, :password_confirm, :email)");
$insertUser->bindValue("pseudo", $_POST['pseudo']);
$insertUser->bindValue("password", sha1($_POST['password']));
$insertUser->bindValue("password_confirm", sha1($_POST['password_confirm']));
$insertUser->bindValue("email", $_POST['email']);
$insertUser->execute();

// vérifie que le formulaire est bien rempli
if (strlen($_POST['pseudo'])>0
  && strlen($_POST['password'])>0
  && strlen($_POST['password_confirm'])>0
  && strlen($_POST['email'])>0)
{
  //Démarre une session et envoi vers l'espace perso
  session_start();

  $_SESSION['id'] = $pdo->lastInsertId (); // permet de réccupérer le dernier identifiant généré dans la bdd
  $_SESSION['pseudo'] = $_POST['pseudo'];
  header('Location: ../espacePerso.php');
}

else {

// message d'erreur si mal rempli
// penser à créer un lien pour revenir au formulaire
  echo "Formulaire incomplet";
}
}
else { // Sinon, indique que les mdp sont différents
  echo "Mot de passe saisis différents";

  echo '<br><a href="../index.php">Cliquer ici pour revenit à la page d\'acceuil</a>';
}
 ?>
