<?php

require ('fonctions.php');
?>
<a href="comptes.php"><input type="submit" name="" value="Annuler"></a>
<?php
$client = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Etape 1 : Obtention de l'objet PDO
    $bdd = getDataBase();
    $client = getClient($bdd, $id);
}

if ($client == null)  {

    echo "Client non trouvé";
} else {

    ?>
    <form action="deleteProfil.php" method="post">
        <label for="civilite">Civilité :</label>
        <input type="text" name="civilite" disabled value="<?= $client->civilite ?>"/><br/>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" disabled value="<?= $client->nom ?>"/><br/>
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" disabled value="<?= $client->prenom ?>"/><br/>
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" disabled value="<?= $client->adresse ?>"/><br/>
        <label for="mail">Mail :</label>
        <input type="text" name="mail" disabled value="<?= $client->mail ?>"/><br/>
        <label for="ville">Ville :</label>
        <input type="text" name="ville" disabled value="<?= $client->ville ?>"/><br/>
        <label for="pays">Pays :</label>
        <select type="select" name="newname" >
            <option disabled value="France">France</option>
            <option disabled value="Grande-Bretagne">Grande-Bretagne</option>
            <option disabled value="Belgique">Belgique</option>
            <option disabled value="Suisse">Suisse</option>
        </select>

        <input type="hidden" name="id" value="<?= $client->id ?>"/>
        <br/>
        <br/>

        <input type="submit" value="Supprimer"/>
    </form>

    <?php
}
?>