<?php

 /* Infos agence */

function viewAgenceInfos(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM agence");
    $req->execute();
    return $req->fetch();
}

function updateInfos($email, $tel, $num, $rue, $cp, $ville, $lien){
    global $bdd;
    $req = $bdd->prepare("UPDATE agence SET email = :email, telephone = :telephone, numero = :numero, rue = :rue, cp = :cp, ville = :ville, lien_map = :lien_map");
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':telephone', $tel, PDO::PARAM_STR);
    $req->bindValue(':numero', $num, PDO::PARAM_STR);
    $req->bindValue(':rue', $rue, PDO::PARAM_STR);
    $req->bindValue(':cp', $cp, PDO::PARAM_STR);
    $req->bindValue(':ville', $ville, PDO::PARAM_STR);
    $req->bindValue(':lien_map', $lien, PDO::PARAM_STR);
    $req->execute();
}

/* A propos */

function viewAPropos(){
    global $bdd;
    $req = $bdd->prepare("SELECT titre_histoire, description_histoire FROM agence");
    $req->execute();
    return $req->fetch();
}

function updateAPropos($titre, $desc){
    global $bdd;
    $req = $bdd->prepare("UPDATE agence SET titre_histoire = :titre_histoire, description_histoire = :description_histoire");
    $req->bindValue(':titre_histoire', $titre, PDO::PARAM_STR);
    $req->bindValue(':description_histoire', $desc, PDO::PARAM_STR);
    $req->execute();
}

/* Horaires */

function viewHoraire(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM horaire");
    $req->execute();
    return $req->fetchAll();
}

function addHoraire($jour, $heure){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO horaire(jour, heure) VALUES(:jour, :heure)");
    $req->bindValue(':jour', $jour, PDO::PARAM_STR);
    $req->bindValue(':heure', $heure, PDO::PARAM_STR);
    $req->execute();
    return $req->fetchAll();
}

function updateHoraire($jour, $heure, $id_h){
    global $bdd;
    $req = $bdd->prepare("UPDATE horaire SET jour = :jour, heure = :heure WHERE id_h=".$id_h);
    $req->bindValue(':jour', $jour, PDO::PARAM_STR);
    $req->bindValue(':heure', $heure, PDO::PARAM_STR);
    $req->execute();
}

function deleteHoraire($id_h){
    global $bdd;
    $req = $bdd->prepare("DELETE FROM horaire WHERE id_h =".$id_h);
    $req->execute();
}

/* Partenaire */
function viewPartenaire(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM partenaire");
    $req->execute();
    return $req->fetchAll();
}

function addPartenaire($part, $com, $lien, $logo){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO partenaire(partenaire, commentaire, lien, logo) VALUES(:partenaire, :commentaire, :lien, :logo)");
    $req->bindValue(':partenaire', $part, PDO::PARAM_STR);
    $req->bindValue(':commentaire', $com, PDO::PARAM_STR);
    $req->bindValue(':lien', $lien, PDO::PARAM_STR);
    $req->bindValue(':logo', $logo, PDO::PARAM_STR);
    $req->execute();
    return $req->fetchAll();
}

function deletePartenaire($id_part) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM partenaire WHERE id_part=".$id_part);
    $req -> execute();
}

function updatePartenaire($part, $com, $lien, $logo, $id_part){
    global $bdd;
    $req = $bdd->prepare("UPDATE partenaire SET partenaire = :partenaire, commentaire = :commentaire, lien = :lien, logo = :logo WHERE id_part=".$id_part);
    $req->bindValue(':partenaire', $part, PDO::PARAM_STR);
    $req->bindValue(':commentaire', $com, PDO::PARAM_STR);
    $req->bindValue(':lien', $lien, PDO::PARAM_STR);
    $req->bindValue(':logo', $logo, PDO::PARAM_STR);
    $req->execute();
}

/* Admins */
function viewInfoAdmin(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM users");
    $req->execute();
    return $req->fetchAll();
}

function addAdmin($login, $email, $mdp) {
    global $bdd;
    $req = $bdd->prepare("INSERT INTO users(login, email, mdp) VALUES(:login, :email, :mdp)");
    $req->bindValue(':login', $login, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $req->execute();
    return $req->fetchAll();
}
function deleteAdmin($id_admin) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM users WHERE id_u=".$id_admin);
    $req->execute();
    $req->execute();
}
function updateAdmin($id_u, $login, $email, $mdp){
    global $bdd;
    $req = $bdd->prepare ("UPDATE users SET login = :login, email = :email, mdp = :mdp WHERE id_u=".$id_u);
    $req->bindValue(':login', $login, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $req->execute();
}

/* Formules */

function viewChangFormule(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM formule ORDER BY can_be_deleted");
    $req->execute();
    return $req->fetchAll();
}

function addFormule($titreF, $sousTitreF){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO formule(titre, sous_titre) VALUES(:titre, :sous_titre)");
    $req->bindValue(':titre', $titreF, PDO::PARAM_STR);
    $req->bindValue(':sous_titre', $sousTitreF, PDO::PARAM_STR);
    $req->execute();
    return $req->fetchAll();
}

function deleteFormule($id_f) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM formule WHERE id_f=".$id_f);
    $req->execute();
}

function updateFormule($titreF, $sousTitreF, $id_f){
    global $bdd;
    $req = $bdd->prepare ("UPDATE formule SET titre = :titre, sous_titre = :sous_titre WHERE id_f=".$id_f);
    $req->bindValue(':titre', $titreF, PDO::PARAM_STR);
    $req->bindValue(':sous_titre', $sousTitreF, PDO::PARAM_STR);
    $req->execute();
}

/* Statuts */

function viewStatus(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM statut ORDER BY in_menu DESC");
    $req->execute();
    return $req->fetchAll();
}

function addStatus($libelle_s, $menu){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO statut(libelle_s, in_menu) VALUES(:libelle_s, :menu)");
    $req->bindValue(':libelle_s', $libelle_s, PDO::PARAM_STR);
    $req->bindValue(':menu', $menu, PDO::PARAM_STR);
    $req->execute();
    return $req->fetchAll();
}

function deleteStatus($id_s) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM statut WHERE id_s=".$id_s);
    $req->execute();
}

function updateStatus($libelle_s, $menu, $id_s){
    global $bdd;
    $req = $bdd->prepare ("UPDATE statut SET libelle_s = :libelle_s, in_menu = :in_menu WHERE id_s=".$id_s);
    $req->bindValue(':libelle_s', $libelle_s, PDO::PARAM_STR);
    $req->bindValue(':menu', $menu, PDO::PARAM_INT);
    $req->bindValue(':id_s', $id_s, PDO::PARAM_INT);
    $req->execute();
}

/* Tarifs */

function viewChangTarif() {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM tarif, statut, formule WHERE tarif.id_s = statut.id_s AND tarif.id_f = formule.id_f ORDER BY statut.libelle_s");
    $req->execute();
    return $req->fetchAll();
}

function addTarif($Tariflibelle, $Tarifcommentaire, $Tarifprix, $Tarifstatut, $Tarifformule){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO tarif(libelle_ta, commentaire, prix, id_s, id_f) VALUES(:libelle_ta, :commentaire, :prix, :id_s, :id_f)");
    $req->bindValue('libelle_ta', $Tariflibelle,PDO::PARAM_STR);
    $req->bindValue('commentaire', $Tarifcommentaire,PDO::PARAM_STR);
    $req->bindValue('prix', $Tarifprix,PDO::PARAM_STR);
    $req->bindValue('id_s', $Tarifstatut,PDO::PARAM_INT);
    $req->bindValue('id_f', $Tarifformule,PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll();
}

function deleteTarif($id_ta) {
    global $bdd;
    $req = $bdd->prepare("DELETE FROM tarif WHERE id_ta=".$id_ta);
    $req->execute();
}

function updateTarif($libelle_ta, $commentaire, $prix, $id_s, $id_f, $id_ta){
    global $bdd;
    $req = $bdd->prepare("UPDATE tarif SET libelle_ta = :libelle_ta, commentaire = :commentaire, prix = :prix, id_s = :id_s, id_f = :id_f WHERE id_ta=".$id_ta);
    $req->bindValue('libelle_ta', $libelle_ta,PDO::PARAM_STR);
    $req->bindValue('commentaire', $commentaire,PDO::PARAM_STR);
    $req->bindValue('prix', $prix,PDO::PARAM_STR);
    $req->bindValue('id_s', $id_s,PDO::PARAM_INT);
    $req->bindValue('id_f', $id_f,PDO::PARAM_INT);
    $req->execute();
}
?>






































