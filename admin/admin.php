<?php
session_start();
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){
    include "includes/header.php";

    if(isset($_POST['submitInfo'])){
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $num = htmlspecialchars($_POST['num']);
        $rue = htmlspecialchars($_POST['rue']);
        $cp = htmlspecialchars($_POST['cp']);
        $ville = htmlspecialchars($_POST['ville']);
        $lien = htmlspecialchars($_POST['lien_map']);

        updateInfos($email, $tel, $num, $rue, $cp, $ville, $lien);
    }

    if(isset($_POST['addHoraire'])){
        $jour = htmlspecialchars($_POST['jour']);
        $heure = htmlspecialchars($_POST['heure']);

        addHoraire($jour, $heure);
    }

    if(isset($_POST['updateHoraire'])){
        $jour = $_POST['jour_update'];
        $heure = $_POST['heure_update'];
        $id_h = $_POST["data-id-H"];

        updateHoraire($jour, $heure, $id_h);
    }

    if(isset($_POST['submitAPropos'])){
        $titre = htmlspecialchars($_POST['titre_info']);;
        $desc = htmlspecialchars($_POST['desc_info']);;

        updateAPropos($titre, $desc);
    }

    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
    $extension_upload = strtolower(substr(strrchr($_FILES['logo']['name'], '.'), 1));

    if(isset($_POST['submitLogo'])) {
        $maxsize = 10485760;
        $logo = "logo";
        if (in_array($extension_upload,$extensions_valides)) echo "Extension correcte";
        if ($_FILES['logo']['size'] > $maxsize) echo "Le fichier est trop gros";

        $nom = "../assets/img/{$logo}.{$extension_upload}";
        $resultat = move_uploaded_file($_FILES['logo']['tmp_name'],$nom);
        if ($resultat) echo "Transfert réussi";
    }
    ?>

    <div class="col-md-10">
        <div class="row">

            <!-- Horaire -->
            <div class="col-md-6">
                <?php $infoHs = viewHoraire(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-header">
                            <div class="panel-title">Horaire</div>

                            <div class="panel-options">
                                <a href="#" data-toggle="modal" data-target="#modalhoraire"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                        <div class="content-box-large box-with-header">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date/jour/durée</th>
                                        <th>Heure</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody><?php foreach ($infoHs as $key=>$infoH) { ?>
                                        <tr>
                                        <td><?= $infoH['jour'] ?></td>
                                        <td><?= $infoH['heure'] ?></td>
                                        <form method="post" action="">
                                            <td><button class="btn btn-primary updateBtnH" data-toggle="modal" data-target="#modalHoraireEdit" data-id="<?= $infoH['id_h'] ?>"><i class="far fa-edit"></i> Modifier</button></td>
                                            <td><a href="delete.php?type=hor&id=<?= $infoH['id_h'] ?>" class="btn btn-danger"><i class="fas fa-times"></i> Supprimer</a></td>
                                        </form>
                                        </tr><?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- info agence -->

            <?php $infos = viewAgenceInfos(); ?>
            <div class="col-md-6">
                <div class="content-box-header">
                    <div class="panel-title">Info Agence</div>
                    <div class="panel-options">
                        <a href="#" data-toggle="modal" data-target="#ModalInfo"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Lien google map</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $infos['email'] ?></td>
                                <td><?= $infos['telephone'] ?></td>
                                <td><?= $infos['numero']." ".$infos['rue']."<br>".$infos['cp']." ".$infos['ville'] ?></td>
                                <td><?= $infos['lien_map'] ?></td>
                            </tr>
                            </tbody>

                        </table>
                        <div class="panel-title" style="padding-bottom: 15px">Logo</div>
                        <form method="post" action="#" enctype="multipart/form-data">
                            <!--<div class="file-preview"></div>-->
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                            <label class="btn btn-warning btn-xs" for="inputFileLogo">
                                Choisir un fichier <input name="logo" type="file" id="inputFileLogo" style="display: none">
                            </label>
                            <input type="submit" name="submitLogo">
                            <!--<a href="assets/img/logo.--><?php //$extensions_valides ?><!--"><img src="../assets/img/miniatures/logo.--><?php //$extensions_valides ?><!--"></a>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- info A PROPOS-->

        <div class="col-md-6">
            <div class="content-box-header">
                <div class="panel-title">A propos</div>
                <div class="panel-options">
                    <a href="#" data-toggle="modal" data-target="#ModalAPropos"><i class="glyphicon glyphicon-cog"></i></a>
                </div>
            </div>
            <div class="content-box-large box-with-header">
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $infos['titre_histoire'] ?></td>
                            <td><?= $infos['description_histoire'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--
        <div class="row">
            <div class="col-md-12 panel-warning">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Photo fond Accueil</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
                    <br /><br />
                </div>
            </div>
        </div>
    -->
    </div>
    <!-- Modal info agence -->
    <div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modifier les informations</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="EmailInfo" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Email" name="email" id="EmailInfo" value="<?= $infos['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TelInfo" class="col-sm-2 control-label">Téléphone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Téléphone" name="tel" id="TelInfo" value="<?= $infos['telephone'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Numinfo" class="col-sm-2 control-label">Numéro</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Numéro" name="num" id="Numinfo" value="<?= $infos['numero'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Rueinfo" class="col-sm-2 control-label">Rue</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Rue" name="rue" id="Rueinfo" value="<?= $infos['rue'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="CPInfo" class="col-sm-2 control-label">Code postal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Code postal" name="cp" id="CPInfo" value="<?= $infos['cp'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="VilleInfo" class="col-sm-2 control-label">Ville</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Ville" name="ville" id="VilleInfo" value="<?= $infos['ville'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="LienGoogleInfo" class="col-sm-2 control-label">Lien google map</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Lien" name="lien_map" id="LienGoogleInfo" value="<?= $infos['lien_map'] ?>">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitInfo">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal info agence -->

    <!-- Modal A PROPOS -->
    <div class="modal fade" id="ModalAPropos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modifier les informations</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="TitreInfo" class="col-sm-2 control-label">Titre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="titre_info" id="TitreInfo" value="<?= $infos['titre_histoire'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="DescInfo" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="desc_info" id="DescInfo"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitAPropos">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal A PROPOS -->

    <!-- Modal horaire -->
    <div class="modal fade" id="modalhoraire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un Horaire</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="InputDate" class="col-sm-2 control-label">Date /jour /durée</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="jour" id="InputDate" name="jour">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputHeure" class="col-sm-2 control-label">Heure</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Heure" id="InputHeure" name="heure">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="addHoraire">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal --

    <!-- Modal modification horaire -->
    <div class="modal fade" id="modalHoraireEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modifier cet horaire</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="InputUpDate" class="col-sm-2 control-label">Date /jour /durée</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Jour" id="InputUpDate" name="jour_update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputUpHeure" class="col-sm-2 control-label">Heure</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Heure" id="InputUpHeure" name="heure_update">
                            </div>
                        </div>

                        <input type="hidden" name="data-id-H" id="updateH" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" name="updateHoraire" class="btn btn-primary">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal -->

    <?php
} else{
    header("Location:login.php");
}
include "includes/footer.php";
?>