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
<<<<<<< HEAD
    if(isset($_POST['submitHoraire'])){
        $jour = htmlspecialchars($_POST['jour']);
        $heure = htmlspecialchars($_POST['heure']);
        
        updateHoraire($jour, $heure);
    }
    
    ?>
=======
>>>>>>> c21f177f89960d10e1273d1fcc56031b92f958fb

    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES['logo']['name'], '.')  ,1)  );

    if(isset($_POST['submitLogo'])) {
        $maxsize = 204800;
        $logo = "logo";
        if (in_array($extension_upload,$extensions_valides)) echo "Extension correcte";
        if ($_FILES['logo']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

        $nom = "../assets/img/{$logo}.{$extension_upload}";
        $resultat = move_uploaded_file($_FILES['logo']['tmp_name'],$nom);
        if ($resultat) echo "Transfert réussi";
    }


    ?>

    <!-- info agence -->

    <div class="col-md-10">
        <div class="row">
<<<<<<< HEAD
                   <!-- info agence -->
=======
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
                            <form method="post" action="#" enctype="multipart/form-data">
                                <div class="file-preview"></div>
                                <input type="hidden" name="MAX_FILE_SIZE" value="204800">
                                <label class="btn btn-warning btn-xs">
                                    Choisir un fichier <input name="logo" type="file" id="ImgInp" style="display: none">
                                </label>
                                <input type="submit" name="submitLogo">
                                <img id="blah" src="#" alt="your image" />
<!--                                <a href="assets/img/logo.--><?php //$extensions_valides ?><!--"><img src="../assets/img/miniatures/logo.--><?php //$extensions_valides ?><!--"></a>-->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- info agence -->
>>>>>>> c21f177f89960d10e1273d1fcc56031b92f958fb
            <?php $infos = viewAgenceInfos(); ?>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Horaire -->
            <div class="col-md-6">
                 <?php $infoH = viewHoraire(); ?>
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
                                        <th>Supprimer</th>
                                        <th>Modifier</th>
                                    </tr>
                                    </thead>
                                    <tbody><?php foreach ($infoH as $key=>$infoH) { ?>
                                    <tr> 
                                        <td><?= $infoH['jour'] ?></td>
                                        <td><?= $infoH['heure'] ?></td>
                                    <form method="post" action=""> 
                                        <td><button type="submit" class="btn btn-danger" name="supprimerHoraire">Supprimer</button></td>
                                        <td><button type="submit" class="btn btn-success" name="modifHoraire">Modifier</button></td> 
                                    </form>                                 
                                    </tr><?php } ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Logo -->
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
                            <form method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="MAX_FILE_SIZE" value="204800">
                                <label class="btn btn-warning btn-xs">
                                    Choisir un fichier <input name="logo" type="file"  style="display: none">
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
     
        </div>

<<<<<<< HEAD
        <!-- Modal info agence -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
=======
        <!-- Modal -->
        <div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
>>>>>>> c21f177f89960d10e1273d1fcc56031b92f958fb
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modifier les informations</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="#">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $infos['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Téléphone" name="tel" value="<?= $infos['telephone'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Numéro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Numéro" name="num" value="<?= $infos['numero'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Rue</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Rue" name="rue" value="<?= $infos['rue'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Code postal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Code postal" name="cp" value="<?= $infos['cp'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ville</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Ville" name="ville" value="<?= $infos['ville'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lien google map</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Lien" name="lien_map" value="<?= $infos['lien_map'] ?>">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="submitInfo">Enregistrer</button>
<<<<<<< HEAD
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- /Modal info agence -->
        
        <!-- Modal horaire -->
        <div class="modal fade" id="modalhoraire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modifier les Horaires</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="#">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Date/jour/durée</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $infoH['jour'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Heure</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Téléphone" name="tel" value="<?= $infoH['heure'] ?>">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="submitInfo">Enregistrer</button>
=======
>>>>>>> c21f177f89960d10e1273d1fcc56031b92f958fb
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