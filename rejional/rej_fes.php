<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="ajouter_examen.php" method="post">
    <label for="nom">Nom de l'examen :</label>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="langage">Langage :</label>
    <select id="langage" name="langage" required>
        <?php
            include 'db_fes.php';
            $sql_langages = "SELECT id, titre FROM Langage";
            $stmt = $pdo->query($sql_langages);

   
    $langages = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    foreach ($langages as $langage) {
        echo "<option value='" . $langage['id'] . "'>" . $langage['titre'] . "</option>";
    }
        ?>
    </select><br><br>

    <label for="niveau">Niveau :</label>
    <input type="text" id="niveau" name="niveau" required><br><br>

    <label for="date_examen">Date de l'examen :</label>
    <input type="date" id="date_examen" name="date_examen" required><br><br>

    <input type="submit" value="Ajouter">
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $langage_id = $_POST['langage'];
    $niveau = $_POST['niveau'];
    $date_examen = $_POST['date_examen'];

    
    if (strtotime($date_examen) < time()) {
        echo "Erreur : La date de l'examen ne peut pas être antérieure à la date actuelle.";
    } else {
        try {
            
            $sql_insert = "INSERT INTO Examen (nom, langage_id, niveau, date_examen)
                           VALUES (:nom, :langage_id, :niveau, :date_examen)";
            $stmt = $pdo->prepare($sql_insert);
            $stmt->execute(array(
                ':nom' => $nom,
                ':langage_id' => $langage_id,
                ':niveau' => $niveau,
                ':date_examen' => $date_examen
            ));
            echo "Examen ajouté avec succès.";
        } catch (PDOException $e) {
            
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
}
?>
<?php

$date_actuelle = date('Y-m-d');

try {
    
    $sql_exams_today = "SELECT e.nom, l.titre AS titre_langage, e.niveau
                        FROM Examen e
                        INNER JOIN Langage l ON e.langage_id = l.id
                        WHERE e.date_examen = :date_actuelle";
    $stmt = $pdo->prepare($sql_exams_today);
    $stmt->execute(array(':date_actuelle' => $date_actuelle));

    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Nom de l'examen : " . $row['nom'] . "<br>";
        echo "Langage : " . $row['titre_langage'] . "<br>";
        echo "Niveau : " . $row['niveau'] . "<br><br>";
    }
} catch (PDOException $e) {
    
    echo "Erreur de requête : " . $e->getMessage();
}
?>

</body>
</html>