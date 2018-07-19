<?php
session_start();
include "header.php";
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){
    ?>

    <nav class="navbar  bg-light">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Retour</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>


    <?php
} else {
    header("Location:login.php");
}
include "footer.php";
?>