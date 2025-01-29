<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Privé</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['Nom']) || !isset($_SESSION['Prenom'])) {
        header("Location: authentifier.php");
        exit();
    }

    $hour = date('H');
    if ($hour >= 0 && $hour < 12) {
        echo "<h1 style='margin-left:400px; color:#5EA7D4'>Bonjour " . $_SESSION['Nom'] . " " . $_SESSION['Prenom'] . "</h1>";
    } elseif ($hour >= 12 && $hour < 18) {
        echo "<h1 style='margin-left:400px; color:#5EA7D4'>Bonsoir " . $_SESSION['Nom'] . " " . $_SESSION['Prenom'] . "</h1>";
    } else {
        echo "<h1 style='margin-left:400px; color:#5EA7D4'>Bonne nuit " . $_SESSION['Nom'] . " " . $_SESSION['Prenom'] . "</h1>";
    }
    ?>

    <button type="button" style="margin:100px; background:#94C8E8; width:100px;"><a href="InsererStagiaire.php" style="text-decoration:none; color:black;">+Ajouter</a></button>
    <button type="button" style="margin:100px; margin-left:500px; background:#94C8E8; width:150px;"><a href="deconnecter.php" style="text-decoration:none; color:black;"> -Se Deconnecter</a></button>

    <table border='1' style="margin-left:300px; margin-bottom:100px;">
        <tr>
            <th style="background:#CAE4F3;">Nom</th>
            <th style="background:#CAE4F3;">Prenom</th>
            <th style="background:#CAE4F3;">Date De Naissance</th>
            <th style="background:#CAE4F3;">Filiere</th>
            <th style="background:#CAE4F3;">Photo Profil</th>
            <th style="background:#CAE4F3;">Modifier</th>
            <th style="background:#CAE4F3;">Supprimer</
        </tr>
        <?php
        $shot = 'localhost';
        $dbname = 'gestionstagiaire';
        $username = "root";
        $password = "";

        try {
            $dsn = "mysql:host=$shot;dbname=$dbname;charset=utf8";
            $pdo = new PDO($dsn, $username, $password);
            
            $sql = "SELECT * FROM stagiaire";
            $stmt = $pdo->query($sql);
            $stagiaires = $stmt->fetchAll();

            foreach ($stagiaires as $stagiaire) {
                echo "<tr>
                    <td>{$stagiaire['nom']}</td>
                    <td>{$stagiaire['prenom']}</td>
                    <td>{$stagiaire['dateNaissance']}</td>
                    <td>{$stagiaire['idFiliere']}</td>
                    <td><img src='{$stagiaire['PhotoProfil']}' alt='Photo de Profil' width='50'></td>
                    <td><a href='modifierStagiaire.php?idStagiaire={$stagiaire['idStagiaire']}'><i class='fa-solid fa-pen' style='color:green;'></i></a></td>
                    <td><a href='supprimerStagiaire.php?idStagiaire={$stagiaire['idStagiaire']}'><i class='fas fa-trash' style='color:red;'></i></a></td>
                </tr>" ;
            }
        } catch (PDOException $e) {
            echo "Erreur connextion: " . $e->getMessage();
        }
        ?>
    </table>
</body>
</html>
