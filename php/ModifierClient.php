<html>
<body>

<h1>Modifier un client</h1>

<?php
require ('fonctions.php');

$client = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Etape 1 : Obtention de l'objet PDO
    $bdd = getDataBase();
    // Etape 2
    $query = "SELECT * FROM clients WHERE id=:c_id";
    // Etape 2.1
    $statement = $bdd->prepare($query);
    // Etape 2.2
    $statement->bindParam(':c_id', $id);
    // Etape 2.3
    if ($statement->execute()) {

        $client = $statement->fetch(PDO::FETCH_OBJ);
        $paysId = $client->pays_id;
        $pays = getPays($bdd, $paysId);

    }
}if ($client == null)  {

    echo "Client non trouvé";
} else {



?>

<form action="UpdateClient.php" method="post">
    <label for="civilite">Civilité :</label>
    <input type="text" name="civilite" value="<?= $client->civilite ?>"/><br />
    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="<?= $client->nom ?>"/><br />
    <label for="prenom">Prenom :</label>
    <input type="text" name="prenom" value="<?= $client->prenom ?>"/><br />
    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" value="<?= $client->adresse ?>"/><br />
    <label for="codePostal">Code Postal :</label>
    <input type="text" name="codePostal" value="<?= $client->codePostal ?>"/><br />
    <label for="ville">Ville :</label>
    <input type="text" name="ville" value="<?= $client->ville ?>"/><br />
    <label for="pays">Pays :</label>
    <input type="text" name="pays" value="<?= $pays->nom ?>"/><br />

    <input type="hidden" name="id" value="<?= $client->id ?>"/><br />


    <input type="submit" value="Valider"/>
</form>

<?php
}
?>