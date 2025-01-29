<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sélectionnez votre theme  préférée</h1>
    <form action="change_theme.php" method="POST">
    <input type="radio" name="theme" value="clair">clair
    <input type="radio" name="theme" value="sombre">sombre
    <input type="radio" name="theme" value="colore">colore
    <input type="submit" value="Valider">
    </form>
   
    <a href="change_theme.php">Réinitialiser le theme</a>
</body>
</html>