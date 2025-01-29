<?php
// Informations de connexion à la base de données
$host = 'localhost'; // Adresse de l'hôte de la base de données
$dbname = 'centre_formation'; // Nom de la base de données
$username = 'utilisateur_db'; // Nom d'utilisateur de la base de données
$password = 'mot_de_passe_db'; // Mot de passe de la base de données

try {
    // Création d'une connexion PDO à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Utilisation de la connexion PDO pour exécuter des requêtes, etc.
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher l'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
