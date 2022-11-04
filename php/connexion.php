
<?php

    if (isset($_POST['username'])){
    include("connexionbdd.php");


    $conn = Opencon();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM Users WHERE username='$username' AND mdp ='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $userid = $row['id_users'];

    $is_admin = $row['is_admin'];

    if ($count==1){
        session_start();
        $_SESSION['userid']= $userid;
        $_SESSION['is_admin'] = $is_admin;
        $_SESSION['username'] = $username;
        header("location:  accueil.php"); // PAGE SUR LAQUELLE JE SUIS REDIRIGE APRES CONNEXION

    }
    else{
        array_push($erreur, "Nom d'utilisateur ou mot de passe inccorect");
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
    <title>Connexion</title>
</head>
<body>
    
    <container>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" >Unreal Airlines </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="accueil.php">Acceuil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connexion.php">Se connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connexion.php">Reserver</a>
            </li>
            </ul>
        </div>
        </nav>


</container>

<?php foreach($erreur as $a): ?>
        <div class ="erreur"  position:fixed>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <?php echo $a?>
        </div>
 <?php endforeach;
    $erreur=array();
?>
<div class="main-block">
    <form method="post" action="#">
            <h4><b>Se connecter</b></h4>
            <hr>
            <h5 class="formname"> Nom d'utilisateur </h5>
                <input type="text"  id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
            <hr>
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password"  id="password" name="password" placeholder="Entrez votre mot de passe" required>
            <hr>
            <button type="submit" class="btn btn-dark btn-block connect">Se connecter</button>
    </form>
    <hr>
    <a href = "inscription.php" class="white";> Je n'ai pas de compte </a>
</div>





</body>
</html>