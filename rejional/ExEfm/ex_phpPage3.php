<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="" method="POST">
        <select name="codeEtd">  
            <?php
               
               $host ='localhost';
               $dbname = 'ex_php';
               $username = 'root';
               $password = '';
       
               $dsn = "mysql:host=$host;dbname=$dbname;port=3306";
       
               $pdo = new PDO($dsn, $username, $password);
               
               $sql = "SELECT *  FROM etudiant";
               $stmt = $pdo->query($sql);
               $etudiants = $stmt->fetchAll();
                foreach($etudiants as $etudiant){
                    echo "<option value='".$etudiant['CodeEtud']."'>".$etudiant['Nom'] ."</option>";
                }
            ?> 
        </select><br><br>
        <select name="NumCours">
            <?php
                $select = "SELECT * FROM cours";
                $stmt =$pdo->query($select);
                $cours = $stmt->fetchAll();

                foreach($cours as $cour){
                    echo "<option value='".$cour['NumCours']."'>".$cour['Titre']."</option>";
                }
                
            ?>
        </select><br><br>
        <input type="date" name="date"><br><br>
        <input type="number" name="note"><br><br>
        <button type="submit">Ajouter</button><br><br>
            </form>
        <?php
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $codeEtd = $_POST['codeEtd'];
                $NumCours = $_POST['NumCours'];
                $date = $_POST['date'];
                $note = $_POST['note'];

                if(!empty($codeEtd) && !empty($NumCours) && !empty($date) && !empty($note)){
                    $sqlState = $pdo->prepare('INSERT INTO examen (CodeEtud,NumCours , Date, NOTE) VALUES (?, ?, ?, ?)');
                    $sqlState->execute([$codeEtd, $NumCours, $date, $note]);
                    echo "Les données ont été ajoutées avec succès.";
                }
        

            }
        ?>


        
</body>
</html>