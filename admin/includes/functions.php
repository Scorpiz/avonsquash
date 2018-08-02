<?php
/* Affichage Statut, Formule, Tarif, Info Agence*/
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
 /* changement info agence */
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
/* Affichage horaire + update, delete ajout */

function viewHoraire(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM horaire");
    $req->execute();
    return $req->fetchAll();
}

function addHoraire($jour, $heure){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO horaire(jour, heure) VALUES(:jour, :heure)");
    $req->execute(array(
        ':jour' => $jour,
        ':heure' => $heure
    ));
    return $req->fetchAll();
}

function updateHoraire($jour, $heure, $id_h){
    global $bdd;
    $req = $bdd->prepare("UPDATE horaire SET jour = ?, heure = ? WHERE id_h='".$id_h."'");
    $req->execute(array(
        $jour,
        $heure
    ));
}

function deleteHoraire($id_h){
    global $bdd;
    $req = $bdd->prepare("DELETE FROM horaire WHERE id_h =".$id_h);
    $req->execute();
}

/* Affichage info admin, changement tarif partie admin */
function viewInfoAdmin(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM users");
    $req->execute();
    return $req->fetchAll();
}

function viewChangFormule(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM formule");
    $req->execute();
    return $req->fetchAll();
}

function viewChangTarif() {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM tarif, statut, formule WHERE tarif.id_s = statut.id_s AND tarif.id_f = formule.id_f ORDER BY statut.libelle_s");
    $req->execute();
    return $req->fetchAll();
}

/* Partenaire */
function viewPartenaire(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM partenaire");
    $req->execute();
    return $req->fetchAll();
}

function addPartenaire($part, $logo, $com, $lien){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO partenaire(partenaire, logo, commentaire, lien) VALUES('".$part."','".$logo."','".$com."','".$lien."')");
    $req->execute();
    return $req->fetchAll();
}

function deletePartenaire($id_part) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM partenaire WHERE id_part=".$id_part);
    $req -> execute();
}
function updatePartenaire($part, $logo, $com, $lien){
    global $bdd;
    $req = $bdd->prepare("UPDATE partenaire SET partenaire = ?, logo = ?, commentaire = ?, lien = ? WHERE id_part=".id_part);
    $req->execute(array(
        $part,
        $logo,
        $com,
        $lien
    ));
}

/* Ajout, suppression, modification d'admins */
function addAdmin($login, $email, $mdp) {
    global $bdd;
    $req = $bdd->prepare("INSERT INTO users(login, email, mdp) VALUES('".$login."','".$email."','".$mdp."')");
    $req -> execute();
    return $req->fetchAll();
}
function deleteAdmin($id_admin) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM users WHERE id_u=".$id_admin);
    $req -> execute();
    $req->execute();
}
function updateAdmin($id_u, $login, $email,$mdp){
    global $bdd;
    $req = $bdd->prepare ("UPDATE users SET login = ?, email = ?, mdp = ? WHERE id_u=".$id_u);
    $req->execute(array(
        $login,
        $email,
        $mdp
        ));
}

/* Formule */
function addFormule($titreF, $sousTitreF){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO formule(titre, sous_titre) VALUES('".$titreF."', '".$sousTitreF."')");
    $req->execute();
    return $req->fetchAll();
}

function deleteFormule($id_f) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM formule WHERE id_f=".$id_f);
    $req->execute();
}

function addStatus($libelle_s, $menu){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO statut(libelle_s, in_menu) VALUES('".$libelle_s."', '".$menu."')");
    $req->execute();
    return $req->fetchAll();
}

function deleteStatus($id_s) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM statut WHERE id_s=".$id_s);
    $req->execute();
}

function addTarif($Tariflibelle, $Tarifcommentaire, $Tarifprix, $Tarifstatut, $Tarifformule){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO tarif(libelle_ta, commentaire, prix, id_s, id_f) VALUES('".$Tariflibelle."', '".$Tarifcommentaire."', '".$Tarifprix."', '".$Tarifstatut."', '".$Tarifformule."')");
    $req->execute();
    return $req->fetchAll();
}

function deleteTarif($id_ta) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM tarif WHERE id_ta=".$id_ta);
    $req->execute();
}

?>






































