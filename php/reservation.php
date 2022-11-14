<?php
include("connexionbdd.php");
$conn = Opencon();
session_start();
if(isset($_POST['name'])){
    $lieu = $_POST['lieu'];
    $date = $_POST['date'];
    $nom=$_POST['name'];
    $prenom=$_POST['firstname'];
    $mail = $_POST['mail'];
    $query = "SELECT id_destination FROM Destinations WHERE nom='$lieu'";
    $result = mysqli_query($conn,$query);
    $row= mysqli_fetch_assoc($result);
    $id_destination=$row['id_destination'];
    $query = "SELECT * FROM Users WHERE email='$mail'";
    $result = mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count==1){
        $row= mysqli_fetch_assoc($result);
        $id_users = $row['id_users'];
        $query = "INSERT INTO Reservations (`date`,`id_destination`,`id_users`,`nom`,`prenom`,`email`) VALUES ('$date','$id_destination','$id_users','$nom','$prenom','$mail')";
        $result = mysqli_query($conn,$query);
        $succes= "Votre réservation à bien été prise en compte";
    }
    else{
        $id_users=$_SESSION['userid'];
        $query = "INSERT INTO Reservations (`date`,`id_destination`,`id_users`,`nom`,`prenom`,`email`) VALUES ('$date','$id_destination','$id_users','$nom','$prenom','$mail')";
        $result = mysqli_query($conn,$query);
        $succes= "Votre réservation à bien été prise en compte";
    }
}
$i=2;
while(isset($_POST['name'.$i])){
    $lieu = $_POST['lieu'];
    $date = $_POST['date'];
    $nom=$_POST['name'.$i];
    $prenom=$_POST['firstname'.$i];
    $mail = $_POST['mail'.$i];
    $id_users = $_SESSION['userid'];
    $query = "SELECT id_destination FROM Destinations WHERE nom='$lieu'";
    $result = mysqli_query($conn,$query);
    $row= mysqli_fetch_assoc($result);
    $id_destination=$row['id_destination'];
    $query = "SELECT * FROM Users WHERE email='$mail'";
    $result = mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count==1){
        $row= mysqli_fetch_assoc($result);
        $id_users = $row['id_users'];
        $query = "INSERT INTO Reservations (`date`,id_destination,id_users,nom,prenom,email) VALUES ('$date','$id_destination','$id_users','$nom','$prenom','$mail')";
        $result = mysqli_query($conn,$query);
        $succes= "Vos réservations ont bien été prise en compte";
    }
    else{
        $id_users=$_SESSION['userid'];
        $query = "INSERT INTO Reservations (`date`,id_destination,id_users,nom,prenom,email) VALUES ('$date','$id_destination','$id_users','$nom','$prenom','$mail')";
        $result = mysqli_query($conn,$query);
        $succes= "Vos réservations ont bien été prise en compte";
    }
    $i+=1;
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
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <title>Reservation</title>
</head>
<body>
<?php
include "sidebarconnect.php";

?>
         <?php foreach($succes as $a): ?>
                    <div class ="succes"  position:fixed>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <?php echo $a?>
                    </div>
        <?php endforeach;
        $succes=array();
        ?>
<div class="main-block">
    <form method="post" action="#">
                <h4><b>Réservation</b></h4>
                <hr>
                <h5 class="formname"> Lieu  </h5>
                    <select id ="lieu" name="lieu"class="form-select form-select lieu" aria-label=".form-select-lg example" required="true">
                    <option selected="" value="">Sélectionner le lieu</option>
                    <?php 
                    $query = "SELECT * FROM Destinations";
                    $result = mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        printf("<option value=\"%s\">%s</option>",$row['nom'],$row['nom']);
                    }
                     ?>
                    </select>
                <h5 class="formname"> Date</h5>
                    <input type="date" class="date" id="date" name="date" value="xx-xx-xxxx" required>
                <span id="form">
                
                <h5 class="formname"> Nom  </h5>
                    <input type="text"  id="name" name="name" placeholder="Entrez votre nom " required>
                <hr>
                <h5 class="formname"> Prénom </h5>
                    <input type="text"  id="firstname" name="firstname" placeholder="Entrez votre prénom" required>
                <hr>
                <h5 class="formname"> Mail </h5>
                    <input type="email"  id="mail" name="mail" placeholder="Entrez votre mail" required>
                <hr>

                
                </span>
                <button onclick="champ()" class="add"> Ajouter une personne </button>
                <button type="submit" class="btn btn-dark btn-block connect">Valider</button>
    </form>
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

var i = 1;
function champ() {
 
i+=1;
      
var addfield = "<hr><h5 class='formname'> Nom   </h5> <input type='text'  id='name"+i+ "' name='name"+i+"'  placeholder='Entrez votre nom' required><hr><h5 class='formname'> Prénom </h5><input type='text'  id='firstname"+i+"' name='firstname"+i+"' placeholder='Entrez votre prénom' required><hr><h5 class='formname'> Mail </h5><input type='email'  id='mail"+i+"' name='mail"+i+"' placeholder='Entrez votre mail' required> <hr>"
 document.getElementById('form').innerHTML += addfield;
      
 }

</script>
</body>