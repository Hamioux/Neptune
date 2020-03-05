<?php
session_start();

require ('fonctions.php');
$bdd = getDataBase();
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM clients, pays WHERE clients.pays_id= pays.id AND clients.id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville']) {
      $newville = htmlspecialchars($_POST['newville']);
      $insertville = $bdd->prepare("UPDATE clients SET ville = ? WHERE id = ?");
      $insertville->execute(array($newville, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }

      if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
         $newmail = htmlspecialchars($_POST['newmail']);
         $insertmail = $bdd->prepare("UPDATE clients SET mail = ? WHERE id = ?");
         $insertmail->execute(array($newmail, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      }
      
      if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse']) {
         $newadresse = htmlspecialchars($_POST['newadresse']);
         $insertadresse = $bdd->prepare("UPDATE clients SET adresse = ? WHERE id = ?");
         $insertadresse->execute(array($newadresse, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      }
      if(isset($_POST['newname']) AND !empty($_POST['newname']) AND $_POST['newname'] != $user['name']) {
        $newname = htmlspecialchars($_POST['newname']);
        $insertname = $bdd->prepare("UPDATE pays SET nom = ? WHERE id = ?");
        $insertname->execute(array($newname, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
}
      

   

               
         if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND $_POST['newmdp'] != $user['mdp']) {
            $newmdp = htmlspecialchars($_POST['newmdp']);
            $insertmdp = $bdd->prepare("UPDATE clients SET mdp = ? WHERE id = ?");
            $insertmdp->execute(array($newmdp, $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
         }
        if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $bdd->prepare("UPDATE clients SET clients.nom = ? WHERE id = ?");
        $insertnom->execute(array($newnom, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
}
        if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
            $newprenom = htmlspecialchars($_POST['newprenom']);
            $insertprenom = $bdd->prepare("UPDATE clients SET prenom = ? WHERE id = ?");
            $insertprenom->execute(array($newprenom, $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
}

        

    
   

?>
<html>
   <head>
      <title>edition profil</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../css/editionprofil.css">
   </head>
   <body>
      <header>
         <h2>Edition de mon profil</h2>
         </header>
         <main>
      <?php   
    $id=$_SESSION['id'];

    $client = getClient($bdd, $id);
    $idpays = $client->pays_id;
    $pays = getPays($bdd,$idpays);
    if ($client and $pays) {
        ?>
        <div id=monprofil>

        <h1>Mon profil</h1>
        <p id="nom"> <?= $client->nom ?></p>
            <p id="prenom"> <?= $client->prenom ?> </p>
        <p id="mail"> <?= $client->mail ?></p>
        <p id="adresse"> <?= $client->adresse ?> </p>
        <p id="ville"><?= $client->ville ?> </p>
            <p id="pays.nom"><?= $pays->nom ?> </p>

        </div>
       
        
         <div>
         <?php
    } else {
        ?>
        
        <?php
    }
    ?>
         
      



 
        <div>
            <form method="POST" action="" enctype="multipart/form-data">
                <label>Nom:</label>
                <input type="text" name="newnom" placeholder="nom"  /> <br /><br />
                <label>Prenom:</label>
                <input type="text" name="newprenom" placeholder="prenom"  /> <br /><br />
               <label>Email:</label>
               <input type="text" name="newmail" placeholder="email"  /> <br /><br />
               <label>Mot de passe :</label> 
               <input type="password" name="newmdp" placeholder="mdp"/><br /><br />
               <label>Ville :</label>
               <input type="text" name="newville" placeholder="ville"  /><br /><br />
               <label>adresse:</label>
               <input type="text" name="newadresse" placeholder="adresse"  /> <br /><br />
                <label for="pays">Pays :</label>
                <select type="select" name="newname">
                    <option valeur="France">France</option>
                    <option valeur="Grande-Bretagne">Grande-Bretagne</option>
                    <option valeur="Belgique">Belgique</option>
                    <option valeur="Suisse">Suisse</option>
                </select>
                <br>

               <input type="submit" value="Mettre à jour mon profil !" />

               
            </form>
           
            
         </div>
      </div>
      </main>

<?php   
}




else {
   header("Location: connexion.php");
}
?>

<a href="profil.php"><input type="submit" name="" value="Retour au profil"></a>
      <a href="supprimerProfil.php"><input type="submit" name="" value="Supprimer mon profil"></a>

   </body>
</html>