<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $filiere = $_POST['filiere'];

    $host = 'localhost';
    $dbname = 'kn';
    $username = 'root';
    $password = '';

    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $pdo = new PDO($dsn, $username, $password);

        $Ins = "INSERT INTO stagiaire (code, Nom, Prenom, sexe, filiere) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($Ins);
        $stmt->execute([$code, $nom, $prenom, $sexe, $filiere]);

        echo "<script>alert('insertion stagiaire successfly');</script>";
        header('Location: knitra.php');
        exit;

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
