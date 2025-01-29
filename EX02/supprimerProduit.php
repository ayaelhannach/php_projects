<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require("./connect.php");
        $ref=$_GET["ref"];
        try{
    
            $rec = $con -> prepare("delete from Produit where ref=?");
            $req=$rec->execute([$ref]);
            header('location:listeproduits.php');
        }   
        catch (PDOException $e){
            echo $e->getMessage();
        }
    ?>
</body>
</html>