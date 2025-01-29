<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="datetime-local"] {
            padding: 8px 10px;
        }

        .name-container {
            display: flex;
            justify-content: space-between;
        }

        .name-container input {
            width: 48%;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
        $host = 'localhost';
        $dbname = 'gestionh';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbname;port=3306";

        $pdo = new PDO($dsn, $username, $password);

        
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $select = "SELECT * FROM rendezvs WHERE Idrdz='$id'";
                $stmt = $pdo->query($select)->fetch();
            }
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $cin = $_POST['cin'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $telephone = $_POST['telephone'];
            $NomMedecin = $_POST['NomMedecin'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            
            if (empty($cin) || empty($prenom) || empty($nom) || empty($telephone) || empty($NomMedecin) || empty($date) || empty($time)) {
                echo "<script>alert('doit remplir tous les champs');</script>";
            } 
            elseif (!preg_match("/^06[0-9]{8}$/", $telephone)) {
                echo "<script>alert('Invalid phone number');</script>";
            } 
            elseif ($date < date("Y-m-d")) {
                echo "<script>alert('Invalid date');</script>";
            } 
            else {
                $update = "UPDATE rendezvs SET daterdz='$date', heurerdz='$time', cinpatient='$cin', nompatient='$nom', prenompatient='$prenom', tele='$telephone', medecin='$NomMedecin' WHERE Idrdz='$id' ";
                $stmt = $pdo->prepare($update);
                $stmt->execute();
            }
        }   

    ?>
    <div class="container">
        <h1>Ajouter un Rendez-vous</h1>
        <form action="" method="POST">
        <input type="hidden" name="Idrdz" value="<?php echo $stmt['Idrdz']; ?>">
            <label for="cin">CIN Patient</label>
            <input type="text" id="cin" name="cin" value="<?php echo $stmt['cinpatient']; ?>"> >

            <label for="nom-complet">Nom Complet</label>
            <div class="name-container">
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $stmt['prenompatient']; ?>">
                <input type="text" id="nom" name="nom" placeholder="Nom" value="<?php echo $stmt['nompatient']; ?>">
            </div>

            <label for="telephone">Numéro de Téléphone</label>
            <input type="tel" id="telephone" name="telephone" placeholder="000-000-0000" value="<?php echo $stmt['tele']; ?>">

            <label for="medecin">Médecin Traitant</label>
            <select name="NomMedecin" value="<?php echo $stmt['medecin']; ?>">
                <?php
                    $host = 'localhost';
                    $dbname = 'gestionh';
                    $username = 'root';
                    $password = '';
            
                    $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
                    
                    $pdo = new PDO($dsn, $username, $password);
                    $select = "SELECT * FROM medecintraitant";
                    $s = $pdo->query($select);
                    $medecins = $s->fetchAll();

                    foreach ($medecins as $medecin) {
                        echo "<option value='".$medecin['Matricule']."'>".$medecin['nom']."</option>";
                    }
                ?>
            </select>

            <label for="date">Date Rendez-vous</label>
            <input type="date" id="date" name="date" value="<?php echo $stmt['daterdz ']; ?>">

            <label for="time">Heure Rendez-vous</label>
            <input type="time" id="time" name="time" value="<?php echo $stmt[' heurerdz']; ?>"> 

            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>