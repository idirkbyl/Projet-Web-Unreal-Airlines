<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/accueil.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <title>Accueil</title>
</head>
<body>
<?php session_start();?>
    <?php if (!isset($_SESSION['username'])):?>
    <container>
    <nav class="navbar  navbar-dark">
        <button class="btn "onclick="openNav()"><span class="navbar-toggler-icon"></span></button>
        <a class="navbar-brand" href="#">Unreal Airlines</a>
    </nav>
    </container>
    <div id="sidebar" class="sidebar" style="width: 0px;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">Accueil</a>
        <a href="connexion.php">Réserver</a>
        <a href="connexion.php">Destinations</a>
        <form method="post" action="redirection.php">
        <button type="submit" id="switch"style="visibility: hidden; opacity: 0;" >Créer un compte</button>
        </form>
    </div>
    </container>
    <?php elseif (isset($_SESSION['username'])) : ?>
    <nav class="navbar  navbar-dark">
        <button class="btn "onclick="openNav()"><span class="navbar-toggler-icon"></span></button>
        <a class="navbar-brand" href="#">Unreal Airlines</a>
        <div class="btn-group">
            <div class="dropdown dropleft">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <img src = "../img/user.png" class ="avatar">
                </button>
                <ul class="dropdown-menu dorpdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                   <li> <a class="dropdown-item" href="profil.php">Profil</a></li>
                    <form method="post" action="deconnexion.php">
                    <li><button class="dropdown-item" href="#" type="submit">Se déconnecter</a></li>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    </container>
    <div id="sidebar" class="sidebar" style="width: 0px;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">Accueil</a>
        <a href="profil.php">Profil</a>
        <a href="reservation.php">Réserver</a>
        <a href="destination.php">Destinations</a>
        <form method="post" action="deconnexion.php">
        <button type="submit" id="switch"style="visibility: hidden; opacity: 0;" >Se déconnecter</button>
        </form>
    </div>
    <?php endif;?>

    <div class="carousel" data-flickity='{ "bgLazyLoad": true }'>
  <div class="carousel-cell slide1" data-flickity-bg-lazyload="https://unsplash.it/640/480/?random">
    <div class = "center"> egesfes </div>
  </div>
  <div class="carousel-cell" data-flickity-bg-lazyload="https://unsplash.it/640/481/?random"></div>
  <div class="carousel-cell" data-flickity-bg-lazyload="https://unsplash.it/640/482/?random"></div>
  <div class="carousel-cell" data-flickity-bg-lazyload="https://unsplash.it/640/483/?random"></div>
  <div class="carousel-cell" data-flickity-bg-lazyload="https://unsplash.it/640/484/?random"></div>
  <div class="carousel-cell" data-flickity-bg-lazyload="https://unsplash.it/640/485/?random"></div>
  <div class="carousel-cell" data-flickity-bg-lazyload="https://unsplash.it/640/486/?random"></div>
</div>



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