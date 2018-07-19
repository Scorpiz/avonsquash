<?php   
session_start();//Assure d'utiliser la même session
session_destroy(); //destroy the session
header("location:../index.php"); //to redirect back to "link.php" after logging out
?>