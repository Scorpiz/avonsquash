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
    </div>
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
            <?php $formules = viewFormule(0, 1, 0);
            foreach ($formules as $key=>$formule) {
                $tarifs = viewTarif($formule['id_f']); ?>
                <div class="col-sm-12">
                    <div class="pricing">
                        <div class="price-head">
                            <?php if(!empty($formule['titre'] || $formule['sous_titre'])){ ?>
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

            <?php $formules0 = viewFormule(1, 1, 0);
            foreach ($formules0 as $key=>$formule0) {
                $tarifs0 = viewTarif($formule0['id_f']); ?>
                <div class="col-sm-6">
                    <div class="pricing">
                        <div class="price-head">
                            <span class="price-title"><?= $formule0['titre'] ?></span>
                            <p class="subtitle"><?= $formule0['sous_titre'] ?></p>
                        </div>
                        <?php foreach ($tarifs0 as $keyTarif=>$tarif0) {
                            if($keyTarif == 0){ ?>
                                <ul class="price-content">
                                    <?php if($tarif0['libelle_s'] != 'Aucun statut'){ ?>
                                        <h2 class="title-status"><?= $tarif0['libelle_s'] ?></h2>
                                    <?php } ?>
                                    <li>
                                        <p class="description"><?= $tarif0['libelle_ta'] ?></p>
                                        <?php if(!empty($tarif0['prix'])){ ?>
                                            <p class="price-amount"><?= $tarif0['prix'] ?> €</p>
                                        <?php } ?>
                                        <p class="comment"><?= $tarif0['commentaire'] ?></p>
                                    </li>
                                </ul>
                            <?php }else if ($tarifs0[$keyTarif - 1]['libelle_s'] == $tarif0['libelle_s']){ ?>
                                <ul class="price-content">
                                    <li>
                                        <p class="description"><?= $tarif0['libelle_ta'] ?></p>
                                        <?php if(!empty($tarif0['prix'])){ ?>
                                            <p class="price-amount"><?= $tarif0['prix'] ?> €</p>
                                        <?php } ?>
                                        <p class="comment"><?= $tarif0['commentaire'] ?></p>
                                    </li>
                                </ul>
                            <?php }else{ ?>
                                <ul class="price-content">
                                    <?php if($tarif0['libelle_s'] != 'Aucun statut'){ ?>
                                        <h2 class="title-status"><?= $tarif0['libelle_s'] ?></h2>
                                    <?php } ?>
                                    <li>
                                        <p class="description"><?= $tarif0['libelle_ta'] ?></p>
                                        <?php if(!empty($tarif0['prix'])){ ?>
                                            <p class="price-amount"><?= $tarif0['prix'] ?> €</p>
                                        <?php } ?>
                                        <p class="comment"><?= $tarif0['commentaire'] ?></p>
                                    </li>
                                </ul>
                            <?php }
                            } ?>
                    </div>
                </div>
            <?php } ?>

            <!-- /tarif -->

        </div>
        <!-- Row -->


        <!-- Row -->
        <div class="row md-padding">

            <!-- Informations complémentaires -->

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Informations complémentaires</h2>
            </div>
            <!-- /Section header -->

            <?php $formulesInfo = viewFormule(1, 1, 1);
            foreach ($formulesInfo as $key=>$formuleInfo) {
                $tarifsInfo = viewTarif($formuleInfo['id_f']); ?>
                <div class="col-sm-4">
                    <div class="pricing">
                        <div class="price-head">
                            <?php if(!empty($formuleInfo['titre'] || $formuleInfo['sous_titre'])){ ?>
                                <span class="price-title"><?= $formuleInfo['titre'] ?></span>
                                <p class="subtitle"><?= $formuleInfo['sous_titre'] ?></p>
                            <?php } ?>
                        </div>
                        <?php foreach ($tarifsInfo as $keyTarifInfo=>$tarifInfo) {
                            if(!empty($tarifInfo['prix'])){ ?>
                            <ul class="info-content-priced">
                                <li>
                                    <p class="description"><?= $tarifInfo['libelle_ta'] ?></p>

                                    <p class="price-amount"><?= $tarifInfo['prix'] ?> €</p>

                                    <p class="comment"><?= $tarifInfo['commentaire'] ?></p>
                                </li>
                            </ul>
                            <?php }else{ ?>
                                <ul class="info-content">
                                    <li>
                                        <p class="description"><?= $tarifInfo['libelle_ta'] ?></p>
                                        <p class="comment"><?= $tarifInfo['commentaire'] ?></p>
                                    </li>
                                </ul>
                            <?php }
                             } ?>
                    </div>
                </div>
            <?php } ?>

            <!-- /Informations complémentaires -->
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