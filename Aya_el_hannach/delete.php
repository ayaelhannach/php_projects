<?php
    include 'db.php';
    $id = $_GET['id'];
    $delete = "DELETE FROM etudiant WHERE id='$id'";
    $pdo->query($delete)->execute();

    header("location:index.php");
    echo "Deleted successfuly";

?>























