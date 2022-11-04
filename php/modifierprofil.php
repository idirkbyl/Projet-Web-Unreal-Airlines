<?php 

try{$nom=$_POST['name'];
$prenom=$_POST['firstname'];
$bd=$_POST['birthdate'];
$username=$_POST['username'];
$email=$_POST['mail'];
$tel=$_POST['tel'];
$userid = $_SESSION['userid'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];


if($password==$confirm){
    $conn = Opencon();
    $query = "UPDATE Users SET mdp='$password' WHERE id_users=$userid";
    $result = mysqli_query($conn, $query);
    Closecon($conn);



    if($nom!=""){
        $conn = Opencon();
        $query = "UPDATE Users SET nom='$nom' WHERE id_users=$userid";
        $result = mysqli_query($conn, $query);
        array_push($succes,"Vos informations ont bien été modifiées");
        Closecon($conn);
    }

    if($prenom!=""){
        $conn = Opencon();
        $query = "UPDATE Users
                    SET prenom='$prenom'
                        WHERE id_users=$userid";
        $result = mysqli_query($conn, $query);
        array_push($succes,"Vos informations ont bien été modifiées");
        Closecon($conn);
    }

    if($bd!=""){
        $conn = Opencon();
        $query = "UPDATE Users
                    SET birth_date='$bd'
                        WHERE id_users=$userid";
        $result = mysqli_query($conn, $query);
        array_push($succes,"Vos informations ont bien été modifiées");
        Closecon($conn);
    }

    if($email!=""){
        $conn = Opencon();
        $query = "UPDATE Users
                    SET email='$email'
                        WHERE id_users=$userid";
        $result = mysqli_query($conn, $query);
        array_push($succes,"Vos informations ont bien été modifiées");
        Closecon($conn);
    }
    if($tel!=""){
        $conn = Opencon();
        $query = "UPDATE Users
                    SET tel='$tel'
                        WHERE id_users=$userid";
        $result = mysqli_query($conn, $query);
        array_push($succes,"Vos informations ont bien été modifiées");
        Closecon($conn);
    }

    if($username!=""){
        $conn = Opencon();
        $query = "UPDATE Users
                    SET username='$username'
                        WHERE id_users=$userid";
        $result = mysqli_query($conn, $query);
        array_push($succes,"Vos informations ont bien été modifiées");
        Closecon($conn);
        $_SESSION['username'] = $username;
    }}}
    catch(Exception $e){
        echo $e;
    }
?>
