<?php
session_start();
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){
    include "includes/header.php";

    if(isset($_POST['submit'])){
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $num = htmlspecialchars($_POST['num']);
        $rue = htmlspecialchars($_POST['rue']);
        $cp = htmlspecialchars($_POST['cp']);
        $ville = htmlspecialchars($_POST['ville']);

        updateInfos($email, $tel, $num, $rue, $cp, $ville);
    }
    ?>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-header">
                            <div class="panel-title">Logo </div>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                            </div>
                        </div>
                        <div class="content-box-large box-with-header">
                            <form method="post">
                                <label class="btn btn-warning btn-xs">
                                    Choisir un fichier <input name="logo" type="file"  style="display: none">
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- info agence -->
            <?php $infos = viewAgenceInfos(); ?>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-header">
                            <div class="panel-title">Info Agence</div>

                            <div class="panel-options">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-cog"></i></a>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $infos['email'] ?></td>
                                        <td><?= $infos['telephone'] ?></td>
                                        <td><?= $infos['numero']." ".$infos['rue']."<br>".$infos['cp']." ".$infos['ville'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modifier les informations</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="post" action="#">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Téléphone" name="tel">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Numéro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Numéro" name="num">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Rue</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Rue" name="rue">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Code postal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Code postal" name="cp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ville</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Ville" name="ville">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- /Modal -->

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
    </div>
    </div>
    </div>
    <?php
} else{
    header("Location:login.php");
}
include "includes/footer.php";
?>