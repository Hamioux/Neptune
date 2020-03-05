<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    
<head>
    <meta charset="utf-8">
    <title>Monprofil</title>
    <link rel="stylesheet" href="../css/profil.css">
    </head>
    <body>
    
    <?php
    require_once ("fonctions.php");


    $bdd = getDataBase();
    $id=$_SESSION['id'];

    $client = getClient($bdd, $id);
    $idpays = $client->pays_id;
    $pays = getPays($bdd,$idpays);
    if ($client and $pays) {
        ?>

        <h1>Mon profil</h1>
        <p id="nom"> <?= $client->nom ?></p>
        <p id="prenom"> <?= $client->prenom ?></p>
        <p id="mail"> <?= $client->mail ?></p>
        <p id="adresse"> <?= $client->adresse ?> </p>
        <p id="ville"><?= $client->ville ?> </p>
        <p id="pays"><?=$pays->nom ?></p>
        <a href="editionprofil.php"><input id ="bouton3" class="bouton" type="submit" name="modifer profil" value="modifier son profil"></a>
        <a href="../index.php"><input type="submit" name="" value="se déconnecter"></a>
        <?php
    } else {
        ?>

        <?php
    }
    ?>
   




</div>

</body>
</html>