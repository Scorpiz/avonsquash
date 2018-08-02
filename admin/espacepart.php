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
                            echo "Ajout effectuer";
                            addPartenaire($part, $logo, $com, $lien);
                        }
                        if(isset($_POST['UpdatePart'])){
                            $id_part = $_POST["data-id-part"];
                            $part = htmlspecialchars($_POST['partup']);
                            $com = htmlspecialchars($_POST['comup']);
                            $lien = htmlspecialchars($_POST['lienup']);
                            $logo = htmlspecialchars($_POST['logoup']);
                            echo "Modification effectuer";
                            updatePartenaire($part, $logo, $com, $lien);
                        }
                        ?>
                        <div class="panel-options">
                            <a href="#" data-toggle="modal" data-target="#modalAddPart"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Logo</th>
                                <th>Commentaire</th>
                                <th>Lien site</th>
                                <th>Afficher ou masquer</th>
                                <th>Supprimer</th>
                                <th>Modifier</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $part = viewPartenaire();
                            foreach ($part as $key=>$par) { ?>
                                <tr>
                                    <td><?= $par['partenaire'] ?></td>
                                    <td></td>
                                    <td><?= $par['commentaire'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="delete.php?type=delpar&id=<?= $par['id_part'] ?> "type="submit" class="btn btn-danger" name="">Supprimer</a></td>
                                    <td><button type="submit" class="btn btn-success" data-toggle="modal" data-target="modalEditPart" data-id="<?= $par['id_part'] ?>">Modifier</button></td>
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
                                <input type="text" class="form-control" name="part">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Commentaire</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="com">
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
                                <label for="" class="col-sm-2 control-label">Logo partenaire</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="logoup">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Commentaire/Description</label>
                                <div class="col-sm-10">
                                    <input type=password class="form-control" placeholder="Commentaire" name="comup">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Lien du site du partenaire</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="lien site" name="lienup">
                                </div>
                            </div>
                            <input type="hidden" name="data-id-part" id="updatepart" value="">
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