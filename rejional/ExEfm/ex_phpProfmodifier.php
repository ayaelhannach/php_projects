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
        $dbname = 'ex_php';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
        $pdo = new PDO($dsn, $username, $password);

        if (isset($_GET['MatriculeProf'])) {
            $MatriculeProf = $_GET['MatriculeProf'];

            $select = "SELECT * FROM prof WHERE MatriculeProf=?";
            $stmt = $pdo->prepare($select);
            $stmt->execute([$MatriculeProf]);
            $prof = $stmt->fetch();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MatriculeProf = $_POST['MatriculeProf'];
            $nom = $_POST['nom'];
            $Tel = $_POST['Tel'];

            $sql = "UPDATE prof SET nom=?, Tel=? WHERE MatriculeProf=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $Tel, $MatriculeProf]);

            header("Location: ex_phpProf.php");
            exit;
        }
    ?>
    
    <form action="" method="POST">
        <input type="hidden" name="MatriculeProf" value="<?php echo $MatriculeProf; ?>">
        <label for="nom">Nom:</label><br>
        <input id="nom" name="nom" type="text" value="<?php echo $prof['nom']; ?>"><br><br>
        <label for="Tel">Telephone:</label><br>
        <input id="Tel" name="Tel" type="Tel" value="<?php echo $prof['Tel']; ?>"><br><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
