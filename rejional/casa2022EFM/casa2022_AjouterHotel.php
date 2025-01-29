<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label name="titre">Titre : </label><br>
        <input type="text" name="titre"><br><br>

        <label name="adresse">Adresse : </label><br>
        <input type="text" name="adresse"><br><br>

        <label name="prix">Prix Par Nuit : </label><br>
        <input type="number" name="prix"><br><br>

        <label name="nombreP">Nombre De Places : </label><br>
        <input type="text" name="nombreP"><br><br>

        <label name="idType">Id Type : </label><br>
        <input type="text" name="idType"><br><br>
        <button type="submit">Ajouter</button>
    </form>

    <?php


        $shot = 'localhost';
        $dbname = 'casa2022';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$shot;dbname=$dbname;port=3306";

        $pdo =new PDO($dsn,$username,$password);

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $titre = $_POST['titre'];
            $adresse = $_POST['adresse'];
            $prix = $_POST['prix'];
            $nombreP = $_POST['nombreP'];
            $idType = $_POST['idType'];

            $insert= "INSERT INTO hotel(titre ,adresse ,prixNuit ,nombrePlace,idType) VALUES (?,?,?,?,?) ";
            $stmt=$pdo->prepare($insert);
            $stmt->execute([$titre, $adresse, $prix, $nombreP,$idType]);

            echo "<script>alert('insertion hotel successfly');</script>";

            header('Location: casa2022_ListerH.php');

        }
    ?>



</body>
</html>