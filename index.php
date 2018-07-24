<?php
include "includes/header.php";
include "includes/functions.php";
?>
    <body>
<!-- Header -->
<header id="home">
    <!-- Background Image -->
    <div class="bg-img">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="index.php">
                        <img class="logo" src="http://avonsquash.com/wp-content/uploads/2018/01/cropped-Squash-Logo.jpg" alt="logo">
                        <img class="logo-alt" src="http://avonsquash.com/wp-content/uploads/2018/01/cropped-Squash-Logo.jpg" alt="logo">
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
                <li><a href="#home">Accueil</a></li>
                <li><a href="#blog">News</a></li>
                <li><a href="#pricing">Tarifs</a></li>
                <li><a href="#">Espace pro</a></li>
                <li><a href="https://resa-avonsquash.deciplus.pro/">Réservez</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <!-- /Main navigation -->

        </div>
    </nav>
    <!-- /Nav -->

    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="main-color">SQUASH & MORE</h1>
                        <p class="white-text">Le plus australien des clubs de squash français.</p><br>
                        <h3 class="main-color">Horaires d'ouverture</h3>
                        <?php $horaires = viewhoraire(); 
                        foreach ($horaires as $key=>$horaire) {
                        ?>
                        <p class="white-text"> <?= $horaire['jour']." ". $horaire['heure'] ?></p>
                        <?php } ?>
                    </div>
                    <!-- /home content -->
                </div>
            </div>
        </div>
        <!-- /home wrapper -->

</header>
<!-- /Header -->
    
<!-- Blog -->
<div id="blog" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">News récentes</h2>
            </div>
            <!-- /Section header -->

            <!-- blog -->
            <div class="col-md-4">
                <div class="blog">

                </div>
            </div>
            <!-- /blog -->

            <!-- blog -->
            <div class="col-md-4">
                <div class="blog">

                </div>
            </div>
            <!-- /blog -->

            <!-- blog -->
            <div class="col-md-4">
                <div class="blog">

                </div>
            </div>
            <!-- /blog -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Blog -->
<!-- Tarifs -->

<div id="pricing" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Tarifs</h2>
            </div>
            <!-- /Section header -->

            <!-- tarif -->
            <?php $formules = viewFormule(0);
            foreach ($formules as $key=>$formule) {
                $tarifs = viewTarif($formule['id_f']); ?>
            <div class="col-sm-12">
                <div class="pricing">
                    <div class="price-head">
                        <?php if(!empty($formule['titre'] && $formule['sous_titre'])){ ?>
                        <span class="price-title"><?= $formule['titre'] ?></span>
                        <p class="subtitle"><?= $formule['sous_titre'] ?></p>
                    <?php } ?>
                    </div>
                    <?php foreach ($tarifs as $keyTarif=>$tarif) {?>
                    <ul class="price-content">
                        <li>
                            <p class="description"><?= $tarif['libelle_ta'] ?></p>
                            <p class="price-amount"><?= $tarif['prix'] ?> €</p>
                            <p class="comment"><?= $tarif['commentaire'] ?></p>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
                <?php } ?>

            <?php $formules0 = viewFormule(1);
            foreach ($formules0 as $key=>$formule0) {
                $tarifs0 = viewTarif($formule0['id_f'], 1); ?>
                <div class="col-sm-6">
                    <div class="pricing">
                        <div class="price-head">
                            <span class="price-title"><?= $formule0['titre'] ?></span>
                            <p class="subtitle"><?= $formule0['sous_titre'] ?></p>
                        </div>
                        <?php foreach ($tarifs0 as $keyTarif=>$tarif0) {?>
                            <ul class="price-content">
                                <h2 class="title-status"><?= $tarif0['libelle_s'] ?></h2>
                                <li>
                                    <p class="description"><?= $tarif0['libelle_ta'] ?></p>
                                    <p class="price-amount"><?= $tarif0['prix'] ?> €</p>
                                    <p class="comment"><?= $tarif0['commentaire'] ?></p>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <!-- /tarif -->


        </div>
        <!-- Row -->

    </div>
    <!-- /Container -->

</div>

<!-- /Tarifs -->
<!-- Contact -->
<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Nous contacter</h2>
            </div>
            <!-- /Section-header -->
            <?php $infos = viewAgenceInfos(); ?>
            
            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-phone"></i>
                    <h3>Téléphone</h3>
                    <p><?= $infos['telephone'] ?></p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p><?= $infos['email'] ?></p>
                </div>
            </div>
            <!-- /contact -->


            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                   <a href="<?= $infos['lien_map']?>"> 
                    <i class="fa fa-map-marker"></i>
                    <h3>Adresse</h3>
                    <p><?= $infos['numero']." ".$infos['rue']."<br>".$infos['cp']." ".$infos['ville'] ?></p>
                    </a>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-2">
                <form class="contact-form" method="get" action="mailto:<?= $infos['email'] ?>">
                    <input type="text" class="input" placeholder="Nom">
                    <input type="email" class="input" placeholder="Email">
                    <input type="text" class="input" placeholder="Sujet">
                    <textarea class="input" placeholder="Message"></textarea>
                    <button class="main-btn">Envoyer</button>
                </form>
            </div>
            <!-- /contact form -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Contact -->

<?php
include "includes/footer.php";
?>