<?php
    $shot = 'localhost';
    $dbname = 'gestionstagiaire'; 
    $username = "root";
    $password = "";

    $dsn = "mysql:host=$shot;dbname=$dbname;port=3306";
    $pdo = new PDO($dsn, $username, $password);
    $id = $_GET['idStagiaire'];
    $delete = "DELETE FROM stagiaire WHERE idStagiaire='$id'";
    $pdo->query($delete)->execute();

    header("location:espaceprivee.php");
    
   
?>
