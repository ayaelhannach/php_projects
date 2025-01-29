<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un stagiaire</title>
    <style>
        body {
            background-color: #f0f5f9;
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
    <?php
    $shot = 'localhost';
    $dbname = 'gestionstagiaire'; 
    $username = "root";
    $password = "";

    $dsn = "mysql:host=$shot;dbname=$dbname;port=3306";
    $pdo = new PDO($dsn, $username, $password);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idStagiaire = $_POST['idStagiaire'];
        $nom = $_POST['nom'];
        $prenom = $_POST['Prenom'];
        $date = $_POST['date'];
        $filiere = $_POST['selection'];

        $sql = "UPDATE stagiaire SET nom=?, prenom=?, dateNaissance=?, idFiliere=? WHERE idStagiaire=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $date, $filiere, $idStagiaire]);

        header("Location: espaceprivee.php");
        exit();
    }

    if (isset($_GET['idStagiaire'])) {
        $idStagiaire = $_GET['idStagiaire'];

        $sql = "SELECT * FROM stagiaire WHERE idStagiaire=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idStagiaire]);
        $stagiaire = $stmt->fetch();//FETCH_ASSOC : Retourne les résultats sous forme de tableau associatif.

        if (!$stagiaire) {
            exit("Stagiaire non trouvé.");
        }
    } else {
        exit("ID Stagiaire non spécifié.");
    }
    ?>

    <div class="container">
        <h1>Modifier un stagiaire</h1>
        <p>Veuillez remplir tous les champs.</p>
        <form action="modifierStagiaire.php" method="POST">
            <input type="hidden" name="idStagiaire" value="<?php echo $idStagiaire; ?>">
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo $stagiaire['nom']; ?>" required><br><br>
            <label for="Prenom">Prénom</label><br>
            <input type="text" id="Prenom" name="Prenom" value="<?php echo $stagiaire['prenom']; ?>" required><br><br>
            <label for="date">Date Naissance</label><br>
            <input type="date" id="date" name="date" value="<?php echo $stagiaire['dateNaissance']; ?>" required><br><br>
            <label for="photo">Photo Profil</label><br>
            <input type="file" id="photo" name="photo"><br><br>
            <label for="Filiere">Filière</label><br>
            <select id="Filiere" name="selection">
                <option  >Developpement Digital</option>
                <option  >Infrastructure Digital</option>
            </select><br><br>
            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>
