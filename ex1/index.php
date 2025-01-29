<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action='create.php' method='post'>
        Client:<input type="text" name='client'><br><br>
        ville<input type="text" name="ville" ><br><br>
        pays <input type="text" name="pays" ><br><br>
        Quantite <input type="number" name="quantite" ><br><br>
        Total <input type="number" name="total" ><br><br>
        <button>OK</button>
    </form>

    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>ville</th>
            <th> pays</th>
            <th> Quantite</th>
            <th> total</th>
            <th>delete</th>
            <th>Edit</th>
        </tr>
        <?php
        
        include 'read.php';
        foreach($results as $row){?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?=$row['client']?></td>
            <td><?=$row['ville']?></td>
            <td><?=$row['pays']?></td>
            <td><?=$row['quantite']?></td>
            <td><?=$row['total']?></td>
            <td><a href="delete.php?id=<?= $row['id'] ?>"   onclick = "return confirm('are you sure ')">DELETE</a></td>
            <td><a href="edit.php?id=<?= $row['id'] ?>"   >EDIT</a></td>
          
        </tr>

        <?php  }?>
    </table>
</body>
</html>