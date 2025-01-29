<?php

    include 'db.php';
    
        $FIRST = $_POST['Firstname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        

        $Insertion = "INSERT INTO tab_ex2(firstname, Telephone, email)
        VALUES('$FIRST', '$tel', '$email')";
        $pdo->exec($Insertion);
        echo 'inserted successfully<br>';

        
    
?>