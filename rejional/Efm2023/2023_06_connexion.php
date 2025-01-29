<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="margin-left:200px;">E-ALWYER</h1><br><br>
    <h3>Page de connexion</h3>
    <form action="" method="POST">
        <label for="Login">Login :</label><br>
        <input type="text" placeholder="username" name="Login" id="Login" required><br><br>

        <label for="Password">Mot De Passe :</label><br>
        <input type="password" placeholder="Password" name="Password" id="Password" required><br><br>

        <button type="submit">SE Connecter</button><br><br>

        <input type="checkbox" name="remember"> Se Souvenir de moi ?
    </form>

    <?php
        include '2023_06_Conn.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Login = $_POST['Login'];
            $Password = $_POST['Password'];

            $stmt = $pdo->prepare("SELECT * FROM compte WHERE Login = ? AND Password = ?");
            $stmt->execute([$Login, $Password]);
            $compte = $stmt->fetch();

            

            if ($compte) {
                session_start();

                
                header('Location: 2023_06_accueilavocat.php');
                exit();
            } else {
                echo "<script>alert('Les données d’authentification sont incorrectes.');</script>";
            }
            
            if(isset($_POST['remember'])){
                setcookie("login" ,$Login,time()+(60*60*24*30),"/");
                setcookie("password" ,$Password ,time()+(60*60*24*30),"/");
            }
        }

        

        
    ?>
</body>
</html>
