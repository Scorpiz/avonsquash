<?php 
    include "includes/header.php"; ?>
<div class="col-md-10">
    <div class="row">
            <!-- Changement Formule -->
        <div class="col-md-6">
                <?php $ChangFormule = viewChangFormule(); ?>
            <div class="content-box-large">
                <div class="content-box-hearder panel-heading">
                    <div class="panel-title">Changement Formule</div>
                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titre formule</th>
                                <th>Sous titre formule</th>
                                <th>Afficher ou Masquer</th>
                                <th>Supprimer</th>
                                <th>Modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($ChangFormule as $key=>$ChangFormule) {
                                        if (!empty($ChangFormule['titre'])){?>
                                <td><?= $ChangFormule['titre'] ?> </td>
                                <?php }else{ ?>
                                <td> Aucun titre </td>
                                <?php } ?>
                                <td><?= $ChangFormule['sous_titre']?></td>
                                <td></td>
                                <td><button type="submit" class="btn btn-danger" name="">Supprimer</button></td>
                                <td><button type="submit" class="btn btn-success" name="">Modifier</button></td>
                            </tr> <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </div>

            <!-- Changement Statut -->
<?php $ChangStatut = viewStatus(); ?>

    <div class="row">
            <div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="content-box-hearder panel-heading">
							<div class="panel-title">Changement Statut</div>
							<div class="panel-options">
								<a href="#" data-rel="reload"><i class="fas fa-plus-circle"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>Statut</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr><?php foreach ($ChangStatut as $key=>$ChangStatut) { ?>
				                  <td><?= $ChangStatut['libelle_s'] ?></td>
				                </tr> <?php } ?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
    </div>
        <!-- Changement tarifs -->
<?php $ChangeTarif = viewChangTarif(); ?>
  				<div class="col-md-12">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Changement Tarif</div>
							
							<div class="panel-options">
								<a href="#" data-rel="reload"><i class="fas fa-plus-circle"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>Libelle Tarif</th>
				                  <th>Commentaire</th>
				                  <th>Prix</th>
				                  <th>Afficher ou Masquer</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr><?php foreach ($ChangeTarif as $key=>$ChangeTarif) { ?>
				                  <td><?= $ChangeTarif['libelle_ta']?></td>
				                  <td><?= $ChangeTarif['commentaire']?></td>
				                  <td><?= $ChangeTarif['prix']?></td>
				                  <td></td>
				                </tr> <?php } ?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
</div>



























<?php    include "includes/footer.php"; ?>