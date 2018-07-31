<?php
include "includes/header.php";
include "includes/functions.php";
?>
<body>
    <header>
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
    </header>
<!-- Contact -->
<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Notre histoire</h2>
            </div>
            <div class="col-sm-12">
                <div style="text-align:center;">
                        <img src="assets/img/background/cat3.jpg" alt="..." style="display:inline-block;padding-right:150px;">
                        <p style="display:inline-block;">blabla</p>
                </div>
            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Contact -->
</body>


























<?php 
include "includes/footer.php";
?>