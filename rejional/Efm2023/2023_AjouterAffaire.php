<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter Affaire</h1>
        
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="objet">Objet Affaire</label>
        <input type="text" id="objet" name="objet" required><br><br>
        
        <select id="etat" name="etat" required>
            <option>En cours de traitement</option>
            <option>En cours de jugement</option>
            <option>Jugée</option>
            <option>Jugée et cloturée</option>
        </select><br><br>
       
        <select id="typeAff" name="typeAff" required>
            <option>Affaire pénale</option>
            <option>Affaire Civile</option>
            <option>Affaire Administrative</option>
            <option>Affaire commerciale</option>
        </select><br><br>

        <label>Date Ouverture dossier :</label>
        <input type="date" name="dateOv" required><br><br>

        <label>Nom Prenom client :</label>
        <input type="text" name="NomPr" required><br><br>

        

        <label>Photo DE Jugement :</label>
        <input type="file" name="PhotoJg"><br><br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $objet = $_POST['objet'];
            $etat = $_POST['etat'];
            $typeAff = $_POST['typeAff'];
            $dateOv = $_POST['dateOv'];
            $NomPr = $_POST['NomPr'];
            
            $photojg = $_FILES['PhotoJg']['name'];
            $target = "uploads/";
            $target_file = $target . basename($photojg);

            if(move_uploaded_file($_FILES['PhotoJg']['tmp_name'], $target_file)){
                    $shot = 'localhost';
                    $dbname = 'gestionavocat';
                    $username = "root";
                    $password = "";

                
                    $dsn = "mysql:host=$shot;dbname=$dbname;charset=utf8";
                    $pdo = new PDO($dsn, $username, $password);

                    $sql = "INSERT INTO affaire(Objet, Etat, Type, DateOvr, Client, PhotoJg) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$objet, $etat, $typeAff, $dateOv, $NomPr, $target_file]);

                    header('Location: 2023_06_accueilavocat.php');
            
            }
        }
        
    ?>
    <h2>

    </h2>
</body>
</html>
