<?php
include 'db.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$tel = $_POST['tel'];


$update = "UPDATE professeur SET nom = '$nom', tel = '$tel' WHERE MatriculeProfesseur = '$id'";
$result = $pdo->exec($update);

    header('Location: prof.php');
    exit();

  
?>
