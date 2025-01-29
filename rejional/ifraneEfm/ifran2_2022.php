<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php
        
        if(isset($_SESSION['Matricule'])){
            header('location:ifrane_2022.php');
        }
    ?>


    <table border="1">
        <thead>
            <tr>
                <th>Nom Assure</th>
                <th>Prenom Assure</th>
                <th>Date Naissance</th>
                <th>Nombre Enfant</th>
                <th>Situation Familiale</th>
                <th>Total R</th>
                <th>Date D</th>
                <th>Num Entreprise</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'ifran_2022Menu.php';
                session_start();
                echo "<tr>"
                    ."<td>".$_SESSION['NomAss']."</td>"
                    ."<td>".$_SESSION['PrenomAss']."</td>"
                    ."<td>".$_SESSION['dateN']."</td>"
                    ."<td>".$_SESSION['NbEnfant']."</td>"
                    ."<td>".$_SESSION['SituationF']."</td>"
                    ."<td>".$_SESSION['totalR']."</td>"
                    ."<td>".$_SESSION['DateD']."</td>"
                    ."<td>".$_SESSION['NumE']."</td>"
                    ."</tr>";
            ?>
        </tbody>
    </table>

    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Num Entreprise</th>
                <th>Nom Entreprise</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Nombre Entreprise</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $host = 'localhost';
                $dbname = 'ifran_2022';
                $dbusername = 'root';
                $dbpassword = '';

                $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
                $pdo = new PDO($dsn, $dbusername, $dbpassword);

                $numE = $_SESSION['NumE'];
                $select = "SELECT * FROM entreprise WHERE NumE = ?";
                $stmt = $pdo->prepare($select);
                $stmt->execute([$numE]);
                $entreprise = $stmt->fetch();

                if ($entreprise) {
                    echo "<tr>"
                        ."<td>".$entreprise['NumE']."</td>"
                        ."<td>".$entreprise['NomE']."</td>"
                        ."<td>".$entreprise['adresse']."</td>"
                        ."<td>".$entreprise['tel']."</td>"
                        ."<td>".$entreprise['NombreE']."</td>"
                        ."<td>".$entreprise['email']."</td>"
                        ."</tr>";
                } 
            ?>
        </tbody>
    </table>

</body>
</html>
