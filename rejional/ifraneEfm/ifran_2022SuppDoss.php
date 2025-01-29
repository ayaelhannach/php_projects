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

        

        $id = $_GET['id'];


        $deleteRubrique = "DELETE FROM rubrique WHERE NumDossier = '$id'";
        $pdo->exec($deleteRubrique);

        $deleteDossier = "DELETE FROM dossier WHERE NumDossier = '$id'";
        $pdo->exec($deleteDossier);

        header('location:ifrane_2022DossieMise.php');
?>

    
</body>
</html>
