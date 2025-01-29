<?php
    include 'db.php';
    $SELECT_ALL = "SELECT * FROM tab_ex2";
    $results = $pdo->query($SELECT_ALL)->fetchAll();
?>