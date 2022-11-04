<?php 
session_start();
include("connexionbdd.php");
include("modifierprofil.php");






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
<?php foreach($succes as $a): ?>
    <div class ="succes"  position:fixed>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <?php echo $a?>
    </div>
<?php endforeach;
        $succes=array();
?>

<div class="main-block">
    <form method="post" action="#">
            <?php 
                $conn=Opencon();

                $username = $_SESSION['username'];
                $query = "SELECT * FROM Users WHERE username='$username'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $nom = $row['nom'];
                $prenom = $row['prenom'];
                $bd = $row['birth_date'];
                $email =$row['email'];
                $tel =$row['tel'];
                Closecon($conn);
            ?>
            <h4><b>Modifier votre Profil</b></h4>
            <h5> Remplissez uniquement les champs désirant être modifié</h5>
            <hr>
            <h5 class="formname"> Nom  </h5>
                <input type="text"  id="name" name="name" placeholder=<?php print $nom?> >
            <hr>
            <h5 class="formname"> Prénom </h5>
                <input type="text"  id="firstname" name="firstname" placeholder=<?php print $prenom?> >
            <hr>
            <h5 class="formname"> Date de naissance </h5>
                <input type="text"  id="birthdate" name="birthdate" maxlength='10' placeholder=<?php print $bd?>  pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" >
            <hr>
            <h5 class="formname"> Nom d'utilisateur </h5>
                <input type="text"  id="username" name="username" placeholder=<?php print $username?>  >
            <hr>
            <h5 class="formname"> Mail </h5>
                <input type="email"  id="mail" name="mail" placeholder=<?php print $email?>  >
            <hr>
            <h5 class="formname"> Téléphone </h5>
                <input type="tel"  id="tel" name="tel" maxlength='10' placeholder= <?php print $tel?>  pattern="[0][1-9]{1}[0-9]{8}" >
            <hr>
            <h5 class ="formname"> Mot de passe <br><br>
            Si vous ne souhaitez pas modifier votre mot de passe, entrez simplement votre mot de passe actuel
            </h5>
            <input type="password"  id="password" name="password" placeholder="Nouveau mot de passe" onkeyup='check()' required>
            <h5></h5>
            <input type="password" id="confirm" name="confirm" placeholder="Confirmez votre mot de passe"  onkeyup='check()' required>
            <br>
            <span id='message'></span>
            <hr>
            <button type="submit" class="btn btn-dark btn-block connect">Modifier</button>
    </form>
    <a href="supp.php" class="btn btn-dark btn-block supp">Supprimer votre compte</button>




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
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Les mots de passes ne  correspondent pas';
  }
}
</script>
</body>