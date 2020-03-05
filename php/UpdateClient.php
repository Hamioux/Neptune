<?php
require('fonctions.php');



$query = "UPDATE clients SET civilite=:c_civilite, nom=:c_nom,prenom=:c_prenom,
            adresse=:c_adresse,codePostal=:c_codePostal,ville=:c_ville WHERE id=:c_id";
$bdd = getDataBase();
// Etape 2.1 : prepare
$statement = $bdd->prepare($query);
// Etape 2.2 : paramètres

$statement->bindParam(':c_civilite', $_POST['civilite']);
$statement->bindParam(':c_nom', $_POST['nom']);
$statement->bindParam(':c_prenom', $_POST['prenom']);
$statement->bindParam(':c_adresse', $_POST['adresse']);
$statement->bindParam(':c_codePostal', $_POST['codePostal']);
$statement->bindParam(':c_ville', $_POST['ville']);
$statement->bindParam(':c_id', $_POST['id']);
// Etape 2.3 : exécution
if ($statement->execute()) {

    header('Location: comptes.php');
} else {
    echo "Essaye encore !";
}




