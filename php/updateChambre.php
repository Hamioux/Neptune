<?php
require ('fonctions.php');

$id= $_GET['id'];
$bdd = getDataBase();

$queryTarifs = "UPDATE tarifs,chambres
            SET prix =:Cprix 
            WHERE numero = :Cid
            ";


$statementTarifs = $bdd->prepare($queryTarifs);

$statementTarifs->bindParam(':Cprix', $_POST['prix']);
$statementTarifs->bindParam(':Cid', $id);




$queryChambre = "UPDATE chambres SET description =:Cdescription , capacite =:CnbPersonne , exposition =:Cexposition , etage =:Cetage
                WHERE numero = :Cid";

$statementChambre = $bdd->prepare($queryChambre);


$statementChambre->bindParam(':Cdescription', $_POST['description']);
$statementChambre->bindParam(':CnbPersonne', $_POST['nbPersonne']);
$statementChambre->bindParam(':Cexposition', $_POST['exposition']);
$statementChambre->bindParam(':Cetage', $_POST['etage']);
$statementChambre->bindParam(':Cid', $id);

$statementTarifs->execute();
$statementChambre->execute();

header('Location: chambre.ad.php?id='. $id);

?>