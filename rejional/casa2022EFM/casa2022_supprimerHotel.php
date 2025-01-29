<?php
    $shot = 'localhost';
    $dbname = 'casa2022';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$shot;dbname=$dbname;port=3306";

    $pdo =new PDO($dsn,$username,$password);

    $id = $_GET['idHotel'];
    $delete = "DELETE  FROM hotel WHERE idHotel='$id'";
    $pdo->query($delete)->execute();

    header('Location: casa2022_ListerH.php');
?>