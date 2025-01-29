<?php
    include 'db.php';
    $SELECT = "SELECT * FROM etudiant";
    $results = $pdo->query($SELECT)->fetchAll();


    
?>


