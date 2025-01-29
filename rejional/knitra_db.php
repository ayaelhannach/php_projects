<?php
    $shot = 'localhost';
    $dbname = 'kn';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$shot;dbname=$dbname;port=3306";
    $pdo =new PDO($dsn,$username,$password);
?>


