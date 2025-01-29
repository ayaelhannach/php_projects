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
    session_start();
    if($_SESSION['autoriser']!='oui'){
        header('location:logine.php');
        exit();
    }
    if (isset($_POST["sub"])){
        $distination = $_POST["dest"];
        $catego = $_POST["lst"];
        $prix = $_POST["prix"];
        $quant = $_POST["quant"];
        $date = $_POST["ddc"];
        try{

            $rec = $con -> prepare("insert into Produit (designation,catégorie,prix,quantité,dateCréation) values (?,?,?,?,?);");
            $req=$rec->execute([$distination,$catego,$prix,$quant,$date]);
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_POST['sub3'])){
        header('location:listeproduits.php');
    }
    if(isset($_POST['sub4'])){
        header('location:deconnexion.php');
    }
    ?>
    <h1>Ajouter Un Produit</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th align="left">Designation</th>
                <td><input type="text" name="dest" id=""></td>
            </tr>
            <tr>
                <th align="left">Catégorie</th>
                <td><select name="lst" id="">
                        <option value="Nettoyage">Nettoyage</option>
                        <option value="Cosmétique">Cosmétique</option>
                        <option value="Electrique">Electrique</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th align="left">prix</th>
                <td><input type="text" name="prix" id=""></td>

            </tr>
            <tr>
                <th align="left">quantité</th>
                <td><input type="text" name="quant" id=""></td>
            </tr>
            <tr>

                <th align="left">date de creation</th>
                <td><input type="date" name="ddc" id=""></td>
            </tr>
            <tr>

                <th align="left"><input type="submit"  name="sub" value="Ajoutez un produit"></th>
                <th align="left"><input type="reset" name="sub2" value="Réinitialiser">
                    <input type="submit" name="sub4" value="deconnexion">
                </th>
                <th align="left"><input type="submit" name="sub3" value="Aficher list de Produit"></th>
            </tr>
        </table>
    </form>
</body>

</html>