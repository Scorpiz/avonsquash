<?php 
    include "includes/header.php"; ?>
            <?php $infoAdmin = viewInfoAdmin(); ?>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-header">
                            <div class="panel-title">Compte admin</div>

                            <div class="panel-options">
                                <a href="#" data-toggle="modal" data-target="#ModalInfo"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                        <div class="content-box-large box-with-header">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>identifiant </th>
                                        <th>Adresse email</th>
                                        <th>Supprimer</th>
                                        <th>Modifier</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $infoAdmin['login'] ?></td>
                                        <td><?= $infoAdmin['email'] ?></td>
                                        <td><button type="submit" class="btn btn-danger" name="refuse_demande">Supprimer</button></td>
                                        <td><button type="submit" class="btn btn-success" name="accept_demande">Modifier</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<?php    include "includes/footer.php"; ?>