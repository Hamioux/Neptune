<?php

function getDataBase()
{
    try {$bdd = new PDO('mysql:host=mysql2.montpellier.epsi.fr;
        port=5306;
        dbname=Neptune;
        charset=utf8',
            'sarah.machado',
            '122KMP',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); } catch (Exception $exception) {
        $bdd = null;
    }
    return $bdd;
}


function getAllChambres(PDO $bdd)
{
    $query = "SELECT * 
              FROM chambres,tarifs WHERE tarifs.id=chambres.tarif_id";
    $chambres = null;
    $statement = $bdd->prepare($query);
    if ($statement->execute()) {
        $chambres = $statement->fetchAll(PDO::FETCH_OBJ);
        // Fermeture de la ressource
    }
    $statement->closeCursor();
    return $chambres;
}

function getChambre(PDO $bdd, $numero) {

    $query = "SELECT * 
              FROM chambres,tarifs WHERE tarifs.id=chambres.tarif_id and numero = :p_num";
    $chambre = null;
    $statement = $bdd->prepare($query);
    $statement->bindParam("p_num", $numero);
    if ($statement->execute()){
        $chambre = $statement->fetch(PDO::FETCH_OBJ);
    }
    $statement->closeCursor();
    return $chambre;
}


function getAllClient(PDO $bdd){
    $query="SELECT * FROM clients";
    $clients=null;
    $statement = $bdd->prepare($query);
    if ($statement->execute()) {
        $clients = $statement->fetchAll(PDO::FETCH_OBJ);
        // Fermeture de la ressource
    }
    $statement->closeCursor();
    return $clients;

}
function getClient(PDO $bdd, $id){
    $query="SELECT * FROM clients WHERE id=:c_id";
    $client=null;
    $statement = $bdd->prepare($query);
    $statement->bindParam("c_id", $id);
    if ($statement->execute()) {
        $client = $statement->fetch(PDO::FETCH_OBJ);

    }
    $statement->closeCursor();
    return $client;

}

function getIdPays(PDO $bdd, $pays){
    $idPays = null;

    $query = "select id from pays where nom=:c_nomPays";
    $statement = $bdd->prepare($query);
    $statement->bindParam(':c_nomPays', $pays);
    if ($statement->execute()) {
        $idPays = $statement->fetch(PDO::FETCH_OBJ);

    }
    $statement->closeCursor();
    if ($idPays == null) {
        return 0;
    }else{
        return $idPays->id;
    }

}

function getMail(PDO $bdd, $mailEntrer){
    $mailBdd = null;
    $query = "select mail from clients where mail = :c_mail";
    $statement = $bdd->prepare($query);
    $statement->bindParam(':c_mail', $mailEntrer);
    if ($statement->execute()) {
        $mailBdd = $statement->fetch(PDO::FETCH_OBJ);
    }
    $statement->closeCursor();
    return $mailBdd;
}

function getPays(PDO $bdd, $paysId){
    $pays = null;
    $query = "select * from pays where id = :c_id";
    $statement = $bdd->prepare($query);
    $statement->bindParam(':c_id', $paysId);
    if ($statement->execute()) {
        $pays = $statement->fetch(PDO::FETCH_OBJ);
    }
    $statement->closeCursor();
    return $pays;
}


?>


