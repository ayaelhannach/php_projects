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
    @$vis=$_GET['vis'];
    if ($vis==1){
        echo "
        <style>
            a{
                pointer-events: none;
            }
        </style>
        ";
    }
    session_start();
    if($_SESSION['autoriser']!='oui'){
        header('location:logine.php');
        exit();
    }
    try{

        $rec = $con -> prepare("select * from Produit;");
        $req=$rec->execute();
        $result = $rec->fetchAll();


    }
    catch (PDOException $e){
        echo $e->getMessage();
    }

    ?>
    <h1>liste de produits</h1>
    <button onclick="return document.location.href='recherch.php';">rechercher</button>
    <?php 
    if ($vis!=1){
        echo '<button onclick="return document.location.href=`ex2.php`;">Ajoutez un produit</button>';
    }
    ?>
    <button onclick="return document.location.href='deconnexion.php';">deconnexion</button><br><br>
    <Table border="">
        <tr>
            <th>réference</th>
            <th>destignation</th>
            <th>catégorie</th>
            <th>prix</th>
            <th>quantité</th>
            <th>date de creation</th>
            <th>action</th>
        </tr>
        <?php 
        foreach($result as $line){
    ?>
        <tr>
            <td><?=$line[0]?></td>
            <td><?=$line[1]?></td>
            <td><?=$line[2]?></td>
            <td><?=$line[3]?></td>
            <td><?=$line[4]?></td>
            <td><?=$line[5]?></td>
            <td><a href="modifierProduit.php?ref=<?= $line[0] ?>">Modifier</a> 
            <a href="supprimerProduit.php?ref=<?= $line[0] ?>" onclick="return confirm(`est ce que tu peux supprimer ces elements ?`)">Supprimer</a> 
            </td> 
        </tr>
    <?php
        }
        ?>
    </Table>


</body>
</html>