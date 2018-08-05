<?php
session_start();
include "includes/header.php";

if(isset($_POST['submitAddFormule'])){
    $titreF = htmlspecialchars($_POST['titreF']);
    $sousTitreF = htmlspecialchars($_POST['sousTitreF']);

    addFormule($titreF, $sousTitreF);
    echo "Formule ajoutée";
}

if(isset($_POST['submitUpdateFormule'])){
    $titreF = htmlspecialchars($_POST['titreF_update']);
    $sousTitreF = htmlspecialchars($_POST['sousTitreF_update']);
    $id_f = htmlspecialchars($_POST["data-id-F"]);

    updateFormule($titreF, $sousTitreF, $id_f);
    echo "Formule éditée";
}

if(isset($_POST['submitAddStatut'])){
    $libelle_s = htmlspecialchars($_POST['libelleS']);
    $menu = htmlspecialchars($_POST['inMenu']);

    addStatus($libelle_s, $menu);
    echo "Statut ajouté";
}

if(isset($_POST['submitUpdateStatut'])){
    $libelle_s = htmlspecialchars($_POST['libelleS_update']);
    $menu = htmlspecialchars($_POST['inMenu_update']);
    $id_s = htmlspecialchars($_POST["data-id-S"]);

    updateStatus($libelle_s, $menu, $id_s);
    echo "Statut édité";
}

if(isset($_POST['submitAddTarif'])){
    $Tariflibelle = htmlspecialchars($_POST['Tariflibelle']);
    $Tarifcommentaire = htmlspecialchars($_POST['Tarifcommentaire']);
    $Tarifprix = htmlspecialchars($_POST['Tarifprix']);
    $Tarifstatut = htmlspecialchars($_POST['Tarifstatut']);
    $Tarifformule = htmlspecialchars($_POST['Tarifformule']);
var_dump($Tariflibelle, $Tarifcommentaire, $Tarifprix, $Tarifstatut, $Tarifformule);
    addTarif($Tariflibelle, $Tarifcommentaire, $Tarifprix, $Tarifstatut, $Tarifformule);
    echo "Tarif ajouté";
}
if(isset($_POST['submitUpdateTarif'])){
    $libelle_ta = htmlspecialchars($_POST['Tariflibelle_update']);
    $commentaire = htmlspecialchars($_POST['Tarifcommentaire_update']);
    $prix = htmlspecialchars($_POST['Tarifprix_update']);
    $id_s = htmlspecialchars($_POST['Tarifstatut_update']);
    $id_f = htmlspecialchars($_POST['Tarifformule_update']);
    $id_ta = htmlspecialchars($_POST["data-id-T"]);
    updateTarif($libelle_ta, $commentaire, $prix, $id_s, $id_f, $id_ta);
    echo "Tarif modifié";
}
?>
    <div class="col-md-10">
        <div class="row">
            <!-- Changement Formule -->
            <?php $ChangFormules = viewChangFormule(); ?>

            <div class="col-md-6">
                <div class="content-box-large">
                    <div class="content-box-hearder panel-heading">
                        <div class="panel-title">Changement Formule</div>
                        <div class="panel-options">
                            <a href="#" data-toggle="modal" data-target="#modalAddFormule"><i class="fas fa-plus-circle fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Titre formule</th>
                                <th>Sous titre formule</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php foreach ($ChangFormules as $key=>$ChangFormule) {
                                if (!empty($ChangFormule['titre'])){?>
                                    <td><?= $ChangFormule['titre'] ?> </td>
                                <?php } else { ?>
                                    <td> Aucun titre </td>
                                <?php } ?>
                                <td><?= $ChangFormule['sous_titre']?></td>
                                <td><button type="submit" class="btn btn-primary updateBtnFormule" data-toggle="modal" data-target="#modalEditFormule" data-id="<?= $ChangFormule['id_f'] ?>"><i class="far fa-edit"></i> Modifier</button></td>
                                <?php if($ChangFormule['can_be_deleted'] != 0) {?>
                                    <td><a href="delete.php?type=form&id=<?= $ChangFormule['id_f'] ?>" class="btn btn-danger"><i class="fas fa-times"></i> Supprimer</a></td>
                                <?php } ?>
                            </tr> <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Changement Statut -->
            <?php $ChangStatuts = viewStatus(); ?>

            <div class="col-md-6">
                <div class="content-box-large">
                    <div class="content-box-hearder panel-heading">
                        <div class="panel-title">Changement Statut</div>
                        <div class="panel-options">
                            <a href="#" data-toggle="modal" data-target="#modalAddStatut"><i class="fas fa-plus-circle fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Menu</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr><?php foreach ($ChangStatuts as $key=>$ChangStatut) { ?>
                                <td><?= $ChangStatut['libelle_s'] ?></td>
                                <?php if($ChangStatut['in_menu'] == 0){?>
                                    <td>Non</td>
                                <?php }else{ ?>
                                    <td>Oui</td>
                                <?php } ?>
                                <td><button type="submit" class="btn btn-primary updateBtnStatut" data-toggle="modal" data-target="#modalEditStatut" data-id="<?= $ChangStatut['id_s'] ?>"><i class="far fa-edit"></i> Modifier</button></td>
                                <td><a href="delete.php?type=stat&id=<?= $ChangStatut['id_s'] ?>" class="btn btn-danger"><i class="fas fa-times"></i> Supprimer</a></td>
                            </tr> <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Changement tarifs -->
        <?php $ChangTarifs = viewChangTarif(); ?>

        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Changement Tarif</div>

                    <div class="panel-options">
                        <a href="#" data-toggle="modal" data-target="#modalAddTarif"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Statut</th>
                            <th>Formule</th>
                            <th>Libelle Tarif</th>
                            <th>Commentaire</th>
                            <th>Prix</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><?php foreach ($ChangTarifs as $key=>$ChangTarif) { ?>
                            <td><?= $ChangTarif['libelle_s']?></td>
                            <td><?= $ChangTarif['titre']?></td>
                            <td><?= $ChangTarif['libelle_ta']?></td>
                            <td><?= $ChangTarif['commentaire']?></td>
                            <td><?= $ChangTarif['prix']?></td>
                            <form method="post" action="">
                                <td><button class="btn btn-primary updateBtnTarif" data-toggle="modal" data-target="#modalEditTarif" data-id="<?= $ChangTarif['id_ta'] ?>"><i class="far fa-edit"></i> Modifier</button></td>
                                <td><a href="delete.php?type=tar&id=<?= $ChangTarif['id_ta'] ?>" class="btn btn-danger"><i class="fas fa-times"></i> Supprimer</a></td>
                            </form>
                        </tr> <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal AJOUT FORMULE -->
    <div class="modal fade" id="modalAddFormule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajout d'une formule</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Titre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Titre" name="titreF">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Sous titre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Sous titre" name="sousTitreF">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitAddFormule">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal AJOUT FORMULE -->

    <!--    Modal EDIT FORMULE-->
    <div class="modal fade" id="modalEditFormule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modifier les informations</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Titre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Titre" name="titreF_update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Sous titre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Sous titre" name="sousTitreF_update">
                            </div>
                        </div>

                        <input type="hidden" name="data-id-F" id="updateF" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitUpdateFormule">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal EDIT FORMULE -->

    <!-- Modal AJOUT STATUT -->
    <div class="modal fade" id="modalAddStatut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajout d'un statut</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Libelle statut</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Libelle" name="libelleS">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-inMenu">Menu</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="select-inMenu" name="inMenu">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitAddStatut">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal AJOUT STATUT -->

    <!-- Modal EDIT STATUT -->
    <div class="modal fade" id="modalEditStatut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modifier le statut</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Libelle statut</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Libelle" name="libelleS_update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-inMenu">Menu</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="select-inMenu" name="inMenu_update">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="data-id-S" id="updateS" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitUpdateStatut">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal EDIT STATUT -->

    <!-- Modal AJOUT TARIF -->
    <div class="modal fade" id="modalAddTarif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un tarif</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Libelle Tarif</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Libelle" name="Tariflibelle">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Commentaire</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Commentaire" name="Tarifcommentaire">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Prix</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Prix" name="Tarifprix">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Formule</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="select-1" name="Tarifformule">
                                    <?php foreach($ChangFormules as $keyFormule => $ChangFormule){
                                        if (!empty($ChangFormule['titre'])){ ?>
                                            <option value="<?=$ChangFormule['id_f'] ?>"><?= $ChangFormule['titre']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-2">Statut</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="select-2" name="Tarifstatut">
                                    <?php foreach($ChangStatuts as $keyStatut => $ChangStatut){ ?>
                                        <option value="<?= $ChangStatut['id_s'] ?>"><?= $ChangStatut['libelle_s']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitAddTarif">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal AJOUT TARIF -->

    <!-- Modal EDIT TARIF -->
    <div class="modal fade" id="modalEditTarif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modifier le tarif</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Libelle Tarif</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Libelle" name="Tariflibelle_update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Commentaire</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Commentaire" name="Tarifcommentaire_update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Prix</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Prix" name="Tarifprix_update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Formule</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="select-1" name="Tarifformule_update">
                                    <?php foreach($ChangFormules as $keyFormule => $ChangFormule){
                                        if (!empty($ChangFormule['titre'])){ ?>
                                            <option value="<?=$ChangFormule['id_f'] ?>"><?= $ChangFormule['titre']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-2">Statut</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="select-2" name="Tarifstatut_update">
                                    <?php foreach($ChangStatuts as $keyStatut => $ChangStatut){ ?>
                                        <option value="<?= $ChangStatut['id_s'] ?>"><?= $ChangStatut['libelle_s']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="data-id-T" id="updateT" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitUpdateTarif">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /Modal EDIT TARIF -->

<?php    include "includes/footer.php"; ?>