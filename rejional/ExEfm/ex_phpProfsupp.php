<?php
    $host = 'localhost';
    $dbname = 'ex_php';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
    $pdo = new PDO($dsn, $username, $password);

   $id = $_GET['id'];

   $delete = "DELETE FROM prof WHERE MatriculeProf ='$id'";
   $pdo->query($delete)->execute();
   

   header("Location: ex_phpProf.php");
?>