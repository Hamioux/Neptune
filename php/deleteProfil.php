<?php
require ('fonctions.php');


session_start();
$id=$_SESSION['id'];
// Supprimer dans la table
$query = "DELETE FROM clients
            WHERE id= :c_id";

// Etape 1
$bdd = getDataBase();
// Etape 2.1 : prepare
$statement = $bdd->prepare($query);
// Etape 2.2 : paramètres
$statement->bindParam(':c_id', $id);
// Etape 2.3 : exécution
if ($statement->execute()) {
    // Rediriger vers la page de liste des clients
    header('Location: ../index.php');
} else {
    echo "Essaye encore !";
}




