<?php

    include '2023_06_Conn.php';

    $id = $_GET['IdAffaire'];
    $delete = "DELETE FROM affaire WHERE IdAffaire='$id'";
    $pdo->query($delete)->execute();

    header('Location: 2023_06_accueilavocat.php');
?>