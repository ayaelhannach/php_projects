<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <style>
        body {
            background: aliceblue;
        }
        .parent {
            border: 2px solid black;
            width: 50%;
            height: 40%;
            margin: 200px auto;
            background: white;
        }
        .form {
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="parent">
        <div style="padding-top: 1px; background: #AFEEEE;">
            <h1 style="text-align: center; margin-top: 5px; color: dimgray;">Authentification</h1>
        </div>
        <form action="authentifier.php" method="POST" class="form">
            <label style="color: #797D7F;">Login</label><br>
            <input type="text" name="login" style="width: 300px;"><br>
            <label style="color: #797D7F;">Mot de passe</label><br>
            <input type="password" name="password" style="width: 300px;"><br><br>
            <button type="submit" style="background: #E0FFFF; color: black; border-radius:8px;"><strong>S'authentifier</strong></button>
        </form>

        <?php
        $host = 'localhost';
        $dbname = 'gestionstagiaire';
        $dbusername = 'root';
        $dbpassword = '';

        
            $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
            $pdo = new PDO($dsn, $dbusername, $dbpassword);
            

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login = $_POST['login'];
                $password = $_POST['password'];

                if (empty($login) || empty($password)) {
                    echo "<script>alert('Les données d’authentification sont obligatoires');</script>";
                } else {
                    $stmt = $pdo->prepare("SELECT * FROM compteadministrateur WHERE LoginAdmin = ? AND MotPasse = ?");
                    $stmt->execute([$login, $password]);
                    $administrateur = $stmt->fetch();

                    if ($administrateur) {
                        session_start();
                        $_SESSION['Nom'] = $administrateur['Nom'];
                        $_SESSION['Prenom'] = $administrateur['Prenom'];
                        header("Location: espaceprivee.php");
                        
                    } 
                    else{
                        echo "<script>alert('les donner d'authentification sont incorrect ')</script>";
                    }
                }
            }
        ?>
    </div>
</body>
</html>
