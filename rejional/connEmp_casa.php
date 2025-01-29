<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .menu {
            background: pink;
            padding: 10px;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
        }
        .menu li {
            display: inline;
            margin-right: 20px;
        }
        .menu a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="menu" id="menu">
        <ul class="list">
            <li class="inscrire">
                <a href="inscrire_casa.php">S'inscrire</a>
            </li>
            <li class="ListeVoyage">
                <a href="#ListeVoyage">Liste de Voyage</a>
            </li>
            <li class="seDeconnect">
                <a href="#seDeconnect">Se Deconnect</a>
            </li>
        </ul>
    </div><br><br> 

    <form action="" method="POST">
        <label for="user">User :</label><br>
        <input type="text" name="user" id="user"><br><br>
        <label for="pwd">Password :</label><br>
        <input type="password" name="pwd" id="pwd"><br><br>
        <button type="submit">Connecter</button>
    </form>
    <?php

        include 'conxDb_casa.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['user'];
            $password = $_POST['pwd'];

            $stmt = $pdo->prepare("SELECT * FROM employe WHERE user= ? AND pwd=?");
            $stmt->execute([$user, $password]);
            $employe = $stmt->fetch();

            if ($employe) {
                session_start();
                $_SESSION['user'] = $employe['user'];
                $_SESSION['pwd'] = $employe['pwd'];
               
            }
            else {
                echo "<script>alert('Les données d’authentification sont incorrectes.');</script>";
                header("Location: inscrire_casa.php");
            }
        }
    
    ?>
</body>
</html>