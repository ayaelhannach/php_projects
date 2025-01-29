<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="email">Email : </label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Mot De Passe</label><br>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit">Connecter</button>
    </form>
    <?php
        $host ='localhost';
        $dbname = 'ex_php';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbname;port=3306";

        $pdo = new PDO($dsn, $username, $password);
        
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM etudiant WHERE Email = ? AND password = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $password]);
            

            if ($user) {
                $_SESSION['user'] = $stmt->fetch();
                
                if(isset($_SESSION['Email']) && isset($_SESSION['password'])){
                    echo 'Bonjour'.''.$_SESSION['nom'] ;
                }
                exit();
            } else {
                echo 'Erreur de connexion';
            }
        }
    ?>
</body>
</html>
