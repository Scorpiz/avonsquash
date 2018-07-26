<?php
session_start();

try //Connexion à la bdd
{
    $bdd = new PDO("mysql:host=localhost;dbname=avon;charset=UTF8","root","");
}
catch(Exception $e)
{
    die ("Erreur de la connexion à la bdd");
}


require "includes/functions.php";

switch($_GET['type']){
    case "hor":
        $jour = $_POST['jour_update'];
        $heure = $_POST['heure_update'];
        $id_d = $_GET["id"];
        updateHoraire($jour, $heure, $id_d);
        header("location:admin.php");
        break;
}
?>