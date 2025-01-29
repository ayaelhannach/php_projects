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
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $select = "SELECT * FROM dossier WHERE NumDossier='$id'";
        $result = $pdo->query($select)->fetch();

        $assures = 'SELECT * FROM assure';
        $assureResults = $pdo->query($assures)->fetchAll();

        $maladie = 'SELECT * FROM maladie';
        $maladieResults = $pdo->query($maladie)->fetchAll();

        if ($_SERVER['REQUEST_METHOD']==='POST') {
            
            $NumDossier = $_POST['NumDossier'];
            $DatePot = $_POST['DatePot'];
            $MontantR = $_POST['MontantR'];
            $date = $_POST['DateT'];
            $LienM = $_POST['LienM'];
            $Matricule = $_POST['Matricule'];
            $NumMaladie = $_POST['NumMaladie'];
            $TotalDossier = $_POST['TotalDossier'];

            if (!empty($DatePot) && !empty($MontantR) && !empty($date) && !empty($LienM) && !empty($NumMaladie) && !empty($Matricule) && !empty($TotalDossier)) {
                if (filter_var($NumDossier, FILTER_VALIDATE_INT)) {
                    $update = "UPDATE dossier SET DatePot='$DatePot', MontantR='$MontantR', DateT='$date', LienM='$LienM', Matricule='$Matricule', NumMaladie='$NumMaladie', TotalDossier='$TotalDossier' WHERE NumDossier='$NumDossier'";
                    $reul = $pdo->exec($update);
                    header('location:ifrane_2022DossieMise.php');
                    exit;
                } else {
                    echo "<script>alert('Le Numéro doit être un entier (0,1,2.....).');</script>";
                }
            } else {
                echo "<script>alert('Les données d\'authentification sont obligatoires.');</script>";
            }
        }
    }
       
    ?>

    <form method='post' action=''>
        <input type="hidden" name="NumDossier" value='<?php echo $result['NumDossier']?>'><br><br>
        
        <label for="DatePot">Date de dépôt</label>
        <input type="date" name="DatePot" id="DatePot" value='<?php echo $result['DatePot']?>'><br><br>
        
        <label for="MontantR">MontantR</label>
        <input type="number" name="MontantR" id="MontantR" value='<?php echo $result['MontantR']?>'><br><br>
        
        <label for="date">Date</label>
        <input type="date" name="DateT" id="date" value='<?php echo $result['DateT']?>'><br><br>
        
        <label for="LienM">LienM</label>
        <input type="text" name="LienM" id="LienM" value='<?php echo $result['LienM']?>'><br><br>
        
        <label for="Matricule">Matricule</label>
        <select name="Matricule" id="Matricule">
        <?php 
        foreach ($assureResults as $assure) {
            $selected = ($assure['Matricule'] == $result['Matricule']) ? 'selected' : '';
            echo "<option value='".$assure['Matricule']."' $selected>".$assure['NomAss']." ".$assure['PrenomASS']."</option>";
        } ?>
        </select><br><br>
        
        <label for="NumMaladie">Numéro de Maladie</label>
        <select name="NumMaladie" id="NumMaladie">
        <?php
        foreach ($maladieResults as $maladie) {
            $selected = ($maladie['NumMaladie'] == $result['NumMaladie']) ? 'selected' : '';
            echo "<option value='".$maladie['NumMaladie']."' $selected>".$maladie['DesignationM']."</option>";
        } ?>
        </select><br><br>
        
        <label for="TotalDossier">TotalDossier</label>
        <input type="number" name="TotalDossier" id="TotalDossier" value='<?php echo $result['TotalDossier']?>'><br><br>
        
        <input type="submit" name="modifier" value="Modifier">
    </form><br><br><button type="submit"><a href="ifrane_2022SelectDoss.php">selection </a></button>

</body>
</html>