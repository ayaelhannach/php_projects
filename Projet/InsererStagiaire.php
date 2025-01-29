<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un stagiaire</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #cfd9df, #e2ebf0);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 30%;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #2980b9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            color: #2980b9;
        }
        .container p {
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
        }
        .container form {
            margin-bottom: 20px;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }
        .container input[type="text"],
        .container input[type="date"],
        .container select {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            font-size: 14px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        .container input[type="file"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .container select {
            width: 100%;
        }
        .container button[type="submit"] {
            background-color: #3498db;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .container button[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter un stagiaire</h1>
        <p>Veuillez remplir tous les champs.</p>
        <form action="InsererStagiaire.php" method="POST" enctype="multipart/form-data">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required><br><br>
            <label for="Prenom">Prénom</label>
            <input type="text" id="Prenom" name="prenom" required><br><br>
            <label for="date">Date Naissance</label>
            <input type="date" id="date" name="dateNaissance" required><br><br>
            <label for="photo">Photo Profil</label>
            <input type="file" id="photo" name="photoProfil"><br><br>
            <label for="Filiere">Filière</label>
            <select id="Filiere" name="idFiliere" required>
                <option >Developpement Digital</option>
                <option >Infrastructure Digital</option>
            </select><br><br>
            <button type="submit">Ajouter</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateNaissance = $_POST['dateNaissance'];
            $idFiliere = $_POST['idFiliere'];
            $photoProfil = $_FILES['photoProfil']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($photoProfil);

        
            if (move_uploaded_file($_FILES['photoProfil']['tmp_name'], $target_file)) {
                $shot = 'localhost';
                $dbname = 'gestionstagiaire';
                $username = "root";
                $password = "";

                try {
                    $dsn = "mysql:host=$shot;dbname=$dbname;charset=utf8";
                    $pdo = new PDO($dsn, $username, $password);
                    

                    $sql = "INSERT INTO stagiaire (nom, prenom, dateNaissance, idFiliere, photoProfil) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$nom, $prenom, $dateNaissance, $idFiliere, $target_file]);

                    echo "<script>alert('insertion stagiaire successfly');</script>";
                    header('location: espaceprivee.php');
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            } else {
                echo "<script>alert('photo wrong');</script>";
            }
        }
        ?>
    </div>
</body>
</html>
