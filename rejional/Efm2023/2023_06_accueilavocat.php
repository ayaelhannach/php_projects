<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Avocat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
                
    <?php
        session_start(); 


        include '2023_06_Conn.php'; 
        $stmt = $pdo->prepare("SELECT Nom, Prenom FROM avocat WHERE IdAvocat = 1");
        $stmt->execute();
        $avocat = $stmt->fetch();

        if ($avocat) {
            echo '<h1>Bienvenue ' . $avocat['Prenom'] . ' ' . $avocat['Nom'] . '</h1>';
        } 
    
        echo  date('m-d-y  h:i:sa');
    



    ?>
<br><br>
<button type="button"><a href="2023_AjouterAffaire.php">Ajouter</a></button>
<br><br>
<table border="1" >
        <tr>
            <th>
                <input type="checkbox">Objet Affaire 
            </th>
            <th>Etat</th>
            <th>Type</th>
            <th>Date Ouverture</th>
            <th>Nom Complet</th>
            <th>Description</th>
            
            <th>Photo de jugement</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
             include '2023_06_Conn.php'; 
            $sql ="SELECT *FROM affaire";
            $stmt = $pdo->query($sql);
            $affaires = $stmt->fetchAll();

            foreach($affaires as $affaire){
                echo "<tr>
                    <td><input type='checkbox'></td>
                    <td>{$affaire['Etat']}</td>
                    <td>{$affaire['Type']}</td>
                    <td>{$affaire['DateOvr']}</td>
                    <td>{$affaire['Client']}</td>
                    <td></td>
                    
                    <td><img src='{$affaire['PhotoJg']}' alt='' width='50'></td>
                    <td><a href='2023_modifierAffaire.php?IdAffaire={$affaire['IdAffaire']}'><i class='fa-solid fa-pen' style='color:green;'></i></a></td>
                    <td><a href='2023_supprimerAffaire.php?IdAffaire={$affaire['IdAffaire']}'><i class='fas fa-trash' style='color:red;'></i></a></td>
                    </tr>";
            }
        ?>
    </table>

</body>
</html>
