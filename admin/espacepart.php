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
                            echo "Ajout effectuer";
                            addPartenaire($part, $com);
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
                                <th>Commentaire</th>
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
                                    <td><?= $par['commentaire'] ?></td>
                                    <td></td>
                                    <td><a href="delete.php?type=delpar&id=<?= $par['id_part'] ?> "type="submit" class="btn btn-danger" name="">Supprimer</a></td>
                                    <td><button type="submit" class="btn btn-success" name="">Modifier</button></td>
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


    <?php    include "includes/footer.php"; } ?>