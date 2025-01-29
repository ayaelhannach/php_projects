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
            <th>NumDossier</th>
            <th>Date Pot</th>
            <th>Montant R</th>
            <th>Date T</th>
            <th>Lien M</th>
            <th>Total Dossier</th>
            <th>Matricule</th>
            <th>supprimer</th>
        </tr>

        <?php
            $host = 'localhost';
            $dbname = 'ifran_2022';
            $dbusername = 'root';
            $dbpassword = '';
        
            $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
            $pdo = new PDO($dsn, $dbusername, $dbpassword);

            $select = "SELECT * FROM dossier";
            $stmt = $pdo->prepare($select);
            $stmt->execute();
            $dossiers = $stmt->fetchAll();

            foreach($dossiers as $dossier){
                echo "<tr>
                <td>{$dossier['NumDossier']}</td>
                <td>{$dossier['DatePot']}</td>
                <td>{$dossier['MontantR']}</td>
                <td>{$dossier['DateT']}</td>
                <td>{$dossier['LienM']}</td>
                <td>{$dossier['TotalDossier']}</td>
                <td>{$dossier['Matricule']}</td>
                <td><button type='button'><a href='ifran_2022SuppDoss.php?id={$dossier['NumDossier']}'</a>Supprimer</button></td>
                <td><button type='button' ><a href='ifran_2022ModifierDoss.php?id={$dossier['NumDossier']}'</a>Modifier</button></td>
                <td><button type='button' ><a href='ifrane_2022SelectDoss.php?id={$dossier['NumDossier']}'</a>Afficher</button></td>


                </tr>";
            }
        ?>
    </table>
</body>
</html>
