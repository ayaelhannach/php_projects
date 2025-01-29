<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      include 'db.php';
     $sql = "SELECT * FROM etudiant";
     $rus = $pdo->query($sql)->fetchAll();

     $sql = "SELECT * FROM cours";
     $result = $pdo->query($sql)->fetchAll();

     
    ?>

    <form action="" method="post">
        <label for="CodeEtudiant">Code Etudiant</label>
        <select name="CodeEtudiant" id="CodeEtudiant">
            <?php
            foreach ($rus as $value) {
                echo "<option value='" . $value['CodeEtudiant'] . "'>" . $value['nom'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="NumCours">Num Cours</label>
        <select name="NumCours" id="NumCours">
            <?php
            foreach ($result as $row) {
                echo "<option value='" . $row['numCours'] . "'>" . $row['Titre'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="date">Date</label>
        <input type="date" name="date" id="date"><br><br>

        <label for="note">Note</label>
        <input type="number" name="note" id="note"><br><br>
        
        <input type="submit" value="Submit">
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $etudiant = $_POST['CodeEtudiant'];
        $cours = $_POST['NumCours'];
        $date = $_POST['date'];
        $note = $_POST['note'];
        
        if(!empty($etudiant) && !empty($cours) && !empty($date) && !empty($note)){
            $sqlState = $pdo->prepare('INSERT INTO examen (CodeEtudiant, NumCours, date, note) VALUES (?, ?, ?, ?)');
            $sqlState->execute([$etudiant, $cours, $date, $note]);
            echo "Les données ont été ajoutées avec succès.";
        } else {
            echo "Tous les champs sont obligatoires.";
        }
     }
    ?>
</body>

</html>
