<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    try {
        $con = new PDO(
            "mysql:host=$servername;dbname=db_salle",
            $username,
            $password
        );
        // echo "Connected successfully";
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>
