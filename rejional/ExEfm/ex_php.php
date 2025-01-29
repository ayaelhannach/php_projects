<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label name="nom" >Nom : </label><br>
        <input type="text" name="nom"><br><br>
        <label name="DateN">Date De Naissance : </label><br>
        <input type="date" name="DateN"><br><br>
        <label name="email">Email : </label><br>
        <input type="email" name="email"><br><br>
        <label name="tel">Tel : </label><br>
        <input type="tel" name="tel"><br><br>
        <label name="password">Mot De Passe</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit" >Ajouter</button>

    </form>

    <?php
        $host ='localhost';
        $dbname = 'ex_php';
        $username = 'root' ;
        $password = '';

        $dsn ="mysql:host=$host;dbname=$dbname;port=3306";

        $pdo = new PDO($dsn , $username,$password);

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $nom =$_POST['nom'];
            $DateN = $_POST['DateN'];
            $email = $_POST['email'];
            $tel =$_POST['tel'];
            $password = $_POST['password'];

            

            if (empty($nom) || empty($DateN) || empty($email) || empty($password)) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo 'valider email ';
                }
                else{
                    echo 'email form incorrecte';
                }
            } else {
                $insert = "INSERT INTO etudiant (Nom, DateN, Tel, Email, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($insert);
                $stmt->execute([$nom, $DateN, $tel, $email, $password]);
                
                session_start();
               
                $_SESSION['Nom'] = $_POST['nom'];
                header('Location: ex_phpPage2.php');
                exit();
            }

           
        }
    ?>



</body>
</html>