<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rendez-vous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Liste des Rendez-vous</h1>
    <table>
        <thead>
            <tr>
                <th>CIN Patient</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Médecin Traitant</th>
                <th>Date de Rendez-vous</th>
                <th>Heure de Rendez-vous</th>
                <th>supprimer</th>
                <th>modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $host = 'localhost';
                $dbname = 'gestionh';
                $username = 'root';
                $password = '';

                $dsn = "mysql:host=$host;dbname=$dbname;port=3306";

                $pdo = new PDO($dsn, $username, $password);

                $select = "SELECT * FROM rendezvs   ORDER BY daterdz ASC, heurerdz ASC";
                $stmt = $pdo->query($select);
                $rendezvs = $stmt->fetchAll();

                foreach ($rendezvs as $rendezv) {ز
                    echo "<tr>
                            <td>{$rendezv['cinpatient']}</td>
                            <td>{$rendezv['nompatient']}</td>
                            <td>{$rendezv['prenompatient']}</td>
                            <td>{$rendezv['tele']}</td>
                            <td>{$rendezv['medecin']}</td>
                            <td>{$rendezv['daterdz']}</td>
                            <td>{$rendezv['heurerdz']}</td>
                            <td><a href='rendez-vous_supp.php?Idrdz={$rendezv['Idrdz']}'>supprimer</a></td>
                            <td><a href='rendez-vous_modf.php?Idrdz={$rendezv['Idrdz']}'>modifier</a></td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
