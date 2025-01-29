
<?php
    include 'db.php';

    $id=$_POST['id'];
    $client=$_POST['client'];
    $ville=$_POST['ville'];
    $pays=$_POST['pays'];
    $quantite=$_POST['quantite'];
    $total=$_POST['total'];

    $update="UPDATE commandes
            SET  client='$client', ville='$ville',pays='$pays', quantite='$quantite',total='$total' WHERE id='$id'";
    $pdo->exec($update);
    header("location:index.php");

?>