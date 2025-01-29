<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $host = 'localhost';
        $dbname = 'ifran_2022';
        $dbusername = 'root';
        $dbpassword = '';
    
        $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $Dossier = $_GET['id'];

            $selectRubriques = "SELECT * FROM rubrique WHERE NumDossier='$Dossier'  ";
            $query = $pdo->query($selectRubriques);
            $rubriques = $query->fetchAll();
        }
        
    ?>

    <table border="1">
        <tr>
            <th>NumRub</th>
            <th>NomRub</th>
            <th>MontantRub</th>
            <th>NumDossier</th>
        </tr>

        <?php
            
            foreach($rubriques as $rubrique){
                echo "<tr>
                <td>{$rubrique['NumRub']}</td>
                <td>{$rubrique['NomRub']}</td>
                <td>{$rubrique['MontantRub']}</td>
                <td>{$rubrique['NumDossier']}</td>
                </tr>";
            }
        ?>
    </table>
</body>
</html>
