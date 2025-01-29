<?php 
    include 'db.php';
    $nom = $_GET['nom'];
    $email = $_GET['email'];

    $Insertion = "INSERT INTO etudiant(nom, email)
        VALUES('$nom', '$email')";
        $pdo->exec($Insertion);
        echo 'inserted successfully<br>';
?>