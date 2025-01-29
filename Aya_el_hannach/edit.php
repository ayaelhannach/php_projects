<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id'];?>">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?php echo $user['nom'];?>"><br><br>
        
        <label for="email">Email  </label>
        <input type="email" name="email" id="email" value="<?php echo $user['email'];?>"><br><br>
        
        <button type="submit" >submit</button>
    </form>

    <?php
    include "db.php";
    $id =$_GET['id'];
    $edit = "SELECT *FROM etudiant WHERE id='$id'";
    $user = $pdo->query($edit)->fetch();

    
    

?>


    
    
</body>
</html>