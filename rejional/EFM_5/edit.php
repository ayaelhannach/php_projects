<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
include "db.php";
$id = $_GET['id'];
$edit = "SELECT * FROM professeur WHERE MatriculeProfesseur='$id'";
$user = $pdo->query($edit)->fetch();
?>
<body>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['MatriculeProfesseur'] ?>">
        <label for="nom">nom</label>
        <input type="text" name="nom" value="<?php echo $user['nom'] ?>">
        <label for="tel">tel</label>
        <input type="tel" name="tel" value="<?php echo $user['tel'] ?>">
        <input type="submit" value="modifier">
    </form>
</body>
</html>
