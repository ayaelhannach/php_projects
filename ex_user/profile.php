<?php
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Affichage d'un message de bienvenue à l'utilisateur
echo "Bienvenue, " . $_SESSION['nom'] . "!";
?>
<br><br>
<!-- Lien pour se déconnecter -->
<a href="logout.php">Déconnexion</a>
