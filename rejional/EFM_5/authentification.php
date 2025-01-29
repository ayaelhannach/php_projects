<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include 'db.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $select = "SELECT * FROM etudiant WHERE email='$email'";
        $rus = $pdo->query($select)->fetch();
        if($rus && $rus['pass'] == $password){
            $_SESSION['nom'] = $rus['nom'];
            $_SESSION['date'] = $rus['date'];
            header("Location: authentification.php");
            exit();
        } else {
         echo "<script>alert('Email or password incorrect');</script>";
        }
    }
    ?>
    <form method="post">
        <label>email</label><br>
        <input type="email" name="email" required><br>
        <label>password</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Ajouter" name="ajouter">
    </form>

    <?php if(isset($_SESSION['nom'])):
        echo "<h1>Bonjour ". $_SESSION['nom']."</h1>";
     endif; ?>
</body>
</html>
