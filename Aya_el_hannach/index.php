<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Creer un etudiant</h1>
    <form action="create.php" methode="POST">
        <label name="nom" >Nom</label><br>
        <input type="text" name="nom"><br><br>
        <label name="email">Email</label><br>
        <input type="email" name="email"><br><br>
        <button type="submit" >Creer un etudiant</button>
    </form><br><br>

    <h1>Tous les etudiants</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Action</th>

            
        </tr>
        <?php
        
       
        include 'header.php';
        foreach ($results as $result) { ?>
        <tr>
            <td><?php echo $result['id'] ?></td>
            <td><?= $result['nom'] ?></td>
            <td><?= $result['email'] ?></td>
            <td>
                <a href="delete.php?id=<?= $result['id'] ?>" onclick = "return confirm('are you sure ')">Delete</a>
                <a href="edit.php?id=<?=$result['id'] ?>">Edit</a>
            </td>
            
        </tr>
        <?php } ?>
    </table>
   

</body>
</html>