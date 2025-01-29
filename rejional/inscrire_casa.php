<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .menu {
            background: pink;
            padding: 10px;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
        }
        .menu li {
            display: inline;
            margin-right: 20px;
        }
        .menu a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="menu" id="menu">
        <ul class="list">
            <li class="ListeVoyage">
                <a href="#ListeVoyage">Liste de Voyage</a>
            </li>
            <li class="seDeconnect">
                <a href="#seDeconnect">Se Deconnect</a>
            </li>
        </ul>
    </div><br><br> 

    

    <?php

        include 'conxDb_casa.php';
        
        session_start();

        if(isset($_SESSION['nom']) || isset($_SESSION['fonction'] )) {
            echo "<h1>".$_SESSION['nom']." ".$_SESSION['fonction']."</h1>";
            
        } 
        else{
            header("Location: connEmp_casa.php");
            exit();
        }

    ?>


<form action="" method="POST">
    <label name="VilleD">Ville depart : </label>
        <select name="VilleD">
            <option></option>
        </select><br><br>
        <label name="VilleAr">Ville d'arrivee : </label>
        <select name="VilleAr">
            <option></option>
        </select><br><br>
        <label name="dateV">Date de voyage : </label>
        <input type="date" name="dateV"><br><br>

        <label name="NombreP">Nombre de personnes : </label>
        <input type="number" name="NombreP">
        <br><br>

        <button type="submit">Enregistrer</button>
    </form>

    <?php
        
        
        $shot = 'localhost';
        $dbname= 'entraprisevoyages';
        $username = 'root';
        $password = '';

        try {    

            $dsn = "mysql:host=$shot;dbname=$dbname;port=3306";
            $pdo = new PDO($dsn, $username, $password);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $ville_depart = $_POST['VilleD'];
        $ville_arrive = $_POST['VilleAr'];
        $date_voyage = $_POST['dateV'];
        $nombre_personnes = $_POST['NombreP'];

    // Retrieve the codeVoyage based on ville_depart and ville_arrive
    $select = "SELECT CodeVoyage  FROM voyage v
               JOIN descriptionvoyage d ON v.CodeDesc = d.CodeDesc
               WHERE d.villeD = :VilleD AND d.villeA = :VilleAr";
    $stmt = $pdo->prepare($select);
    $stmt->bindParam(':VilleD', $ville_depart);
    $stmt->bindParam(':VilleAr', $ville_arrive);
    $stmt->execute();
    $voyage = $stmt->fetch();

    if ($voyage) {
        $codeVoyage = $voyage['codeVoyage'];

        $insert = "INSERT INTO inscription (CodeEmp, CodeVoyage, nbrePers, DateVoy)
                   VALUES (:codeEmp, :CodeVoyage, :nbrePers, :DateVoy)";
        $stmt = $pdo->prepare($insert);
        
        $stmt->bindParam(':CodeVoyage', $codeVoyage);
        $stmt->bindParam(':nbrePers', $nombre_personnes);
        $stmt->bindParam(':DateVoy', $date_voyage);

        if ($stmt->execute()) {
            echo "<script>alert('Inscription ajoutée avec succès.'); window.location.href='sinscrire.php';</script>";
        } else {
            echo "<script>alert('Erreur lors de l\'ajout de l\'inscription.'); window.location.href='sinscrire.php';</script>";
        }
    } else {
        echo "<script>alert('Voyage non trouvé pour les villes sélectionnées.'); window.location.href='sinscrire.php';</script>";
    }
}



}catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
</body>
</html>


