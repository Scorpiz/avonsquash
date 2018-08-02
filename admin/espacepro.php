<?php 
session_start();
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){

    include "includes/header.php"; ?>
<div class="col-md-10">
        <div class="row">  				
            <div class="col-md-12">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Changement photo, titre et description</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="fas fa-plus-circle"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>Photo</th>
				                  <th>Titre</th>
				                  <th>Description</th>
				                  <th>Afficher ou Masquer</th>
                                  <th>Supprimer ou Modifier</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td></td>
				                  <td></td>
				                  <td></td>
                                  <td><button type="submit" class="btn btn-danger" name="">Supprimer</button></td>
                                  <td><button type="submit" class="btn btn-success" name="">Modifier</button></td>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
        </div>
    </div>


<?php
} else{
    header("Location:login.php");
}    
include "includes/footer.php"; ?>