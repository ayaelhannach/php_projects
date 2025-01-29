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
            <th>Matricule Prof</th>
            <th>Nom</th>
            <th>Telephone </th>
            <th>Modifiere</th>
            <th>Supprimer</th>
        </tr>

        <?php
        $host = 'localhost';
        $dbname = 'ex_php';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
        $pdo = new PDO($dsn, $username, $password);

        $select = "SELECT * FROM prof ";
        $stmtQuery = $pdo->query($select);
        $profs = $stmtQuery->fetchAll();

        foreach($profs as $prof){
            echo "<tr>
            <td>{$prof['MatriculeProf']}</td>
            <td>{$prof['nom']}</td>
            <td>{$prof['Tel']}</td>
            <td><a href='ex_phpProfmodifier.php?MatriculeProf={$prof['MatriculeProf']}'>Modifier</a></td>
            <td><a href='ex_phpProfsupp.php?MatriculeProf={$prof['MatriculeProf']}'>Supprimer</a></td>
            </tr>";
        }
    ?>
    </table>

    
</body>
</html>