<html>
<body>

<h1>Ajouter un client</h1>

<form action="AjouterClient.php?pageDavant=ad" method="post">

    <label for="civilite">Civilité :</label>
    <input type="text" name="civilite"  value=""/><br />
    <label for="nom">Nom :</label>
    <input type="text" name="nom"  value=""/><br />
    <label for="prenom">Prenom :</label>
    <input type="text" name="prenom"  value=""/><br />
    <label for="mail">email :</label>
    <input type="text" name="mail"  value=""/><br />
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

    <br><br><br>

    <input type="submit" value="Ajouter"/>
</form>

</body>
</html>
