<?php
require ('fonctions.php');
$bdd = getDataBase();
$queryId = "SELECT * FROM clients WHERE mail=:Cmail";
session_start();
$mail = null;
$personne = null;
$lienPersonne = null;
$id = null;

if(isset($_GET['ins']) and $_GET['ins']==1){
    echo 'vous êtes enregistré! Vous pouvez maintenant vous connecter :)';
    $_GET['ins']=0;
}
?>

<html>
<head>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>
<div id="connexion">
    <h1>Connectez-vous!</h1>
    <form method="post" action="connexion.php">

        <label for="mail">email: </label>
        <input name="mail" type="text"/>

        <label for="mdp">mot de passe: </label>
        <input name="mdp" type="password"/>

        <input type="submit" value="valider"/>

    </form>

    <?php
    if(isset($_POST['mail']) and  isset($_POST['mdp'])){

        $mailEntree=$_POST['mail'];
        $mdpEntree=$_POST['mdp'];

        $statement = $bdd->prepare($queryId);

        $statement->bindParam(':Cmail', $mailEntree);

        if ($statement->execute()) {
            $clients = $statement->fetch(PDO::FETCH_OBJ);

            if(isset ($clients->mail) and isset($clients->mdp)){
                $mailBdd = $clients->mail;
                $mdpBdd=$clients->mdp;
            }

            if (isset ($mailBdd) and $mdpBdd == $mdpEntree){
                $id = $clients->id;
                $_SESSION['id']=$id;

                if($id == 162){
                    $personne = "ad.";
                }
                else{
                    $personne = "ut.";
                }
                header('Location: index.' . $personne . 'php');

            }else {
                echo 'le mot de passe ne correspond pas avec cette addresse mail';
            }


        }



    }

    ?>
    <br>
    <br>
    <a href="../index.php"><input class="bouton" type="submit" value="retour à l'index"></a>
</div>





<div id="nouveau">
    <h1>Nouveau? créez un compte!</h1>

    <form action="AjouterClient.php?pageDavant=ut" method="post">

        <label for="civilite">Civilité :</label>
        <input type="text" name="civilite"  placeholder="Madame/Monsieur"/><br />
        <label for="nom">Nom :</label>
        <input type="text" name="nom"  value=""/><br />
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom"  value=""/><br />
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse"  value=""/><br />
        <label for="codePostal">Code Postal :</label>
        <input type="text" name="codePostal"  value=""/><br />
        <label for="ville">Ville :</label>
        <input type="text" name="ville"  value=""/><br />
        <label for="pays">Pays :</label>
        <select type="select" name="pays">
            <option valeur="France">France</option>
            <option valeur="Grande-Bretagne">Grande-Bretagne</option>
            <option valeur="Belgique">Belgique</option>
            <option valeur="Suisse">Suisse</option>
        </select>

        <br><br>

        <label for="mail">email :</label>
        <input type="text" name="mail"  value=""/><br />
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp"  value=""/><br />

        <br>
        <input type="submit" value="S'inscrire"/>
    </form>


</div>









</body>


</html>