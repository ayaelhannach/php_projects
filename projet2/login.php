<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="parent">
        <h1>Authentification</h1>
        <form action="" method="POST" >
            login<br> <input type="text" name="login" require><br><br>
            Mot de Passe <br> <input type="password" name="password"><br><br>
            <input type="submit" name="submit" value="S'authentifier">
        </form>
    </div>

    <?php
        include 'db.php';

        try{
            $sdn = "mysql:host=$shot;dbname=$dbname;port=3306";
            $pdo = new PDO($sdn,$username,$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($_SERVER['REQUEST_METHOD']==='POST'){
                $login = $_POST['login'];
                $password = $_POST['password'];

                if(empty($loginn)|| empty($password)){
                    echo "<script>alert('Veuillez saisir un login et un mot de passe.')</script>";
                }
                else{
                    
                }
            }
        }
    ?>
        
</body>
</html>