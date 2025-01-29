<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel Emprunt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #FFA500;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            color: #FFA500;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input[type="date"] {
            padding-right: 0;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #FFA500;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #FF7F00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nouvel Emprunt</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="cin">CIN Emprunteur :</label>
                <input type="text" id="cin" name="cin">
            </div>
            <div class="form-group">
                <label for="nom">Nom Emprunteur :</label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom Emprunteur :</label>
                <input type="text" id="prenom" name="prenom">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name="telephone">
            </div>
            <div class="form-group">
                <label for="date">Date d'Emprunt :</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN Livre Emprunté :</label>
                <select id="isbn" name="isbn">
                    <option value="">Sélectionner un ISBN</option>
                    <?php
                        $host = 'localhost';
                        $dbname='gestionemprunt';
                        $username = 'root';
                        $password = '';
            
                        $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
            
                        $pdo = new PDO($dsn , $username , $password);

                        $select = "SELECT * FROM livre";
                        $stmt = $pdo->query($select);
                        $livres = $stmt->fetchAll();

                        foreach($livres as $livre){
                            echo "<option value='".$livre['Isbn']."'>".$livre['Isbn']."</option>";
                        }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Emprunter</button>
            </div>
        </form>
        <?php 
            if($_SERVER['REQUEST_METHOD']== 'POST'){
                $cin = $_POST['cin'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $telephone = $_POST['telephone'];
                $date = $_POST['date'];
                $isbn = $_POST['isbn'];

                if(empty($cin) || empty($nom) || empty($prenom) || empty($telephone) || empty($date) || empty($isbn) ){
                    echo "<script>alert('Tous les champs sont obligatoires ');</script>";
                }
                else{
                    $num = "/^06[0-9]{8}$/";
                    if(!preg_match($num, $telephone)){
                        echo "<script>alert('Numéro de téléphone doit être comme suit :  06 000-000-00  ');</script>";
                    }
                }
                else{
                    $insert = "INSERT INTO emprunt(Id_Emprunt ,Cin , Nom , Prenom , Tel , date_emprunt ,isbn_livre)
                                VALUES('','$cin' , '$nom' , '$prenom' ,'$telephone' , '$date' ,'1');"

                    $stmt = $pdo->prepare($insert);
                    $stmt->execute();

                    header('Location: liste_emprunts.php .php');
                    exit();
                }

                $date_emprunt = date('Y-m-d');
                $date_retour = date('Y-m-d'); 
                $date = strtotime($date_retour , $date_emprunt . ' + 15 days');
            }
            
        ?>
    </div>
</body>
</html>
