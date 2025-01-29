<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        nom: <input type="text" name="nom" id=""><br>
        date: <input type="date" name="date" id=""><br>
        tel: <input type="tel" name="tel" id=""><br>
        email: <input type="text" name="email" id=""><br>
        mot de pass: <input type="password" name="password" id=""><br>
        <input type="submit" value="ajouter">
    </form>
  <a href="authentification.php">authentification</a>
    <?php
include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nom=$_POST['nom'];
    $date=$_POST['date'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $password=$_POST['password'];
  
    if(empty($nom) || empty($date) || empty($tel) || empty($email) || empty($password)){
        echo "<script>alert('Les données d\'authentification sont obligatoires.');</script>"; 
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('L\'adresse email doit avoir un format incorrect.');</script>";
    }
    else{
       
        $insert="INSERT INTO etudiant(nom,date,tel,email,pass)VALUES('$nom','$date','$tel','$email','$password')";
        $stm=$pdo->exec($insert);
       

    

        exit();
    }
   

}

   
    ?>
</body>
</html>