<?php
$servername = "sql310.infinityfree.com"; // Database server name
$username = "if0_36986933"; // Database username
$password = "xWZEknEzDQMu"; // Database password
$dbname = "if0_36986933_mosaic"; // Database name

// Create a new PDO connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Prepare and execute the SQL query
$sql = "SELECT * FROM client_data";
$stmt = $pdo->query($sql);

// Fetch all results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the connection
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Clients</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
    <div class="container">
        <h1>Client Data</h1>
        <?php if ($results && count($results) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Length</th>
                    <th>Width</th>
                    <th>Thickness</th>
                    <th>Finish</th>
                    <th>Edge Count</th>
                    <th>Edge Type</th>
                    <th>Has Fake Edge</th>
                    <th>Fake Edge Position</th>
                    <th>Fake Edge Width</th>
                    <th>Fake Edge Height</th>
                    <th>Fake Edge Thickness</th>
                    <th>Fake Edge Type</th>
                    <th>Sink Type</th>
                    <th>Sink Brand</th>
                    <th>Sink Reference</th>
                    <th>Sink Installation Plan</th>
                    <th>Sink Length</th>
                    <th>Sink Width</th>
                    <th>Sink Depth</th>
                    <th>Hob Type</th>
                    <th>Hob Brand</th>
                    <th>Hob Reference</th>
                    <th>Hob Length</th>
                    <th>Hob Width</th>
                    <th>Hob Depth</th>
                    <th>Number of Holes</th>
                    <th>Faucet Brand</th>
                    <th>Faucet Reference</th>
                    <th>Drainage</th>
                    <th>Material Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['length']); ?></td>
                    <td><?php echo htmlspecialchars($row['width']); ?></td>
                    <td><?php echo htmlspecialchars($row['thickness']); ?></td> 
                    <td><?php echo htmlspecialchars($row['finish']); ?></td>
                    <td><?php echo htmlspecialchars($row['edge_count']); ?></td>
                    <td><?php echo htmlspecialchars($row['edge_type']); ?></td>
                    <td><?php echo $row['has_fake_edge'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo htmlspecialchars($row['fake_edge_position']); ?></td>
                    <td><?php echo htmlspecialchars($row['fake_edge_width']); ?></td>
                    <td><?php echo htmlspecialchars($row['fake_edge_height']); ?></td>
                    <td><?php echo htmlspecialchars($row['fake_edge_thickness']); ?></td>
                    <td><?php echo htmlspecialchars($row['fake_edge_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['sink_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['sink_brand']); ?></td>
                    <td><?php echo htmlspecialchars($row['sink_reference']); ?></td>
                    <td><?php echo htmlspecialchars($row['sink_installation_plan']); ?></td>
                    <td><?php echo htmlspecialchars($row['sink_length']); ?></td>
                    <td><?php echo htmlspecialchars($row['sink_width']); ?></td>
                    <td><?php echo htmlspecialchars($row['sink_depth']); ?></td>
                    <td><?php echo htmlspecialchars($row['hob_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['hob_brand']); ?></td>
                    <td><?php echo htmlspecialchars($row['hob_reference']); ?></td>
                    <td><?php echo htmlspecialchars($row['hob_length']); ?></td>
                    <td><?php echo htmlspecialchars($row['hob_width']); ?></td>
                    <td><?php echo htmlspecialchars($row['hob_depth']); ?></td>
                    <td><?php echo htmlspecialchars($row['number_of_holes']); ?></td>
                    <td><?php echo htmlspecialchars($row['faucet_brand']); ?></td>
                    <td><?php echo htmlspecialchars($row['faucet_reference']); ?></td>
                    <td><?php echo htmlspecialchars($row['drainage']); ?></td>
                    <td><?php echo htmlspecialchars($row['material_type']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No data available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
