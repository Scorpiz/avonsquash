<?php
include "includes/header.php";
include "includes/functions.php";
?>
    <!-- Nav -->
<body>
    <header>
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
    </header>
    <!-- /Nav -->
<!-- Carousel --> 
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

<!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="assets/img/background/cat1.jpg" alt="...">
            <div class="carousel-caption">
                <h3>chat1</h3>
                <p>descriptionchat1</p>
            </div>
        </div>
        <div class="item">
            <img src="assets/img/background/cat2.jpg" alt="...">
            <div class="carousel-caption">
                <h3>chat2</h3>
                <p>descriptionchat2</p>
            </div>
        </div>
        <div class="item">
            <img src="assets/img/background/cat3.jpg" alt="...">
            <div class="carousel-caption">
                <h3>chat3</h3>
                <p>descriptionchat3</p>
            </div>
        </div>
<!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicons glyphicons-225-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicons glyphicons-224-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</body>



























<?php 
include "includes/footer.php";
?>