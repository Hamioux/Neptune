<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Neptune Hotel</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
<header>
    <h1>Neptune Hotel</h1>
    <div id=boutons>
        <a href="reservation.ad.php"><input type="submit" name="Contact " value="réservations"></a>
        <a href="comptes.php"> <input type="submit" name="lesComptes" value="les comptes"></a>
        <a href="../index.php"><input type="submit" name="Deconnexion" value="Déconnexion"></a>
    </div>
</header>
<main>
    <div id="fond"></div>
    <div id="pasFond">
        <h1>Chambres Disponnibles:</h1>
        <?php

        require('../php/fonctions.php');
        $bdd = getDataBase();
        $chambres = null;
        if($bdd){
            $chambres = getAllChambres($bdd);
            if ($chambres) {
                foreach ($chambres as $chambre) {
                    $numero=$chambre->numero;
                    ?>
                    <div id=images>
                        <img class="image" src="<?=$chambre->image1?>" alt="chambre3">
                        <img class="image" src="<?=$chambre->image2?>" alt="chambre3">
                        <img class="image" src="<?=$chambre->image3?>" alt="chambre3">
                    </div>
                    <div id="infos">

                        <p> <u>chambre n° <?= $numero?> </u></p>
                        <p> capacité de <?=$chambre->capacite?> personnes</p>
                        <p> exposition de la chambre: <?=$chambre->exposition?></p>
                        <p> <?php
                            if($chambre->douche==0){
                                echo("Ne possède pas de douche");
                            }else{
                                echo("Possède une douche");
                            }
                            ?></p>

                        <p> Etage <?=$chambre->etage?></p>
                        <p>  prix: <?=$chambre->prix?> €</p>
                        <a href="chambre.ad.php?id=<?=$numero?>"><input type="submit" name="Chambre " value="plus de détails"></a>

                    </div>
                    <br><br><br><br><br>
                    <?php
                }
            }else{
                echo 'chambres non trouvées';
            }
        }else{
            echo 'données non trouvées';
        }
        ?>
    </div>
</main>
</body>
</html>