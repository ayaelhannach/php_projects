<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Id Hotel</th>
            <th>Titre</th>
            <th>Adresse</th>
            <th>Prix Par Nuit</th>
            <th>Nombre De Places</th>
            <th>Id Type </th>
            <th>Action</th>
        </tr>
    <?php
        $shot = 'localhost';
        $dbname = 'casa2022';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$shot;dbname=$dbname;port=3306";

        $pdo =new PDO($dsn,$username,$password);

        $stmt = "SELECT * FROM hotel ";
        $pdo = $pdo->query($stmt);
        $hotels = $pdo->fetchAll();

        foreach($hotels as $hotel){
            echo "<tr>
            <td>{$hotel['idHotel']}</td>
            <td>{$hotel['titre']}</td>
            <td>{$hotel['adresse']}</td>
            <td>{$hotel['prixNuit']}</td>
            <td>{$hotel['nombrePlace']}</td>
            <td>{$hotel['idType']}</td>
            <td><a href='casa2022_supprimerHotel.php?idHotel={$hotel['idHotel']}'>Supprimer</a></td>
            <tr>";
        }

    ?>
    </table><br><br>
    <button type="button"><a href="casa2022_AjouterHotel.php">Ajouter </a></button>
</body>
</html>