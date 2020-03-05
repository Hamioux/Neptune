<html>
<?php
require ('fonctions.php');


$chambre = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $bdd = getDataBase();


    $chambre = getChambre($bdd, $id);

}
if ($chambre == null)  {

    echo "Chambre non trouvée";
} else {


    ?>

    <form action="updateChambre.php?id=<?= $id ?>" method="post">
        <label for="prix">prix par nuit :</label>
        <input type="text" name="prix" value="<?= $chambre->prix ?>"/><br/><br/>
        <label for="description">description :</label>
        <textarea type="text" name="description"  rows="12" cols="55"><?= $chambre->description ?></textarea><br/><br/>
        <label for="nbPersonne">capacité :</label>
        <input type="text" name="nbPersonne" value="<?= $chambre->capacite ?>"/><br/><br/>
        <label for="exposition">exposition :</label>
        <input type="text" name="exposition" value="<?= $chambre->exposition ?>"/><br/><br/>
        <label for="etage">étage :</label>
        <input type="text" name="etage" value="<?= $chambre->etage ?>"/><br/><br/>

        <input type="submit" value="Valider"/>
    </form>

    <?php
}

?>

</html>