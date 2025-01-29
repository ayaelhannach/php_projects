<?php
$host='localhost';
$dbnam='ExamenPHP';
$username='root';
$password='';
$dns="mysql:host=$host;dbname=$dbnam;port:3306";
$pdo= new PDO($dns,$username,$password);
?>