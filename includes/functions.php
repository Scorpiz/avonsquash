<?php
function authentification(){
    if(!isset($_SESSION['connecte']))
        header("Location:login.php");
}

function viewStatus(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM statut");
    $req->execute();
    return $req->fetchAll();
}

function viewFormule(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM formule");
    $req->execute();
    return $req->fetchAll();
}

function viewTarif($id_f){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM tarif t, statut s WHERE t.id_s = s.id_s AND  t.id_f = '".$id_f."' ORDER BY libelle_s");
    $req->execute();
    return $req->fetchAll();
}
?>