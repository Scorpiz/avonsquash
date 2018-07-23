<?php

try //Connexion à la bdd
{
$bdd = new PDO("mysql:host=localhost;dbname=avon","root","");
}
catch(Exception $e)
{
die ("Erreur de la connexion à la bdd");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Administration</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="../assets/css/magnific-popup.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css" />



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>