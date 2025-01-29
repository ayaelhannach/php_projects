<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Rendez-vous</title>
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
    <div class="container">
        <h1>Ajouter un Rendez-vous</h1>
        <form action="" method="POST">
            <label for="cin">CIN Patient</label>
            <input type="text" id="cin" name="cin" >

            <label for="nom-complet">Nom Complet</label>
            <div class="name-container">
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" >
                <input type="text" id="nom" name="nom" placeholder="Nom" >
            </div>

            <label for="telephone">Numéro de Téléphone</label>
            <input type="tel" id="telephone" name="telephone" placeholder="000-000-0000" >

            <label for="medecin">Médecin Traitant</label>
            <select name="NomMedecin">
                <?php
                    $host = 'localhost';
                    $dbname = 'gestionh';
                    $username = 'root';
                    $password = '';
            
                    $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
                    
                    $pdo = new PDO($dsn, $username, $password);
                    $select = "SELECT * FROM medecintraitant";
                    $stmt = $pdo->query($select);
                    $medecins = $stmt->fetchAll();

                    foreach ($medecins as $medecin) {
                        echo "<option value='".$medecin['Matricule']."'>".$medecin['nom']."</option>";
                    }
                ?>
            </select>

            <label for="date">Date Rendez-vous</label>
            <input type="date" id="date" name="date" >

            <label for="time">Heure Rendez-vous</label>
            <input type="time" id="time" name="time" >

            <button type="submit">Ajouter</button>
        </form>
    </div>
    <?php
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
                
                $stmt = $pdo->prepare("SELECT * FROM rendezvs WHERE daterdz = '$date' AND heurerdz = '$time'");
                $stmt->execute();
                $existingAppointment = $stmt->fetch();

                if ($existingAppointment) {
                    echo "<script>alert('Cette date et heure sont déjà prises , veuillez choisir une autre date ou heure ');</script>";
                    
                    exit();
                } else {
                    
                    $insert = "INSERT INTO rendezvs (Idrdz, daterdz, heurerdz, cinpatient, nompatient, prenompatient, tele, medecin) 
                               VALUES ('', '$date', '$time', '$cin', '$nom', '$prenom', '$telephone', '$NomMedecin')";
                    $stmt = $pdo->prepare($insert);
                    $stmt->execute();

                    header('Location: rendez-vous_liste.php');
                    exit();
                }
            }
        }
    ?>
</body>
</html>
