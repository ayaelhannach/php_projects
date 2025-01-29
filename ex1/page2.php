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
        //print_r()katrja3 l variable 3la xakl tableau
    ?>
    <h1>Bonjour <?php echo $_SESSION['email']?></h1>
    <a href="page1.php" >Page1</a><br>
    <a href="page2.php" >Page2</a>
</body>
</html>
