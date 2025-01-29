<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        require('./connect.php');
        @$nmsalle = $_POST['numsal'];
        @$list = $_POST['list'];
        @$nbrchaise = $_POST['numchas'];
        if (isset($_POST['btn'])){
            if (!empty($nmsalle)&&!empty($list)&&!empty($nmsalle)){
                try{
                    $req = $con->prepare("insert into salle values(?,?,?)");
                    $r4q=$req->execute([$nmsalle,$list,$nbrchaise]);
                }catch (PDOException $e ){
                    echo $e->getMessage();

                }
            }else{
                echo "<h1>le chomp no valid mdf</h1>";
            }            
        }

        if(isset($_POST['chr'])){
            if (!empty($nmsalle)){
                try{
                    $req = $con->prepare("select type,nbrChaises from salle where numSalle =?;");
                    $r4q=$req->execute([$nmsalle]);
                    $tabb=$req->fetch();
                    // print_r($tabb);
                    // echo "hola";
                }catch (PDOException $e ){
                            echo $e->getMessage();
        
                }
            }else{
                echo "<h1>le chomp no valid mdf</h1>";
            }
        }
        if(isset($_POST['mdf'])){
            if (!empty($nmsalle)){
                try{
                    $req = $con->prepare("update salle set type=?,nbrChaises=? where numSalle =?;");
                    $r4q=$req->execute([$list,$nbrchaise,$nmsalle]);
                }catch (PDOException $e ){
                            echo $e->getMessage();
        
                }
            }else{
                echo "<h1>le chomp no valid mdf</h1>";
            }
        }
        if(isset($_POST['spr'])){
            if (!empty($nmsalle)){
                try{
                    $req=$con->prepare("delete from salle where numSalle=?");
                    $res=$req->execute([$nmsalle]);
                    // echo "<br>insert valid<br>";
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }else{
                echo "<h1>le chomp no valid mdf</h1>";
            }
        }
        if (isset($_POST['afr'])){
            header('location:listphp.php');
        }
        if (isset($_POST['apr'])){
            header('location:ajeterappareil.php');
        }

    ?>
    <fieldset>
        <legend>Ajouter une nouvelle salle</legend>
        <form action="" method="POST">
            <label for="a">Numéro de la salle</label><br>
            <input type="text" id="a" name="numsal" value="<?=@$nmsalle?>"><input type="submit" name="chr" value="recherche"><br>
            <label for="a">Type de la salle</label><br>
            <select name="list" id="">
                <option value="Théorique" <?php if(@$tabb[0]==="Théorique") { echo "selected"; }?>>Thécrique</option>
                <option value="Informatique" <?php if(@$tabb[0]==="Informatique") { echo "selected"; }?>>Informatique</option>
                <option value="Spécial" <?php if(@$tabb[0]==="Spécial") { echo "selected"; }?>>Spécial</option>uu
            </select><br>
            <label for="b">Nombre de chaises</label><br>
            <input type="text" id="b" name="numchas" value="<?=@$tabb[1]?>"><br>
            <input type="submit" name="btn" value="Ajouter">
            <input type="submit" name="mdf" value="Modiffier">
            <input type="submit" name="spr" value="suppremir" onclick="return confirm(`est ce que tu peux supprimer ces elements ?`)">
            <input type="submit" name="afr" value="afficher">
            <input type="submit" name="apr" value="ajeuter appariel">
        </form>
    </fieldset>
</body>

</html>