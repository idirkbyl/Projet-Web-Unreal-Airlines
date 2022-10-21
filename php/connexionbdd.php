<?php 
function Opencon(){

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "UnrealAirlines";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Echec de la connexion %s\n". $conn -> error);
    return $conn;

}

function Closecon($conn){
    $conn -> close();
}

$erreur= array();

?>
