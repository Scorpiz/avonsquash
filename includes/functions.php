<?php

function viewStatus(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM statut WHERE in_menu = 1");
    $req->execute();
    return $req->fetchAll();
}

function viewFormule($is_active){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM formule WHERE is_active ='".$is_active."' ORDER BY can_be_deleted");
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

function transformIdStatus($id_f, $id_s){
    if($id_f == 11 || $id_f == 10) {
        return $id_f . 'a';
    }  else {
        return $id_s;
    }
}
/* Partenaire */
function viewPartenaire(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM partenaire");
    $req ->execute();
    return $req->fetchAll();
}
?>