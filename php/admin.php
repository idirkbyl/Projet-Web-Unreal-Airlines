<?php 
session_start();
if($_SESSION['is_admin']!=1){
    header("location:  accueil.php");
}
?>
<html lang="fr">
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
    <title>Admin</title>
</head>
<body>
<?php
include "sidebarconnect.php";
include "connexionbdd.php";

$users = "SELECT * FROM Users";
$conn = Opencon();
$resultUsers = mysqli_query($conn,$users);
$reservations = "SELECT * FROM Reservations";
$resultReserv = mysqli_query($conn,$reservations);
$lieu = "SELECT * FROM Destinations";
$resultLieu = mysqli_query($conn,$lieu);
?>
<div style="overflow-x:scroll;">
    <table class="table table-dark" style="margin-top:30px; max-width:100%;">
        <thead>
            <tr>
            <th scope="col" style="color:white;">id_users</th>
            <th scope="col" style="color:white;">Nom</th>
            <th scope="col" style="color:white;">Prénom</th>
            <th scope="col" style="color:white;">Date naissance</th>
            <th scope="col" style="color:white;">email</th>
            <th scope="col" style="color:white;">tel</th>
            <th scope="col" style="color:white;">mdp</th>
            <th scope="col" style="color:white;">is_admin</th>
            <th scope="col" style="color:white;">username</th>
            <th scope="col" style="color:white;">#</th>
            </tr>
        </thead>
            <?php
                    while($row = mysqli_fetch_assoc($resultUsers)){
                        echo "<tr>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row['id_users'] . "</th>";

                        echo "<th scope=\"col\" style=\"color:white;\">". $row['nom'] . "</th>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row['prenom'] . "</th>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row['birth_date'] . "</th>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row["email"] . "</th>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row["tel"] . "</th>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row["mdp"] . "</th>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row["is_admin"] . "</th>";
                        echo "<th scope=\"col\" style=\"color:white;\">". $row["username"] . "</th>";
                        $id_users = $row['id_users'];
                        echo "<th scope=\"col\" style=\"color:white;\"><input type=\"submit\" class=\"annule\" onclick=\"location.href='delete_users.php?id=$id_users';\" value=\"Supprimer\"></input></th>";
                        echo "</tr>";
                    }
            ?>
        </table>
        <a href="adduser.php" class="add"> Ajouter un utilisateur </a>
</div>

<div style="overflow-x:scroll; margin-top:30px;">
    <table class="table table-dark" style="margin-top:30px; max-width:100%;">
    <thead>
        <tr>
        <th scope="col" style="color:white;">Numéro de réservation</th>
        <th scope="col" style="color:white;">Nom</th>
        <th scope="col" style="color:white;">Prénom</th>
        <th scope="col" style="color:white;">Destination</th>
        <th scope="col" style="color:white;">Date</th>
        <th scope="col" style="color:white;">#</th>
        </tr>
    </thead>
        <?php
        
            while($row = mysqli_fetch_assoc($resultReserv)){
                echo "<tr>";
                echo "<th scope=\"col\" style=\"color:white;\">". $row['id_reservation'] . "</th>";
                echo "<th scope=\"col\" style=\"color:white;\">". $row['nom'] . "</th>";
                echo "<th scope=\"col\" style=\"color:white;\">". $row['prenom'] . "</th>";
                $query2 = "SELECT nom FROM Destinations WHERE id_destination=$row[id_destination]";
                $result = mysqli_query($conn,$query2);
                $tmp = mysqli_fetch_assoc($result);
                $destination = $tmp['nom'];
                echo "<th scope=\"col\" style=\"color:white;\">". $destination . "</th>";
                echo "<th scope=\"col\" style=\"color:white;\">". $row["date"] . "</th>";
                $id_reserv = $row['id_reservation'];
                echo "<th scope=\"col\" style=\"color:white;\"><input type=\"submit\" class=\"annule\" onclick=\"location.href='delete_reservation_admin.php?id=$id_reserv&lieu=$destination';\" value=\"Supprimer\"></input></th>";
                echo "</tr>";
            }
        ?>
    </table>
    <a href="addreserv.php" class="add"> Ajouter une réservation </a>
</div>
        
<div style="overflow-x:scroll; margin-top:30px;">
    <table class="table table-dark" style="margin-top:30px; max-width:100%;">
    <thead>
        <tr>
        <th scope="col" style="color:white;">id_destination</th>
        <th scope="col" style="color:white;">Nom</th>
        <th scope="col" style="color:white;">nbplaces</th>
        <th scope="col" style="color:white;">#</th>
        </tr>
        
    </thead>
    <?php
        
        while($row = mysqli_fetch_assoc($resultLieu)){
            echo "<tr>";
            echo "<th scope=\"col\" style=\"color:white;\">". $row['id_destination'] . "</th>";
            echo "<th scope=\"col\" style=\"color:white;\">". $row['nom'] . "</th>";
            echo "<th scope=\"col\" style=\"color:white;\">". $row['nbplaces'] . "</th>";
            $id_destination = $row['id_destination'];
            echo "<th scope=\"col\" style=\"color:white;\"><input type=\"submit\" class=\"annule\" onclick=\"location.href='delete_lieu.php?id=$id_destination';\" value=\"Supprimer\"></input></th>";
            echo "</tr>";
        }
    ?>
    </table>

    <a href="addlieu.php" class="add"> Ajouter un lieu </a>
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

