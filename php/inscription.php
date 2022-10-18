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
<div class="main-block">
    <form method="post" action="register.php">
            <h4><b>Inscription</b></h4>
            <hr>
            <h5 class="formname"> Nom  </h5>
                <input type="text"  id="name" name="name" placeholder="Entrez votre nom ">
            <hr>
            <h5 class="formname"> Prénom </h5>
                <input type="text"  id="firstname" name="firstname" placeholder="Entrez votre prénom">
            <hr>
            <h5 class="formname"> Date de naissance </h5>
                <input type="text"  id="birthdate" name="birthdate" placeholder="JJ/MM/AAAA">
            <hr>
            <h5 class="formname"> Nom d'utilisateur </h5>
                <input type="text"  id="username" name="username" placeholder="Entrez votre nom d'utilisateur">
            <hr>
            <h5 class="formname"> Mail </h5>
                <input type="email"  id="mail" name="mail" placeholder="Entrez votre mail">
            <hr>
            <h5 class="formname"> Téléphone </h5>
                <input type="tel"  id="tel" name="tel" placeholder="Entrez votre numéro de téléphone" pattern="[0]-[1-9]{1}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" requierd>
            <hr>
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password"  id="password" name="password" placeholder="Entrez votre mot de passe">
            <h5 class ="formname"> Mot de passe </h5>
            <input type="password" maxlength="10" id="password2" name="password2" placeholder="Confirmez votre mot de passe">
            <hr>
            
            <button type="submit" class="btn btn-dark btn-block connect">S'inscrire</button>
    </form>
    <hr>
    <a href = "connexion.php" class="black";> J'ai déja un compte </a>
</div>


</body>
</html>