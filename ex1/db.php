<?php

    $shot='localhost';
    $dbname='php_cours_db';
    $username='root';
    $password='';
    $dsn="mysql:host=$shot;dbname=$dbname;port=3306";
    $pdo = new PDO($dsn,$username ,$password);
?>