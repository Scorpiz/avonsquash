<?php
session_start();
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){
    include "includes/header.php";
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
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
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