<?php
    include "db.php";
    $id =$_GET['id'];
    $edit = "SELECT *FROM tab_ex2 WHERE id='$id'";

    $user = $pdo->query($edit)->fetch();

?>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id'];?>">
        <label for="FirstName">First Name </label>
        <input type="text" name="Firstname" id="FirstName" value="<?php echo $user['firstname'];?>"><br><br>
        
        <label for="email">Email  </label>
        <input type="email" name="email" id="email" value="<?php echo $user['email'];?>"><br><br>
        <label for="tel">Telephone </label>
        <input type="tel" name="tel" id="tel" value="<?php echo $user['Telephone'];?>"><br><br>
        <button type="submit" value="update">Soumettre</button>
    </form>
    