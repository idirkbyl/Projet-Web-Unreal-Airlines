<?php
try {
    include("connexionbdd.php");

    $conn = Opencon();
    $username = $_POST['username'];
    $nom = $_POST['name'];
    $prenom = $_POST['firstname'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $birthdate = $_POST['birthdate'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $queryUsername = "SELECT * FROM Users WHERE username='$username'";
    $queryMail = "SELECT * FROM Users WHERE email='$mail'";
    $resultU = mysqli_query($conn, $queryUsername);
    $resultM = mysqli_query($conn, $queryMail);
    $existU = mysqli_num_rows($resultU);
    $existM = mysqli_num_rows($resultM);

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
    $insert = "INSERT INTO Users (nom,prenom,birth_date,email,tel,mdp,username,is_admin) VALUES ('$nom','$prenom','$birthdate','$mail','$tel','$password','$username','0')"; 
    $execinsert = mysqli_query($conn,$insert);
    Closecon($conn);
    }


    
} catch (Exception $e) {
    echo $e;
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
    <title>Connexion</title>
</head>
<body>
    
    <container>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark color">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" >Unreal Airlines </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="../html/index.html">Acceuil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="reservation.php">Reserver</a>
        </li>
        </ul>
    </div>
    </nav>


</container>
<div class="container">
        <?php foreach($erreur as $a): ?>
                    <div class ="erreur"  position:fixed>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <?php echo $a?>
                    </div>
                <?php endforeach; ?>
    </div>
<div class="main-block">

    <form method="post" action="#">
            <h4><b>Inscription</b></h4>
            <hr>
            <h5 class="formname"> Nom  </h5>
                <input type="text"  id="name" name="name" placeholder="Entrez votre nom " required>
            <hr>
            <h5 class="formname"> Prénom </h5>
                <input type="text"  id="firstname" name="firstname" placeholder="Entrez votre prénom" required>
            <hr>
            <h5 class="formname"> Date de naissance </h5>
                <input type="text"  id="birthdate" name="birthdate" maxlength='10' placeholder="JJ/MM/AAAA" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
            <hr>
            <h5 class="formname"> Nom d'utilisateur </h5>
                <input type="text"  id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
            <hr>
            <h5 class="formname"> Mail </h5>
                <input type="email"  id="mail" name="mail" placeholder="Entrez votre mail" required>
            <hr>
            <h5 class="formname"> Téléphone </h5>
                <input type="tel"  id="tel" name="tel" maxlength='10' placeholder="Entrez votre numéro de téléphone" pattern="[0][1-9]{1}[0-9]{8}" required>
            <hr>
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password"  id="password" name="password" placeholder="Entrez votre mot de passe" onkeyup='check()' required>
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password" id="confirm" name="confirm" placeholder="Confirmez votre mot de passe"  onkeyup='check()' required>
            <br>
            <span id='message'></span>
            <hr>

            
            <button type="submit" class="btn btn-dark btn-block connect">S'inscrire</button>
    </form>
    <hr>
    <a href = "connexion.php" class="black";> J'ai déja un compte </a>
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
    function validerMdp(){
        const password = document.querySelector('input[name=password]');
        const confirm = document.querySelector('input[name=confirm]');
        if(confirm.value === password.value){
            confirm.setCustomValidity('');
        }
        else{
            confirm.setCustomValidity('Les mots de passes sont différents');
        }
    }
</script>

</body>
<footer>

</footer>
</html>