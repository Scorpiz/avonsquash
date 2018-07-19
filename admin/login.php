
<?php
require "../includes/header.php";

if(isset($_POST['submit'])) /* Test de la variable */
{
    $login = $_POST['login'];
    $password =sha1($_POST['mdp']);

    $requete = $bdd->prepare("SELECT * FROM users WHERE login = :login AND mdp = :mdp"); /* select tout */
    $requete->execute(array(':login'=>$login,
        ':mdp'=>$password
    ));
    /* chech si tout les logins correspond a celui rentré dans le formulaire */
    /*chech les passw<ord correspondant*/
    if($resultat = $requete->fetch() ) { /* récup les valeurs dans la bdd */

        $_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $resultat['login'];
        $_SESSION['connecte']= true; /* permet d'activer la session connexter */
        header("Location:admin.php");
        /*  echo 'connection'; */
    }
    else {
        echo'Identifiants incorrect';
    }
}
?>

<div class="md-padding">
    <!-- Section header -->
    <div class="section-header text-center">
        <h2 class="title">Administration</h2>
    </div>
    <!-- /Section header -->

    <div class="login-form">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="#" method="post">
                        <input type="text" name="login" placeholder="Identifiant">
                        <input type="password" name="mdp" placeholder="Mot de passe">
                        <input class="login-btn" type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>