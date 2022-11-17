<?php 
include("connexionbdd.php");
session_start();
try{if(isset($_POST['password'])){
    $conn = Opencon();
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $userid = $_SESSION['userid'];
    $query = "SELECT * FROM Users WHERE mdp='$password' AND id_users ='$userid'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count==1){
        if($password==$confirm){
            $query = "SELECT * FROM Reservations WHERE id_users ='$userid'";
            $result = mysqli_query($conn, $query);
            $nbreserv = mysqli_num_rows($result);
            if($nbreserv!=0){
                array_push($erreur,"Pour supprimer votre compte, veuillez supprimer toutes vos réservations");
            }
            else{
            $query = "DELETE FROM Users WHERE id_users='$userid' ";
            $result = mysqli_query($conn, $query);
            session_unset();
            session_destroy();
            header("location: accueil.php");
            Closecon($conn);
            }
        }
    }
    else{
        array_push($erreur,"Mot de passe incorrect");
    }
}} catch(Exception $e){ echo $e;}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <title>Profil</title>
</head>
<body>
    <?php
        include "sidebarconnect.php";
    ?>
    <?php foreach($erreur as $a): ?>
        <div class ="erreur"  position:fixed>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <?php echo $a?>
        </div>
 <?php endforeach;
    $erreur=array();
?>
    <div class="main-block2">
        <form method="post" action="#">
            <h5>Êtes vous sur de vouloir supprimer votre compte ?<br>
                    Cette action n'est pas réversible.
            </h5>
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password"  id="password" name="password" placeholder="Entrez votre mot de passe"  required>
            <h5></h5>
            <input type="password" id="confirm" name="confirm" placeholder="Confirmez votre mot de passe" style="margin-bottom:20px;" required>
            <br>
                <a href="profil.php" class="btn btn-dark inlinebutton" data-inline="true">Annuler</a>
                <button type="submit" class="btn btn-dark inlinebutton" data-inline="true" >Valider</button>
                
</form>



<script>
function openNav() {
document.getElementById("sidebar").style.width = "300px";
document.getElementById("switch").style.visibility = "visible";
document.getElementById("switch").style.opacity = "100";
}

function closeNav() {
document.getElementById("sidebar").style.width = "0";
document.getElementById("switch").style.visibility = "hidden";
document.getElementById("switch").style.opacity = "0";
}

</script>
</body>
