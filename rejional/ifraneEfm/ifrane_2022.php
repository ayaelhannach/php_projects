<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'ifran_2022Menu.php'; ?>
    <form action="" method="POST">
        <label for="matricule">Matricule :</label><br>
        <input type="number" name="matricule" id="matricule"><br><br>
        <label for="password">Mot De passe :</label><br>
        <input type="password" name="password" id="password"><br><br>
        <button type="submit">Connecter</button>
    </form>

    <?php
        
        $host = 'localhost';
        $dbname = 'ifran_2022';
        $dbusername = 'root';
        $dbpassword = '';

        $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
        $pdo = new PDO($dsn, $dbusername, $dbpassword);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $matricule = $_POST['matricule'];
            $password = $_POST['password'];

            $select = "SELECT * FROM assure WHERE Matricule = ? AND MotPasse = ?";
            $stmt = $pdo->prepare($select);
            $stmt->execute([$matricule, $password]);
            $assure = $stmt->fetch();

            if ($assure) {
                session_start();
                $_SESSION['NomAss'] = $assure['NomAss'];
                $_SESSION['PrenomASS'] = $assure['PrenomASS'];
                $_SESSION['dateN'] = $assure['dateN'];
                $_SESSION['NbEnfant'] = $assure['NbEnfant'];
                $_SESSION['SituationF'] = $assure['SituationF'];
                $_SESSION['totalR'] = $assure['totalR'];
                $_SESSION['DateD'] = $assure['DateD'];
                $_SESSION['NumE'] = $assure['NumE'];
                
                header('location:ifran2_2022.php');
                exit();
            } else {
                echo "Invalid matricule or password.";
            }
        }
    ?>
</body>
</html>
