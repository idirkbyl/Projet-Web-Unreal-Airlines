<?php
 include ("connexionbdd.php");

$conn = Opencon();
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM Users WHERE username=$username' AND mdp =$password";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count==1){
    $_SESSION['connecte']= "connecte";
    header("location:../index.html"); // PAGE SUR LAQUELLE JE SUIS REDIRIGE APRES CONNEXION

}
else{
    $erreur = "Nom d'utilisateur ou mot de passe inccorect";
}



?>
