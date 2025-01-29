<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
       <tr>
            <td>MatriculeProfesseur</td>
            <td>nom</td>
            <td>tel</td>
            <td>Action</td>
       </tr> 
       <?php
       include "db.php";
       $select = "SELECT * FROM professeur";
       $sql = $pdo->query($select)->fetchAll();
       foreach($sql as $row){
        ?>
        <tr>
            <td><?php echo $row['MatriculeProfesseur']?></td>
            <td><?php echo $row['nom']?></td>
            <td><?php echo $row['tel']?></td>
            <td><a href="edit.php?id=<?php echo $row['MatriculeProfesseur']?>">edit</a></td>
            <td><a href="dele.php?id=<?php echo $row['MatriculeProfesseur']?>">delete</a></td>
        </tr>
      <?php } ?>
    </table>
</body>
</html>
