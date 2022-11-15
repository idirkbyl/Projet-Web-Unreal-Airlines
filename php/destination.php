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
    <title>Destinations</title>
</head>
<body>

<?php session_start();?>
        <?php if (!isset($_SESSION['username'])):?>
            <?php 

            include "sidebardisconnect.php" ;

            ?>
        <?php elseif (isset($_SESSION['username'])) : ?>
            <?php 
            include "sidebarconnect.php";
            
            ?>
        <?php endif;?>
<div class="container-fluid">
    <?php
        include "connexionbdd.php";
        $conn = Opencon();
        $query = "SELECT * FROM Destinations WHERE 1";
        $result = mysqli_query($conn,$query);
        $i = 1;
        echo "<div class=\"row\">";
        while($row = mysqli_fetch_assoc($result)){
            $nom = $row['nom'];
            $lienImage = $row['image'];
            if($i>3){
                $i=1;
                echo "</div>";
                echo "<div class=\"row\">";
            }
            echo "
            <div class=\"col-4\">
                <a href= \"destination2.php?nom=$nom\">
                <div class =\"slide\" style=\"background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url($lienImage);\">
                    <div class=\"hero-text\">
                        <p>$nom</p>
                    </div>
                </div>
                </a>";
                if($i==1){
                    echo "<img class=\"resize-image\" id=\"image3\" src=\"../img/bikinibot.jpeg\" style=\"visibility:hidden\"/>";
                 }
             echo "</div>";

             $i+=1;
        }
        Closecon($conn);
    ?>
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