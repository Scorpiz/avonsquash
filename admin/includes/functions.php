<?php
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

function updateInfos($email, $tel, $num, $rue, $cp, $ville, $lien){
    global $bdd;
    $req = $bdd->prepare("UPDATE agence SET email = ?, telephone = ?, numero = ?, rue = ?, cp = ?, ville = ?, lien_map = ?");
    
    $req->execute(array(
        $email,
        $tel,
        $num,
        $rue,
        $cp,
        $ville,
        $lien
    ));
}
function viewHoraire(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM date,horaire WHERE date.id_d = horaire.id_d");
    $req->execute();
    return $req->fetchAll();
}
function updateHoraire($jour, $heure){
     global $bdd;
    $req = $bdd->prepare("UPDATE date, horaire SET date.jour = ?, horaire.heure = ?");
    $req->execute(array(
    $jour,
    $heure,
    ));  
}
function addHoraire($jour, $heure){
    global $bdd;
    $req1 = $bdd->prepare("INSERT into date VALUES(?) ");
    $req2 = $bdd->prepare("INSERT into horaire VALUES(?)");
    $req1->execute(array(
        $jour
    ));
    $req2->execute(array(
        $heure
    ));
}

function viewInfoAdmin(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM users");
    $req->execute();
    return $req->fetch();
}
function viewChangFormule(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM formule");
    $req->execute();
    return $req->fetchAll();
}
function viewChangTarif() {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM tarif");
    $req->execute();
    return $req->fetchAll();
}
?>






































