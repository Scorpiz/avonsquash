
<?php
session_start();
try //Connexion à la bdd
{
    $bdd = new PDO("mysql:host=localhost;dbname=avon;charset=UTF8","root","");
}
catch(Exception $e)
{
    die ("Erreur de la connexion à la bdd");
}

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="../assets/css/magnific-popup.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css" />



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
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

<!-- jQuery Plugins -->
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="../assets/js/main.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.bgswitcher.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>

</body>

</html>
