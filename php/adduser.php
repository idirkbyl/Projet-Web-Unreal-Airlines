<?php
    session_start();
    if($_SESSION['is_admin']!=1){
        header("location: accueil.php");
    }
    include("connexionbdd.php");
    if(isset($_POST['firstname']))
    {
    $conn = Opencon();
    $username = $_POST['username'];
    $nom = $_POST['name'];
    $prenom = $_POST['firstname'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $isadmin = $_POST['isadmin'];
    $birthdate = $_POST['birthdate'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $queryUsername = "SELECT * FROM Users WHERE username='$username'";
    $queryMail = "SELECT * FROM Users WHERE email='$mail'";
    $resultU = mysqli_query($conn, $queryUsername);
    $resultM = mysqli_query($conn, $queryMail);
    $existU = mysqli_num_rows($resultU);
    $existM = mysqli_num_rows($resultM);
    $incorrect=0;

    if($confirm!=$password){
        array_push($erreur,"Les mots de passes ne correspondent pas");
    }
    if($existU==1|| $existM==1){
        if ($existU==1 && $existM==1 ){
            array_push($erreur,"Ce nom d'utilisateur est déja attribué");
            array_push($erreur,"E-mail déja utilisé");
            
        }
        else if($existU==1){
            array_push($erreur,"Ce nom d'utilisateur est déja attribué");
            
        }
        else{
            array_push($erreur,"E-mail déja utilisé");
            
        }
        $incorrect=1;
    }
    if($incorrect!=1){
    $insert = "INSERT INTO Users (nom,prenom,birth_date,email,tel,mdp,username,is_admin) VALUES ('$nom','$prenom','$birthdate','$mail','$tel','$password','$username','$isadmin')"; 
    $execinsert = mysqli_query($conn,$insert);
    header("location: admin.php");
    Closecon($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Add Users</title>
</head>
<body>
<?php 
    include "sidebarconnect.php";
?>
<div class="container">
        <?php foreach($erreur as $a): ?>
                    <div class ="erreur"  position:fixed>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <?php echo $a?>
                    </div>
        <?php endforeach;
        $erreur=array();
        ?>
         <?php foreach($succes as $a): ?>
                    <div class ="succes"  position:fixed>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <?php echo $a?>
                    </div>
        <?php endforeach;
        $succes=array();
        ?>
    </div>
<div class="main-block">
    <form method="post" action="#">
            <h4><b>Ajoutez un Utilisateur</b></h4>
            <hr>
            <h5 class="formname"> Nom  </h5>
                <input type="text"  id="name" name="name" placeholder="Entrez un nom " required>
            <hr>
            <h5 class="formname"> Prénom </h5>
                <input type="text"  id="firstname" name="firstname" placeholder="Entrez un prénom" required>
            <hr>
            <h5 class="formname"> Date de naissance </h5>
                <input type="text"  id="birthdate" name="birthdate" maxlength='10' placeholder="JJ/MM/AAAA" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
            <hr>
            <h5 class="formname"> Nom d'utilisateur </h5>
                <input type="text"  id="username" name="username" placeholder="Entrez un nom d'utilisateur" required>
            <hr>
            <h5 class="formname"> Mail </h5>
                <input type="email"  id="mail" name="mail" placeholder="Entrez un mail" required>
            <hr>
            <h5 class="formname"> Téléphone </h5>
                <input type="tel"  id="tel" name="tel" maxlength='10' placeholder="Entrez un numéro de téléphone" pattern="[0][1-9]{1}[0-9]{8}" required>
            <hr>
            <h5 class="formname"> is_admin </h5>
                <input type="text"  id="isadmin" name="isadmin" maxlength='1' placeholder="1 pour admin, 0 sinon" pattern="[0-1]" required>
            <hr>
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password"  id="password" name="password" placeholder="Entrez un mot de passe" onkeyup='check()' required>
            <h5></h5>
            <input type="password" id="confirm" name="confirm" placeholder="Confirmez le mot de passe"  onkeyup='check()' required>
            <br>
            <span id='message'></span>
            <hr>

            
            <button type="submit" class="btn btn-dark btn-block connect">Ajouter l'utilisateur</button>
    </form>
    <hr>
    <a href = "admin.php" class="white";> Retour </a>
</div>



<script>
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
</html>