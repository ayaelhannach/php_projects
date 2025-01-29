<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Choices</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Client Choices</h1>
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "client_choices";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT client_name, choice_1, choice_2, choice_3, created_at FROM choices";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table border='1'>";
        echo "<tr><th>Client Name</th><th>Choice 1</th><th>Choice 2</th><th>Choice 3</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["client_name"] . "</td>";
            echo "<td>" . $row["choice_1"] . "</td>";
            echo "<td>" . $row["choice_2"] . "</td>";
            echo "<td>" . $row["choice_3"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No choices recorded yet.";
    }


    $conn->close();
    ?>
</body>
</html>
