<html>
<body>

<a href="index.ad.php"><input class="bouton" type="submit" value="retour à l'index"></a>

<?php
require('fonctions.php');

// Etape 1 : Connexion au serveur
$bdd = getDataBase();
$clients = null;
if ($bdd) {
    // Etape 2 : Obtention des informations
    $clients = getAllClient($bdd);

    if ($clients) {
?>
        <button><a href="addClient.php">Ajouter un client</a></button><br><br><br>

            <table border="1">
                <thead>
                <th>Civilité</th>
                <th>NOM</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Mail</th>
                <th>Ville</th>
                <th>Pays</th>

                </thead>
                <tbody>
<?php
        foreach ($clients as $client) {
            $paysId = $client->pays_id;
            $pays = getPays($bdd, $paysId);


?>

                <tr>
                <td><?= $client->civilite ?></td>
                <td><?= $client->nom ?></td>
                <td><?= $client->prenom ?></td>
                <td><?= $client->adresse ?></td>
                <td><?= $client->codePostal?></td>
                <td><?= $client->mail?></td>
                <td><?= $client->ville ?></td>
                <td><?= $pays->nom ?></td>
                <td><a href="supprimerClient.php?id=<?= $client->id ?>">Supprimer</a></td>
                <td><a href="ModifierClient.php?id=<?= $client->id ?>">Modifier</a></td>
                </tr>


            <?php



        } ?>
                </tbody>
<?php

    } else {
        echo "Aucun résulat";
    }
} else {
    echo  "Erreur d'accès au serveur";
}
?>

</body>
</html>