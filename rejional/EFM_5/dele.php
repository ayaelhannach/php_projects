<?php
include 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
       
        $deleteCours = "DELETE FROM cours WHERE matriculeProffesseur = :id";
        $stmtCours = $pdo->prepare($deleteCours);
        $stmtCours->bindParam(':id', $id, PDO::PARAM_STR);
        $stmtCours->execute();


        $deleteProf = "DELETE FROM professeur WHERE MatriculeProfesseur = :id";
        $stmtProf = $pdo->prepare($deleteProf);
        $stmtProf->bindParam(':id', $id, PDO::PARAM_STR);
        $stmtProf->execute();

        header('Location: prof.php');
        exit();
    } catch (PDOException $e) {
        echo "Une erreur s'est produite lors de la tentative de suppression : " . $e->getMessage();
    }
} 
?>
