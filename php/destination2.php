<?php 
include "connexionbdd.php";
$conn = Opencon();
$nom = $_GET['nom'];
$query = "SELECT * FROM Destinations WHERE nom='$nom'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$nom = $row['nom'];
$nbplaces = $row['nbplaces'];
$lienImage = $row['image'];
$description = $row['description'];
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
    <title><?php echo $nom ?></title>
</head>
<body style="background: none;">
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

<h2 class="title">  <?php echo $nom ?></h2>
<div class="image" style="background : url(<?php echo $lienImage?>) no-repeat center center scroll;"> </div>
<div class ="centre">
    <h4 class="desc">  <?php echo $description ?> </h4>
</div>

<h4 class="desc" style="margin-top:20px;"> Nombre de places restantes : <?php echo $nbplaces ?></h4>
<button type="submit" class="btn btn-dark btn-block connect" style="margin-bottom:20px;"onclick="location.href='reservation.php';">Réserver</button>

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