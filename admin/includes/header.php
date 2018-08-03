<?php
    require "includes/functions.php";

try //Connexion à la bdd
{
    $bdd = new PDO("mysql:host=localhost;dbname=avon;charset=UTF8","root","");
}
catch(Exception $e)
{
    die ("Erreur de la connexion à la bdd");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Administration - Avonsquash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="assets/css/styles.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="admin.php">Administration - Avonsquash</a></h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="navbar navbar-inverse" role="banner">
                 <a href="logout.php"><button type="button" class="btn btn-default navbar-btn">Se déconnecter</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="admin.php"><i class="glyphicon glyphicon-home"></i>Accueil / Info Agence</a></li>
                    <li><a href="tarif.php"><i class="glyphicon glyphicon-calendar"></i> Tarifs</a></li>
                    <li><a href="espacepro.php"><i class="glyphicon glyphicon-stats"></i>Espace Pro</a></li>
                    <li><a href="espacepart.php"><i class="glyphicon glyphicon-list"></i>Espace Partenaire</a></li>
                    <li><a href="adminprofil.php"><i class="glyphicon glyphicon-record"></i>Profil Admin</a></li>
                  <!--  <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                    <li class="submenu">
                        <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                        </a>
                        <!-- Sub menu -->
            <!--           <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul> -->
            </div>
        </div>