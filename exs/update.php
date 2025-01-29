<?php
    include 'db.php';
    $id =$_GET['id'];
    $FIRST = $_POST['Firstname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];

    $update="UPDATE tab_ex2 SET  Firstname='$FIRST', Telephone='$tel', email='$email' WHERE id='$id' ";
    $pdo->exec($update);
    echo "update";
    header('location:index.php');

?>