<?php
    include 'db.php';
    $id = $_GET['id'];
    $delete = "DELETE FROM tab_ex2 WHERE id='$id'";
    $pdo->query($delete)->execute();

    header("location:index.php");
    echo "Deleted";

?>