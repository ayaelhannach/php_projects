<?php
// إضافة رؤوس CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

// معلومات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mosaicclient";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// الحصول على البيانات من النموذج
$client_name = $_POST['client_name'] ?? '';
$choice_1 = $_POST['choice_1'] ?? '';
$choice_2 = $_POST['choice_2'] ?? '';
$choice_3 = $_POST['choice_3'] ?? '';

// إعداد واستدعاء استعلام الإدخال
$sql = "INSERT INTO choices (client_name, choice_1, choice_2, choice_3) VALUES ('$client_name', '$choice_1', '$choice_2', '$choice_3')";

if ($conn->query($sql) === TRUE) {
    echo "Your choices have been saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// إغلاق الاتصال
$conn->close();
?>
