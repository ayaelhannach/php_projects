<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>liste des stagiaires </h1>
    <ul>
        <?php
            include 'knitra_db.php';
            $sql = "SELECT * FROM stagiaire";
            $stmt = $pdo->query($sql);
            $stagiaires = $stmt->fetchAll();

            foreach ($stagiaires as $stagiaire){
                echo "<li>";
                echo "Id :".$stagiaire['id']."</li>";
                echo "<li>";
                echo "Code :".$stagiaire['code']."</li>";
                echo "<li>";
                echo "nom :".$stagiaire['Nom']."</li>";
                echo "<li>";
                echo "prenom :".$stagiaire['Prenom']."</li>";
                echo "<li>";
                echo "sexe :".$stagiaire['sexe']."</li>";
                echo "<li>";
                echo "filiere :".$stagiaire['filiere']."</li><br><br>";
            }
        ?>
    </ul>
</body>
</html>