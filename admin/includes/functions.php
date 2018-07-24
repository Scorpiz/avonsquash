<?php
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

function viewTarif($id_f, $deletable){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM tarif t, statut s WHERE t.id_s = s.id_s AND  t.id_f = '".$id_f."' AND can_be_deleted = '".$deletable."' ORDER BY libelle_s");
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
    $req = $bdd->prepare("UPDATE agence SET email = ?, telephone = ?, numero = ?, rue = ?, cp = ?, ville = ? lien_map = ?");
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
?>