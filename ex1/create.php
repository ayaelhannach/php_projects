<?php
    include "db.php";
    
    $client=$_POST['client'];
    $ville=$_POST['ville'];
    $pays=$_POST['pays'];
    $quantite=$_POST['quantite'];
    $total=$_POST['total'];

    $insertion="INSERT INTO  commandes(client,ville,pays,quantite,total) 
        VALUES('$client','$ville','$pays','$quantite','$total')";
    $pdo->exec($insertion);
    echo"inserted successfuly";
    header("location:index.php");

?> 