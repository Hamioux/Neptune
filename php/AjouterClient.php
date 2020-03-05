<html>

<?php
require ('fonctions.php');
$bdd = getDataBase();

// Insertion dans la table
$query = "INSERT INTO clients(civilite,nom,prenom,adresse,codePostal,ville,pays_id,mail,mdp)
          VALUES(:c_civilite, :c_nom, :c_prenom,:c_adresse,:c_codePostal,:c_ville,:c_pays,:c_mail,:c_mdp)";


$idPays = getIdPays($bdd,$_POST['pays']);
if($idPays==0){
 echo "désolé nous n'avons pas trouvé le pays";
    if(isset($_GET['pageDavant']) and $_GET['pageDavant'] == 'ad'){
        ?><br><br><a href="comptes.php"><input class="bouton" type="submit" value="réessayer"></a><?php
    }elseif (isset($_GET['pageDavant']) and $_GET['pageDavant'] =='ut'){
        ?><br><br><a href="connexion.php"><input class="bouton" type="submit" value="réessayer"></a><?php
    }

}else{


    $statement = $bdd->prepare($query);


    $statement->bindParam(':c_civilite', $_POST['civilite']);
    $statement->bindParam(':c_nom', $_POST['nom']);
    $statement->bindParam(':c_prenom', $_POST['prenom']);
    $statement->bindParam(':c_adresse', $_POST['adresse']);
    $statement->bindParam(':c_codePostal', $_POST['codePostal']);
    $statement->bindParam(':c_ville', $_POST['ville']);
    $statement->bindParam(':c_pays', $idPays);
    $statement->bindParam(':c_mail', $_POST['mail']);
    $statement->bindParam(':c_mdp', $_POST['mdp']);

    $mailBdd = null;
    $mailEntrer = $_POST['mail'];
    $mailBdd = getMail($bdd,$mailEntrer);


    if($mailEntrer == $mailBdd){
        echo 'ce mail existe déjà';
        if(isset($_GET['pageDavant']) and $_GET['pageDavant'] == 'ad'){
            ?><br><br><a href="comptes.php"><input class="bouton" type="submit" value="réessayer"></a><?php
        }elseif (isset($_GET['pageDavant']) and $_GET['pageDavant'] =='ut'){
            ?><br><br><a href="connexion.php"><input class="bouton" type="submit" value="réessayer"></a><?php
        }

    }else{

        if ($statement->execute()) {
            if(isset($_GET['pageDavant']) and $_GET['pageDavant'] == 'ad'){
                header('Location: comptes.php?ins=1');
            }elseif (isset($_GET['pageDavant']) and $_GET['pageDavant'] =='ut'){
                header('Location: connexion.php?ins=1');
            }

        }else {
            echo "Essayes encore !";
        }

    }
}




?>

</html>
