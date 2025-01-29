<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrer les Cours</title>
</head>
<body>
    <form action="" method="GET">
        <label for="professeur">Professeur:</label><br>
        <select id="professeur" name="professeur" required>
            <!-- Options des professeurs -->
            <?php
            $dsn = "mysql:host=localhost;dbname=ex_php";
            $pdo = new PDO($dsn, 'root', '');
            $professeurs = $pdo->query("SELECT MatriculeProf, nom FROM prof")->fetchAll();
            foreach ($professeurs as $professeur) {
                echo "<option value='".$professeur['MatriculeProf'] . "'>".$professeur['nom']."</option>";
            }
            ?>
        </select><br><br>
        <button type="submit">Filtrer</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['professeur'])) {
        $dsn = "mysql:host=localhost;dbname=ex_php";
        $pdo = new PDO($dsn, 'root', '');
        $professeur = $_GET['professeur'];
        $cours = $pdo->prepare("SELECT * FROM cours WHERE MatriculeProf = ?");
        $cours->execute([$professeur]);
        $rows = $cours->fetchAll();

        if ($rows) {
            echo "<table border='1'>
            <tr>
                <th>NumCours</th>
                <th>Titre</th>
                <th>Salle</th>
                <th>Coef</th>
            </tr>";
            foreach ($rows as $row) {
                echo "<tr>
                        <td>{$row['NumCours']}</td>
                        <td>{$row['Titre']}</td>
                        <td>{$row['Salle']}</td>
                        <td>{$row['Coef']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun cours trouvé pour ce professeur.";
        }
    }
    ?>
</body>
</html>
