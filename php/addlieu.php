<?php
session_start();
if($_SESSION['is_admin']!=1){
    header("location: accueil.php");
}



?>
<?php
    include("connexionbdd.php");

    try{if(isset($_POST['nbplaces']))
    {

    $conn = Opencon();
    $nom = $_POST['nom'];
    $nbplaces = $_POST['nbplaces'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $username = $_SESSION['username'];
    $query = "SELECT * FROM Users WHERE username='$username' AND mdp ='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($confirm!=$password){
        array_push($erreur,"Les mots de passes ne correspondent pas");
    }
    else if($count!=1){
        array_push($erreur,"Mot de passe incorrect");
    }
    else{
        $insert = "INSERT INTO Destinations (nom,nbplaces) VALUES ('$nom','$nbplaces')";
        $execinsert = mysqli_query($conn,$insert);
        header("location: admin.php");
    }
}}catch(Exception $e){ echo $e;}
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
    <title>Ajouter un Lieu</title>
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
            <h4><b>Ajouter un lieu</b></h4>
            <hr>
            <h5 class="formname"> Nom  </h5>
                <input type="text"  id="name" name="name" placeholder="Entrez le nom du lieu " required>
            <hr>
            <h5 class="formname"> Nbplaces </h5>
                <input type="text"  id="nbplaces" name="nbplaces" placeholder="Entrez le nombre de places" required>
            <hr>
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password"  id="password" name="password" placeholder="Entrez votre mot de passe" onkeyup='check()' required>
            <h5></h5>
            <input type="password" id="confirm" name="confirm" placeholder="Confirmez votre mot de passe"  onkeyup='check()' required>
            <br>
            <span id='message'></span>
            <hr>

            
            <button type="submit" class="btn btn-dark btn-block connect">Ajouter</button>
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
</body>
<footer>

</footer>
</html>