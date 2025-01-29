<?php
    session_start();
    // Détruire la session actuelle
    session_unset();
    session_destroy();

    // Redirection vers la page de connexion
    header('Location: login.php');
?>
