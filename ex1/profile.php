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
        $_SESSION['email'] =$_POST['email'];
        if(!isset($_SESSION['email'])){
            header("location:login.php");
        }
        else{
            echo "Bonjour :<b>". $_SESSION['email'] ."</b><br>";
        
    ?>
    <h3>Bonjour <?php echo $_SESSION['email']?></h3>
    <a href="logout.php">logout</a>
    
    <?php } ?>
</body>
</html>