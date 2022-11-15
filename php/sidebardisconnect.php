<nav class="navbar  navbar-dark">
        <button class="btn "onclick="openNav()"><span class="navbar-toggler-icon"></span></button>
        <a class="navbar-brand" href="accueil.php">Unreal Airlines</a>
    </nav>
    <div id="sidebar" class="sidebar" style="width: 0px;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="accueil.php">Accueil</a>
        <a href="connexion.php">Réserver</a>
        <a href="destination.php">Destinations</a>
        <form method="post" action="redirection.php">
        <button type="submit" id="switch"style="visibility: hidden; opacity: 0;" >Créer un compte</button>
        </form>
    </div>