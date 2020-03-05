<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Chambre Double</title>
    <link rel="stylesheet" href="../css/chambre.ut.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC&display=swap" rel="stylesheet">
</head>
<body>
<?php
require_once ("fonctions.php");

$numero=$_GET['id'];

$bdd = getDataBase();
$chambre = getChambre($bdd, $numero);
$cetEtage = "0";


$etage=$chambre->etage;

if($etage == 1){
    $cetEtage = "1er";
}else {
    $cetEtage = $etage . "eme";
}


if ($chambre) {
?>
<img src="<?= $chambre->image1 ?>" id="fond">
<img src="../images/g.png" id="gris">
<a href="../php/index.ad.php"><img src="../images/home.png" id="index"></a>
<div id="carreG">
    <img src="<?= $chambre->image1 ?>" id="rond">
    <a href="modifierChambre.php?id=<?=$numero?>"><button type="button" id="bouton">modifier</button></a>
</div>
<div id="droite">


        <h1>chambre <?= $chambre->capacite ?> personnes, au <?= $cetEtage ?> étage avec vue sur <?= $chambre->exposition ?></h1>

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
