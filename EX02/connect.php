<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    try {
        $con = new PDO(
            "mysql:host=$servername;dbname=gestionstock",
            $username,
            $password
        );
        // echo "Connected successfully";
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>
