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

function viewFormule($is_del_f){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM formule WHERE can_be_deleted ='".$is_del_f."' ORDER BY can_be_deleted");
    $req->execute();
    return $req->fetchAll();
}

function viewTarif($id_f){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM tarif t, statut s WHERE t.id_s = s.id_s AND  t.id_f = '".$id_f."' ORDER BY s.libelle_s, can_be_deleted");
    $req->execute();
    return $req->fetchAll();
}

function viewAgenceInfos(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM agence");
    $req->execute();
    return $req->fetch();
}

function viewhoraire(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM date,horaire WHERE date.id_d = horaire.id_d");
    $req->execute();
    return $req->fetchAll();
}
?>