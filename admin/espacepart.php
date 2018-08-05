<?php
session_start();
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){

    include "includes/header.php"; ?>

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Espace Partenaire</div>
                        <!-- php -->
                        <?php

                        if(isset($_POST['addPartenaire'])){
                            $part = htmlspecialchars($_POST['part']);
                            $com = htmlspecialchars($_POST['com']);
                            $lien = htmlspecialchars($_POST['lien']);
                            $logo = htmlspecialchars($_POST['logo']);
                            addPartenaire($part, $com, $lien, $logo);
                            echo "Ajout effectuer";
                        }
                        if(isset($_POST['UpdatePart'])){
                            $id_part = $_POST["data-id-part"];
                            $part = htmlspecialchars($_POST['partup']);
                            $com = htmlspecialchars($_POST['comup']);
                            $lien = htmlspecialchars($_POST['lienup']);
                            $logo = htmlspecialchars($_POST['logoup']);

                            updatePartenaire($part, $com, $lien, $logo, $id_part);
                            echo "Modification effectuer";
                        }
                        ?>
                        <div class="panel-options">
                            <a href="#" data-toggle="modal" data-target="#modalAddPart"><i class="fas fa-plus-circle fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Commentaire</th>
                                <th>Lien site</th>
                                <th>Logo</th>

                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $part = viewPartenaire();
                            foreach ($part as $key=>$par) { ?>
                                <tr>
                                    <td><?= $par['partenaire'] ?></td>
                                    <td><?= $par['commentaire'] ?></td>
                                    <td><?= $par['lien'] ?></td>
                                    <td><?= $par['logo'] ?></td>

                                    <td><button type="submit" class="btn btn-primary updateBtnPart" data-toggle="modal" data-target="#modalEditPart" data-id="<?= $par['id_part'] ?>"><i class="far fa-edit"></i> Modifier</button></td>
                                    <td><a href="delete.php?type=delpar&id=<?= $par['id_part'] ?> "type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Supprimer</a></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add Partenaire -->
    <div class="modal fade" id="modalAddPart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter des partenaires</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Nom Partenaire</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nom partenaire" name="part">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Commentaire</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Commentaire/description" name="com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Lien</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Lien" name="lien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Logo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Url web de l'image" name="logo">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="addPartenaire">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal update Partenaire -->
    <div class="modal fade" id="modalEditPart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modification du partenaire</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Nom partenaire</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nom partenaire" name="partup">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Commentaire</label>
                            <div class="col-sm-10">
                                <input type=text class="form-control" placeholder="Commentaire/description" name="comup">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Lien</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Lien du site du partenaire" name="lienup">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Logo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  placeholder=" Url web de l'image" id="" name="logoup">
                            </div>
                        </div>

                        <input type="hidden" name="data-id-part" id="updatePart" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="UpdatePart">Enregistrer</button>
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
include "includes/footer.php"; ?>