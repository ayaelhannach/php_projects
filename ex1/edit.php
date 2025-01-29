<?php
        include "db.php";
        $id=$_GET['id'];
        $edit="SELECT* FROM commandes WHERE id='$id'";
        $user=$pdo->query($edit)->fetch();
?>

        <form action='update.php'  method='post'>
                <input type="hidden" name="id"  value='<?php echo $user['id'];?>'>
                Client:<input type="text" name='client'  value='<?php echo $user['client'];?>'><br><br>
                ville<input type="text" name="ville"  value='<?php echo $user['ville'];?>'><br><br>
                pays <input type="text" name="pays"  value='<?php echo $user['pays'];?>'><br><br>
                Quantite <input type="number" name="quantite"  value='<?php echo $user['quantite'];?>'><br><br>
                Total <input type="number" name="total"  value='<?php echo $user['total'];?>'><br><br>
                <button>OK</button>
        </form>