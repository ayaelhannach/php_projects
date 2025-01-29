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
        $_SESSION['nom'] ='aya';
        print_r($_SESSION);

    ?>
    <h1>Bonjour <?php echo $_SESSION['email']?></h1>
    <a href="page1.php" >Page1</a>
    <a href="page2.php" >Page2</a>
    <a href="out.php">logout</a>



</body>
</html>