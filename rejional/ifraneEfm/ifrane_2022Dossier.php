<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    $host = 'localhost';
    $dbname = 'ifran_2022';
    $dbusername = 'root';
    $dbpassword = '';

    $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DatePot = $_POST['DatePot'];
        $MontantR = $_POST['MontantR'];
        $DateT = $_POST['DateT'];
        $LienM = $_POST['LienM'];
        $NumMaladie = $_POST['NumMaladie'];
        $Matricule = $_POST['Matricule'];
        $TotalDossier = $_POST['TotalDossier'];

        if(!empty($DatePot) && !empty($MontantR) && !empty($DateT) && !empty($LienM) && !empty($NumMaladie) && !empty($Matricule) && !empty($TotalDossier)){
            $insert = "INSERT INTO dossier (DatePot, MontantR, DateT, LienM, Matricule, NumMaladie, TotalDossier) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($insert);
            $stmt->execute([$DatePot, $MontantR, $DateT, $LienM, $Matricule, $NumMaladie, $TotalDossier]);
            echo "<script>alert('Dossier ajouté avec succès');</script>";
        } else {
            echo "<script>alert('Tous les champs sont obligatoires.');</script>";
        }
    }

    $assures = 'SELECT * FROM assure';
    $sql = $pdo->query($assures)->fetchAll();
    $maladie = 'SELECT * FROM maladie';
    $asql = $pdo->query($maladie)->fetchAll();
    ?>

    <form method='post'>
        <label for="DatePot">Date de dépôt</label>
        <input type="date" name="DatePot" id="DatePot" required><br><br>
        <label for="MontantR">MontantR</label>
        <input type="number" name="MontantR" id="MontantR" required><br><br>
        <label for="date">Date T</label>
        <input type="date" name="DateT" id="date" required><br><br>
        <label for="LienM">LienM</label>
        <input type="text" name="LienM" id="LienM" required><br><br>
        <label for="Matricule">Matricule</label>
        <select name="Matricule" id="Matricule" required>
        <?php 
        foreach($sql as $assure){
            echo "<option value='".$assure['Matricule']."'>".$assure['NomAss']." ".$assure['PrenomASS']."</option>";
        } ?>
        </select><br><br>
        <label for="NumMaladie">Numéro de Maladie</label>
        <select name="NumMaladie" id="NumMaladie" required>
        <?php
        foreach($asql as $maladie){
            echo "<option value='".$maladie['NumMaladie']."'>".$maladie['DesignationM']."</option>";
        } ?>
        </select><br><br>
        <label for="TotalDossier">TotalDossier</label>
        <input type="number" name="TotalDossier" id="TotalDossier" required><br><br>
        <input type="submit" value="Ajouter">
    </form>

    

</body>
</html> 
