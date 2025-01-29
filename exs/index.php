<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="POST">
        <label for="FirstName">First Name </label>
        <input type="text" name="Firstname" id="FirstName"><br><br>
        
        <label for="email">Email  </label>
        <input type="email" name="email" id="email"><br><br>
        <label for="tel">Telephone </label>
        <input type="tel" name="tel" id="tel"><br><br>
        <button type="submit">Soumettre</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php
        include 'read.php';
        
         foreach ($results as $result) { ?>
        <tr>
            <td><?php echo $result['id'] ?></td>
            <td><?= $result['firstname'] ?></td>
            <td><?= $result['email'] ?></td>
            <td><?= $result['Telephone'] ?></td>
            <td><a href="delete.php?id=<?= $result['id'] ?>" onclick = "return confirm('are you sure ')">DELETE</a></td>
            <td><a href="edit.php?id=<?= $result['id'] ?>" >Edit</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>