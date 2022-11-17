
<nav class="navbar  navbar-dark">
        <button class="btn "onclick="openNav()"><span class="navbar-toggler-icon"></span></button>
        <a class="navbar-brand" href="accueil.php">Unreal Airlines</a>
        <div class="btn-group">
            <div class="dropdown dropleft">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <img src = "../img/user.png" class ="avatar">
                </button>
                <ul class="dropdown-menu dorpdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                   <li> <a class="dropdown-item" href="profil.php">Profil</a></li>
                   <li> <a class="dropdown-item" href="mesreservations.php">Mes réservations</a></li>
                    <form method="post" action="deconnexion.php">
                    <li><button class="dropdown-item" href="#" type="submit">Se déconnecter</a></li>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <div id="sidebar" class="sidebar" style="width: 0px;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="accueil.php">Accueil</a>
        <a href="profil.php">Profil</a>
        <a href="reservation.php">Réserver</a>
        <a href="destination.php">Destinations</a>
        <?php 
        if(!isset($_SESSION['userid'])){
        session_start();
        }
        if ($_SESSION['is_admin']==1){
            echo  "<a href=\"admin.php\">Admin</a>";
        }
        ?>
        <form method="post" action="deconnexion.php">
        <button type="submit" id="switch"style="visibility: hidden; opacity: 0;" >Se déconnecter</button>
        </form>
    </div>