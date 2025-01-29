<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Affaire</title>
</head>
<body>
    <?php
        include '2023_06_Conn.php';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idAffaire = $_POST['IdAffaire'];
            $objet = $_POST['objet'];
            $etat = $_POST['etat'];
            $typeAff = $_POST['typeAff'];
            $dateOv = $_POST['dateOv'];
            $NomPr = $_POST['NomPr'];

            $photojg = $_FILES['PhotoJg']['name'];
            $target = "uploads/";
            $target_file = $target . basename($photojg);

            if($photojg) {
                
                move_uploaded_file($_FILES['PhotoJg']['tmp_name'], $target_file);
                $sql = "UPDATE affaire SET Objet=?, Etat=?, Type=?, DateOvr=?, Client=?, PhotoJg=? WHERE IdAffaire=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$objet, $etat, $typeAff, $dateOv, $NomPr, $target_file, $idAffaire]);
            } else {
                
                $sql = "UPDATE affaire SET Objet=?, Etat=?, Type=?, DateOvr=?, Client=? WHERE IdAffaire=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$objet, $etat, $typeAff, $dateOv, $NomPr, $idAffaire]);
            }

            header('Location: 2023_06_accueilavocat.php');
            exit();
        }

        if(isset($_GET['IdAffaire'])){
            $idAffaire = $_GET['IdAffaire'];
            $sql = "SELECT * FROM affaire WHERE IdAffaire=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idAffaire]);
            $affaire = $stmt->fetch();
        }
    ?>

    <h1>Modifier Affaire</h1>
        
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="IdAffaire" value="<?php echo $affaire['IdAffaire']; ?>">
        
        <label for="objet">Objet Affaire</label>
        <input type="text" id="objet" name="objet" value="<?php echo $affaire['Objet']; ?>" required><br><br>
        
        <label for="etat">État Affaire</label>
        <select id="etat" name="etat" required>
            <option value="En cours de traitement" <?php if($affaire['Etat'] == 'En cours de traitement') echo 'selected'; ?>>En cours de traitement</option>
            <option value="En cours de jugement" <?php if($affaire['Etat'] == 'En cours de jugement') echo 'selected'; ?>>En cours de jugement</option>
            <option value="Jugée" <?php if($affaire['Etat'] == 'Jugée') echo 'selected'; ?>>Jugée</option>
            <option value="Jugée et cloturée" <?php if($affaire['Etat'] == 'Jugée et cloturée') echo 'selected'; ?>>Jugée et cloturée</option>
        </select><br><br>
       
        <label for="typeAff">Type Affaire</label>
        <select id="typeAff" name="typeAff" required>
            <option value="Affaire pénale" <?php if($affaire['Type'] == 'Affaire pénale') echo 'selected'; ?>>Affaire pénale</option>
            <option value="Affaire Civile" <?php if($affaire['Type'] == 'Affaire Civile') echo 'selected'; ?>>Affaire Civile</option>
            <option value="Affaire Administrative" <?php if($affaire['Type'] == 'Affaire Administrative') echo 'selected'; ?>>Affaire Administrative</option>
            <option value="Affaire commerciale" <?php if($affaire['Type'] == 'Affaire commerciale') echo 'selected'; ?>>Affaire commerciale</option>
        </select><br><br>

        <label>Date Ouverture dossier :</label>
        <input type="date" name="dateOv" value="<?php echo $affaire['DateOvr']; ?>" required><br><br>

        <label>Nom Prenom client :</label>
        <input type="text" name="NomPr" value="<?php echo $affaire['Client']; ?>" required><br><br>

        
        <label>Photo DE Jugement :</label>
        <input type="file" name="PhotoJg"><br><br>
        
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
