<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <!-- Formulaire de connexion -->
    <form action="login.php" method="POST">
        Email:<input type="email" id="email" name="email" required><br><br>
        Password : <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Se connecter</button>
    </form>
    <?php
// Inclusion du fichier de connexion à la base de données
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs saisies par l'utilisateur
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparation et exécution de la requête de sélection de l'utilisateur par email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Vérification de la validité du mot de passe
    if ($user &&  $user['password']) {
        // Stockage des données de l'utilisateur dans la session
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        header('Location: profile.php');
        exit();
    } else {
        // Affichage d'un message d'erreur en cas de données incorrectes
        echo "Email ou mot de passe incorrect.";
    }
}
?>
</body>
</html>
