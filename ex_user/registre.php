<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action ="" method="POST">
        Nom : <input type="text" name="nom"><br><br>
        Email : <input type="email" name="email" ><br><br>
        Password : <input type="password" name="password"><br><br>
        <button type="submit">Se connecter</button>
    </form>
   <?php
        // Inclusion du fichier de connexion à la base de données
            include 'db.php';

       if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des valeurs saisies par l'utilisateur
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Préparation et exécution de la requête d'insertion dans la table
        $stmt = $pdo->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $password]);

        // Redirection vers la page de connexion après un enregistrement réussi
        header('Location: login.php');
        exit();
}
?>

</body>
</html>