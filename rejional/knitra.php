<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Site Inscription des Stagiaires</h1>

<form action="ajouter.php" method="POST">
    <fieldset>
        <legend>Fiche Stagiaire :</legend>
        <label>Code :</label>
        <input type="text" name="code"  /><br><br>
        <label>Nom :</label>
        <input type="text" name="nom" /><br><br>
        <label>Prenom :</label>
        <input type="text" name="prenom" /><br><br>
        <input type="radio" name="sexe" value="homme" />Homme 
        <input type="radio" name="sexe" value="femme" />Femme <br><br>
        <label>Filiere :</label>
        <input type="text" name="filiere"/><br><br>
        <input type="reset" value="Effacer">
        <input type="submit" value="Envoyer"><br><br>
        <button type="submit">Ajouter</button>
        <button type="submit" >
            <a href="afficher.php">Afficher
        </button>
    </fieldset>
</form>
</body>
</html>
