<?php

    setcookie('theme', '', time() - 3600, "/");
    header("Location: accueil.php");
    exit();
?>
