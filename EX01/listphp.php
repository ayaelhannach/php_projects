<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST['rt'])){
            header('location:exajoutesalle.php');
        }
        require("./connect.php");
            @$chwa=$_POST["lstchow"];
                try{
                    $req=$con->prepare("select * from salle where type=?");
                    $res=$req->execute([$chwa]);
                }catch(PDOException $e){
                    echo $e->getMessage();
                }    
    ?>
    <h1>Liste des salles</h1>
    <form action="" method="POST">
        <label for="">Veuillez choisir un type de salle:</label>
        <select name="lstchow" id="">
            <option value="Thécrique"  <?php if(@$chwa==="Théorique") { echo "selected"; }?>>Thécrique</option>
            <option value="Informatique"  <?php if(@$chwa==="Informatique") { echo "selected"; }?>>Informatique</option>
            <option value="Spécial"  <?php if(@$chwa==="Spécial") { echo "selected"; }?>>Spécial</option>
        </select>
        <input type="submit" name="aff" value="Afficher">
        <input type="submit" name="rt" value="router"><br>
    </form>

    <table border="" width="50%">
        <tr>
            <th>num Salle</th>
            <th>type</th>
            <th>nbr Chaises</th>
        </tr>
    <?php
            $tab=$req->fetchAll();
            foreach($tab as $e){
    ?>
        <tr>
            <td><?=$e[0]?></td>
            <td><?=$e[1]?></td>
            <td><?=$e[2]?></td>
        </tr>
        <?php
            }
    ?>

    </table>
</body>

</html>