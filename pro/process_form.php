<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "client_choices";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$client_name = $_POST['client_name'];
$choice_1 = $_POST['choice_1'];
$choice_2 = $_POST['choice_2'];
$choice_3 = $_POST['choice_3'];


$sql = "INSERT INTO choices (client_name, choice_1, choice_2, choice_3) VALUES ('$client_name', '$choice_1', '$choice_2', '$choice_3')";

if ($conn->query($sql) === TRUE) {
    echo "Your choices have been saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
