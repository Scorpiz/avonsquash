<?php
session_start();
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){
    include "includes/header.php";

    /* ajout admin */
    if(isset($_POST['addAdmin'])){
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars(sha1($_POST['mdp']));
        $confirmmdp = htmlspecialchars(sha1($_POST['confirmmdp']));
        if($mdp == $confirmmdp){
            echo "Ajout effectuer";
            addAdmin($login, $email, $mdp);
        } else {
            echo "Les mots de passes ne correspondent pas"; }
    }
    /* Update admin */
    if(isset($_POST['submitUpAd'])){
        $id_u = $_POST["data-id-admin"];
        $login = htmlspecialchars($_POST['loginupdate']);
        $email = htmlspecialchars($_POST['emailupdate']);
        $mdp = htmlspecialchars(sha1($_POST['mdpupdate']));
        $confirmmdp = htmlspecialchars(sha1($_POST['confirmmdpupdate']));

        if($mdp == $confirmmdp){
            echo "Changement effectuer";
        updateAdmin($id_u, $login, $email, $mdp);
        }else { echo "Les mots de passes ne correspondent pas"; }
    }
    ?>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="content-box-header">
                    <div class="panel-title">Compte admin</div>

                    <div class="panel-options">
                        <a href="#" data-toggle="modal" data-target="#modalAddAdmin"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>identifiant </th>
                                <th>Adresse email</th>
                                <th>Modifier infos et mot de passe</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr> <?php   $infosAdmin = viewInfoAdmin();
                                foreach ($infosAdmin as $key=>$infoAdmin) { ?>
                                <td><?= $infoAdmin['login'] ?></td>
                                <td><?= $infoAdmin['email'] ?></td>                               <td><button type="submit" class="btn btn-success updateadp" data-toggle="modal" data-target="#modalEditadmin" data-id="<?= $infoAdmin['id_u'] ?>">Modifier</button></td>
                                <?php if($infoAdmin['lvl']!=2){ ?>
                                    <td><a href="delete.php?type=delad&id=<?= $infoAdmin['id_u'] ?> "type="submit" class="btn btn-danger" name="">Supprimer</a></td>
                                <?php } ?>

                            </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add admin -->
    <div class="modal fade" id="modalAddAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un compte admin </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Login</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="login">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Mot de passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="mdp">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Confirmation mot de passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirmmdp">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="addAdmin">Enregistrer</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Modal update admin -->
    <div class="modal fade" id="modalEditadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modification d'un compte admin</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Login</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="login" name="loginupdate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="email" name="emailupdate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Mot de passe</label>
                            <div class="col-sm-10">
                                <input type=password class="form-control" placeholder="Mot de passe" name="mdpupdate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Confirmation mot de passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Confirmation mot de passe" name="confirmmdpupdate">
                            </div>
                        </div>
                        <input type="hidden" name="data-id-admin" id="updateadp" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="submitUpAd">Enregistrer</button>
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