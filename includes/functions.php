<?php

function viewStatus($is_pro){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM statut WHERE is_pro = ".$is_pro);
    $req->execute();
    return $req->fetchAll();
}

function viewFormule($is_active, $is_info){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM formule WHERE is_active ='".$is_active."' AND is_info ='".$is_info."' ORDER BY can_be_deleted");
    $req->execute();
    return $req->fetchAll();
}

function viewTarif($id_f){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM tarif t, statut s WHERE t.id_s = s.id_s AND t.id_f = '".$id_f."' ORDER BY s.libelle_s, can_be_deleted");
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