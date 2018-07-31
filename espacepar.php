<?php
include "includes/header.php";
include "includes/functions.php";
?>
    <!-- Nav -->
    <nav id="nav" class="navbar">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="index.php">
                        <?php $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' ); ?>
                        <img class="logo" src="assets/img/logo.<?php $extensions_valides ?>" alt="logo">
                        <img class="logo-alt" src="assets/img/logo.<?php $extensions_valides ?>" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Collapse nav button -->
                <div class="nav-collapse">
                    <span></span>
                </div>
                <!-- /Collapse nav button -->
            </div>

            <!--  Main navigation  -->
            <ul class="main-nav nav navbar-nav navbar-right">
                <li><a href="index.php">Retour Accueil</a></li>
            </ul>
            <!-- /Main navigation -->

        </div>
    </nav>
    <!-- /Nav -->




























<?php 
include "includes/footer.php";
?>