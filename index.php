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
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#blog">News</a></li>
                <li><a href="#pricing">Tarifs</a></li>
                <!--                <li><a href="espacepro.php">Espace pro</a></li> -->
                <li><a href="#contact">Contact</a></li>
                <li><a href="#partenaire">Partenaires</a></li>
                <li><a href="https://resa-avonsquash.deciplus.pro/">Réservez</a></li>
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
                        <h4><a href="apropos.php" class="btn btn-warning">Notre histoire</a></h4> <br>
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

<!--<!-- Blog -->
<!--<div id="blog" class="section md-padding">-->
<!---->
<!--    <!-- Container -->
<!--    <div class="container">-->
<!---->
<!--        <!-- Row -->
<!--        <div class="row">-->
<!---->
<!--            <!-- Section header -->
<!--            <div class="section-header text-center">-->
<!--                <h2 class="title">News récentes</h2>-->
<!--            </div>-->
<!--            <!-- /Section header -->
<!---->
<!--            <!-- blog -->
<!--            <div class="col-md-4">-->
<!--                <div class="blog">-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- /blog -->
<!---->
<!--            <!-- blog -->
<!--            <div class="col-md-4">-->
<!--                <div class="blog">-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- /blog -->
<!---->
<!--            <!-- blog -->
<!--            <div class="col-md-4">-->
<!--                <div class="blog">-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- /blog -->
<!---->
<!--        </div>-->
<!--        <!-- /Row -->
<!---->
<!--    </div>-->
<!--    <!-- /Container -->
<!---->
<!--</div>-->
<!--<!-- /Blog -->
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

            <?php $statuts = viewStatus();
            foreach ($statuts as $keyStatut=>$statut) {?>
                <div class="col-sm-4">
                    <div class="pricing" data-statut="<?= $statut['id_s'] ?>">
                        <div class="price-head">
                            <span class="price-title bouton statut-menu"><?= $statut['libelle_s'] ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-sm-6">
                <div class="pricing" data-statut="10a">
                    <div class="price-head">
                        <span class="price-title bouton statut-menu">Espace pro</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="pricing" data-statut="11a">
                    <div class="price-head">
                        <span class="price-title bouton statut-menu">Informations complémentaires</span>
                    </div>
                </div>
            </div>

            <!--tarif-->
            <?php $formules0 = viewFormule(1, 0);
            foreach ($formules0 as $key=>$formule0) {
                $tarifs0 = viewTarif($formule0['id_f']);
                ?>
                <div class="parent-pricing-enfant col-sm-12">
                    <div class="pricing-enfant">
                        <div class="price-head">
                            <span class="price-title"><?= $formule0['titre'] ?></span>
                            <p class="subtitle"><?= $formule0['sous_titre'] ?></p>
                        </div>
                        <?php foreach ($tarifs0 as $keyTarif=>$tarif0) {
                            $transformIdStatus = transformIdStatus($formule0['id_f'], $tarif0['id_s']);
                            ?>
                            <ul class="price-content statut-<?= $transformIdStatus ?>">

                                <li>
                                    <p class="description"><?= $tarif0['libelle_ta'] ?></p>
                                    <?php if(!empty($tarif0['prix'])){ ?>
                                        <p class="price-amount"><?= $tarif0['prix'] ?> €</p>
                                    <?php } ?>
                                    <p class="comment"><?= $tarif0['commentaire'] ?></p>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <!--tarif-->
            <?php $formules0 = viewFormule(1, 1);
            foreach ($formules0 as $key=>$formule0) {
                $tarifs0 = viewTarif($formule0['id_f']);
                ?>
                <div class="parent-pricing-enfant col-sm-6">
                    <div class="pricing-enfant">
                        <div class="price-head">
                            <span class="price-title"><?= $formule0['titre'] ?></span>
                            <p class="subtitle"><?= $formule0['sous_titre'] ?></p>
                        </div>
                        <?php foreach ($tarifs0 as $keyTarif=>$tarif0) {
                            $transformIdStatus = transformIdStatus($formule0['id_f'], $tarif0['id_s']);
                            ?>
                            <ul class="price-content statut-<?= $transformIdStatus ?>">
                                <?php if($keyTarif != 0 && $tarifs0[$keyTarif - 1]['libelle_s'] == $tarif0['libelle_s']){

                                } else if($tarif0['libelle_s'] !== 'Aucun statut'){ ?>
                                    <p style="color: white;"> <?= $tarif0['libelle_s'] ?></p>
                                <?php } ?>
                                <li>
                                    <p class="description"><?= $tarif0['libelle_ta'] ?></p>
                                    <?php if(!empty($tarif0['prix'])){ ?>
                                        <p class="price-amount"><?= $tarif0['prix'] ?> €</p>
                                    <?php } ?>
                                    <p class="comment"><?= $tarif0['commentaire'] ?></p>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>


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
                    <i class="fa fa-map-marker"></i>
                    <h3>Adresse</h3>
                    <p><?= $infos['numero']." ".$infos['rue']."<br>".$infos['cp']." ".$infos['ville'] ?></p>
                    <a href="<?= $infos['lien_map']?>" class="btn btn-warning">Lien Google Map</a>
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

<!--Espace partenaire -->
<div id="partenaire" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Nos partenaires</h2>
            </div>
            <!-- /Section-header -->

            <!-- Listing partenaire -->
            <?php $part = viewPartenaire();
            foreach ($part as $key=>$par) { ?>
                <div class="col-sm-4">
                    <div class="partenaire">
                        <a href="<?= $par['lien'] ?>">
                            <img src="<?= $par['logo']?>">
                            <h3><?= $par['partenaire']?></h3>
                            <p><?= $par['commentaire']?></p>
                        </a>
                        <br>
                    </div>
                </div>
            <?php } ?>
            <!-- /listing partenaire -->

        </div>
        <!-- Row -->
    </div>
    <!-- Container -->
</div>
<!--/Espace partenaire-->
<?php
include "includes/footer.php";
?>
































