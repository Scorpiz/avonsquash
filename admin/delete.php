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
        $id_d = $_GET["id"];
        deleteHoraire($id_d);
        header("location:admin.php");
        break;
    case "delpar":
        $id_part = $_GET["id"];
        deletePartenaire($id_part);
        header("location:espacepart.php");
        break;
    case "form":
        $id_f = $_GET["id"];
        deleteFormule($id_f);
        header("location:tarif.php");
        break;
    case "stat":
        $id_s = $_GET["id"];
        deleteStatus($id_s);
        header("location:tarif.php");
        break;
    case "tar":
        $id_ta = $_GET["id"];
        deleteTarif($id_ta);
        header("location:tarif.php");
        break;
        break;
    case "delad":
        $id_admin = $_GET["id"];
        deleteAdmin($id_admin);
        header("location:adminprofil.php");
        break;
}

?>


