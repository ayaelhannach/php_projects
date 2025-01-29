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
    if(isset($_POST["btn2"])){
        $code_ap=$_POST["num"];
        $nom_ap=$_POST["nom"];
        $prix=$_POST["Prix"];
        $nom_ap=$_POST["nom"];
        $num_sal=$_POST["lst"];
        try{
            $req=$con->prepare("insert into appareil values(?,?,?,?)");
            $res=$req->execute([$code_ap,$nom_ap,$prix,$num_sal]);
        }catch (PDOException $e ){
            echo $e->getMessage();

        }
    }
    if (isset($_POST['btn1'])){
        header('location:exajoutesalle.php');
    }
    try{
        $req=$con->prepare("select numSalle from salle ");
        $res=$req->execute();
        $tab=$req->fetchAll();
    }catch (PDOException $z ){
        echo $z->getMessage();

    }

    ?>

    <fieldset>
        <legend>Ajouter une nouvelle appareil</legend>
        <form action="" method="POST">
            <table>
                <tr>

                    <th align="left">Numéro de la appareil :</th>
                
                    <td><input type="text" name="num"></td>
                </tr>
                <tr>

                    <th align="left">nom appareil :</th>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <th align="left">Prix :</th>
                    <td><input type="text" name="Prix"></td>
                </tr>
                <tr>
                    <th align="left">num Salle:</th>
                    <td>
                        <select name="lst" id="">
                            <?php 
                            foreach ($tab as $t){
                            ?>
                            <option value="<?=$t[0]?>"><?=$t[0]?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn2" value="ajeuter"></td>
                    <td><input type="submit" name="btn1" value="router"></td>
                </tr>


            </table>
        </form>
    </fieldset>

</body>

</html>