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
    if(isset($_POST['btttn'])){
        // $a=new methd_salle();
        $name=$_POST['a'];
        $code=$_POST['txt'];
        try{
            $req=$con->prepare("select * from Produit where $name=?");
            $res=$req->execute([$code]);
            $tab=$req->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    if(isset($_POST['bb'])){
        header('location:listeproduits.php');
    }
    ?>
    <fieldset>
        <legend><b>Indiquez un critére de recherche:</b></legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td><input type="radio" value="Ref" name="a">Réference</td>
                    <td><input type="radio" value="quantité" name="a">Quantite</td>
                </tr>
                <tr>
                    <td><input type="radio" value="designation" name="a">Désignation</td>
                    <td><input type="radio" value="prix" name="a">Prix</td>
                </tr>
                <tr>
                    <td><input type="radio" value="dateCréation" name="a">Date Creation</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="txt">
                    </td>
                    <td>
                        <input type="submit" name="btttn" value="rechercher">
                        <input type="submit" name="bb" value="retour">
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    <table border="">
    <tr>
        <th>Réference</th>
        <th>Désignation</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Date de création</th>
    </tr>
    <?php
        if(!empty($tab)){
            foreach($tab as $e){
    ?>
    <tr>
        <td><?=$e[0]?></td>
        <td><?=$e[1]?></td>
        <td><?=$e[2]?></td>
        <td><?=$e[3]?></td>
        <td><?=$e[4]?></td>
        <td><?=$e[5]?></td>
    </tr>
    <?php
            }
        }
        else{
            ?>
    <tr>
        <td><?="nane"?></td>
        <td><?="nane"?></td>
        <td><?="nane"?></td>
        <td><?="nane"?></td>
        <td><?="nane"?></td>
        <td><?="nane"?></td>
    </tr>
    <?php   
        }
    ?>
    </table>
</body>
</html>