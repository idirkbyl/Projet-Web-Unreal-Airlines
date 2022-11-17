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

    <title>Mes reservations</title>
</head>
<body>
<?php 
include "sidebarconnect.php";?>
 <h2 style="margin:10px; color:white; ">  Mes réservations </h2>
<div style="margin-top:3px; margin:10px;">
<?php
    include "connexionbdd.php" ;
    $userid = $_SESSION['userid'];
    $conn = Opencon();
    $query1 = "SELECT * FROM Reservations WHERE id_users='$userid'";
    $result1 = mysqli_query($conn,$query1);

    ?>
    <table class="table table-dark" style="">
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
        
            while($row = mysqli_fetch_assoc($result1)){
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
                echo "<th scope=\"col\" style=\"color:white;\"><input type=\"submit\" class=\"annule\" onclick=\"location.href='delete_reservation.php?id=$id_reserv&lieu=$destination';\" value=\"Annuler\"></input></th>";
                echo "</tr>";
            }
        ?>
    </table>
    
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