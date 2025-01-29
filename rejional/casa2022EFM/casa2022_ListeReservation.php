<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'casa2022';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupérer tous les types d'hôtels pour la liste déroulante
$sql = "SELECT idType, nombreEtoile FROM typehotel";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$types_hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si un type d'hôtel est sélectionné
$reservations = [];
if (isset($_POST['typehotel'])) {
    $typehotel = $_POST['typehotel'];
    $sql = "SELECT r.idReserv, r.idHotel, r.idclient, r.dateDebutS, r.dateFinS 
            FROM resercation r
            JOIN hotel h ON r.idHotel = h.idHotel
            WHERE h.idtype = :typehotel";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':typehotel', $typehotel, PDO::PARAM_INT);
    $stmt->execute();
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Réservations</title>
</head>
<body>
    <h1>Liste des Réservations</h1>
    
    <!-- Formulaire de sélection du type d'hôtel -->
    <form method="post" action="">
        <label for="typehotel">Type d'hôtel :</label>
        <select name="typehotel" id="typehotel" required>
            <option value="">Sélectionnez un type d'hôtel</option>
            <?php foreach ($types_hotels as $type): ?>
                <option value="<?= $type['idType'] ?>"><?= $type['nombreEtoile'] ?> étoiles</option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Afficher les Réservations</button>
    </form>
    
    <!-- Affichage des réservations -->
    <?php if (!empty($reservations)): ?>
        <h2>Réservations pour le type d'hôtel sélectionné</h2>
        <table border="1">
            <tr>
                <th>ID Réservation</th>
                <th>ID Hôtel</th>
                <th>ID Client</th>
                <th>Date de début de séjour</th>
                <th>Date de fin de séjour</th>
            </tr>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= $reservation['idReserv'] ?></td>
                    <td><?= $reservation['idHotel'] ?></td>
                    <td><?= $reservation['idclient'] ?></td>
                    <td><?= $reservation['dateDebutS'] ?></td>
                    <td><?= $reservation['dateFinS'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (isset($_POST['typehotel'])): ?>
        <p>Aucune réservation trouvée pour ce type d'hôtel.</p>
    <?php endif; 
       
    ?>
</body>
</html>
