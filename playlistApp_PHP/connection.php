<?php
// Requête pour valider la connexion à la BDD 

//commande pour vérifier que le nom d'utilisateur est clean
$userNameVerif= filter_input (INPUT_POST, 'username', FILTER_SANITIZE_STRING);

//requête dans la BDD. permet aussi de réccupérer l'identifiant de l'utilisateur qui sera généré en variable de session
require ('connectBdd.php');
$validConnect= $pdo->prepare("SELECT id FROM Users WHERE pseudo= :pseudo AND password= :password");
$validConnect->bindValue('pseudo', $userNameVerif);
$validConnect->bindValue('password', sha1($_POST['password']));
$validConnect->execute();
$valid=$validConnect->fetch();


if(!$valid){
echo "Pseudo ou mot de passe incorrect"; //Si pas de correspondance, renvoie l'echo
}

 else { // Sinon, démarre une session et génère les variables de session nécessaires à l'identification de l'utilisateur
   session_start();
   $_SESSION['id']=$valid['id'];
   $_SESSION['pseudo']=$userNameVerif;
   header('Location: espacePerso.php');
 }

 ?>
