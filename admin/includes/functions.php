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
    $req = $bdd->prepare("SELECT * FROM date, horaire WHERE date.id_d = horaire.id_d");
    $req->execute();
    return $req->fetchAll();
}

function updateHoraire($jour, $heure, $id_d){
     global $bdd;
    $req = $bdd->prepare("UPDATE date, horaire SET date.jour = ?, horaire.heure = ? WHERE date.id_d='".$id_d."'");
    $req->execute(array(
        $jour,
        $heure
    ));
}

function addJour($jour){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO date(jour) VALUES(:jour)");
    $req->execute(array(
        ':jour' => $jour
    ));
    return $req->fetchAll();
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
function addHeure($heure, $jour){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO horaire(heure, id_d) VALUES('".$heure."', (SELECT id_d FROM date WHERE jour ='".$jour."'))");
    $req->execute();
    return $req->fetchAll();
}


function deleteHoraire($id_d){
    global $bdd;
    $req = $bdd->prepare("DELETE FROM horaire WHERE id_d =".$id_d);
    $req->execute();
    $req2 = $bdd->prepare("DELETE FROM date WHERE id_d =".$id_d);
    $req2->execute();
}

?>






































