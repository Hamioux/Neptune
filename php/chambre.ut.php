<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Chambre Double</title>
    <link rel="stylesheet" href="../css/chambre.ut.css">
    <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC&display=swap" rel="stylesheet">
</head>
<body>


    <?php
        require_once ("fonctions.php");

        $bdd = getDataBase();
        $numero=$_GET['id'];

        $chambre = getChambre($bdd, $numero);
        if ($chambre) {
    ?>
    <img src="<?= $chambre->image1 ?>" id="fond">
    <img src="../images/g.png" id="gris">
    <a href="../php/index.ut.php"><img src="../images/home.png" id="index"></a>
    <div id="carreG">
        <img src="<?= $chambre->image1 ?>" id="rond">
        <a href="reservation.ut.php" id="hover"><button type="button" id="bouton">réserver</button></a>
    </div>
    <div id="droite">
    <h1>chambre <?= $chambre->capacite ?> personnes avec vue sur <?= $chambre->exposition ?></h1>
            <p id="description"> <?= $chambre->description ?></p>
            <p id="prix"> <?= $chambre->prix ?> € </p>
        <?php
        } else {
            ?>
            <p>Aucun résultat</p>
            <?php
        }
        ?>
</div>

</body>
</html>
