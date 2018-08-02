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

?>