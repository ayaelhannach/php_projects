<?php
    $shot = 'localhost';
    $dbname= 'gestionproduit';
    $username = 'root';
    $password = '';

    $sdn = "mysql:host=$shot;dbname=$dbname;port=3306";

    $pdo = new PDO($sdn,$username,$password);
?>