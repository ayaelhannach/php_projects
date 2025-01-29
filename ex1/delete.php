<?php

    include 'db.php';
    $id = $_GET['id'];
    $delete = "DELETE FROM  commandes WHERE id='$id'";
    $pdo->query($delete)->execute();
    header("location:index.php");
    echo "Deleted";

?>
