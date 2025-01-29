<?php
    include 'db.php';
    $SELECT_ALL = "SELECT * FROM commandes";
    $results = $pdo->query($SELECT_ALL)->fetchAll();
    echo"select";
?>