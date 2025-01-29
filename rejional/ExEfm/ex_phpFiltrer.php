<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $where = '';
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $prof = $_POST['nomProf'];
            $where = "WHERE MatriculeProf ='$prof'";
        }
        echo $where;
    ?>
    <form action="" method="POST">
        <label for="prof">Prof: </label>
        <select name="nomProf" id="prof">
            <?php
                $host = 'localhost';
                $dbname = 'ex_php';
                $username = 'root';
                $password = '';
        
                $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
        
                $pdo = new PDO($dsn, $username, $password);

                $select = "SELECT * FROM prof";
                $stmt = $pdo->query($select);
                $profs = $stmt->fetchAll();

                foreach($profs as $prof){
                    echo "<option value='" . $prof['MatriculeProf'] . "'>" . $prof['nom'] . "</option>";
                }
            ?>
        </select>
        <input type="submit" value="Submit">
    </form><br><br>
    <table border="1">
        <tr>
            <th>Num Cours</th>
            <th>Salle</th>
            <th>Matricule Prof</th>
            <th>Titre</th>
            <th>Coef</th>
        </tr>
    
        <?php
            $stmt = "SELECT * FROM cours ";
            $query = $pdo->query($stmt);
            $cours = $query->fetchAll();

            foreach($cours as $cour){
                echo "<tr>
                <td>{$cour['NumCours']}</td>
                <td>{$cour['Salle']}</td>
                <td>{$cour['MatriculeProf']}</td>
                <td>{$cour['Titre']}</td>
                <td>{$cour['Coef']}</td>
                </tr>";
            }
        ?>

    </table>
</body>
</html>
