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

        $rec = $con -> prepare("select * from Produit where ref=?");
        $req=$rec->execute([$ref]);
        $tab=$rec->fetch();
    }   
    catch (PDOException $e){
        echo $e->getMessage();
    }
    if (isset($_POST["sub"])){
        $distination = $_POST["dest"];
        $catego = $_POST["lst"];
        $prix = $_POST["prix"];
        $quant = $_POST["quant"];
        $date = $_POST["ddc"];
        try{

            $rec = $con -> prepare("update Produit set designation=?,catégorie=?,prix=?,quantité=?,dateCréation=? where Ref=?;");
            $req=$rec->execute([$distination,$catego,$prix,$quant,$date,$ref]);
            header('location:listeproduits.php');
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    if (isset($_POST['rt'])){
        header('location:listeproduits.php');
    }
    ?>
    <h1>Modifier le Produit de référence : <?=$ref?></h1>
    <form action="" method="post">
        <table>
            <tr>
                <th align="left">Designation</th>
                <td><input type="text" name="dest" id="" value=<?=$tab[1]?>></td>
            </tr>
            <tr>
                <th align="left">Catégorie</th>
                <td><select name="lst">
                        <option value='Nettoyage' <?php if($tab[2]==="Nettoyage") { echo "selected"; }?>>Nettoyage</option>

                        <option value="Cosmétique" <?php if($tab[2]==="Cosmétique") { echo "selected"; }?>>Cosmétique</option>
                        <option value="Electrique" <?php if($tab[2]==="Electrique") { echo "selected"; }?>>Electrique</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th align="left">prix</th>
                <td><input type="text" name="prix" value=<?=$tab[3]?>></td>

            </tr>
            <tr>
                <th align="left">quantité</th>
                <td><input type="text" name="quant" value=<?=$tab[4]?>></td>
            </tr>
            <tr>

                <th align="left">date de creation</th>
                <td><input type="date" name="ddc" value=<?=$tab[5]?>></td>
            </tr>
            <tr>

                <th align="left"><input type="submit"  name="sub" value="Metter à jours"></th>
                <th align="left"><input type="submit" name="rt" value="roteur"></th>
            </tr>
        </table>
    </form>
</body>
</html>