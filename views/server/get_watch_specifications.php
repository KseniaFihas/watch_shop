<?php
//
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "programmer1_maindb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$modelNumber = $_GET['model_number'];


$sql = "SELECT * FROM watches WHERE model_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $modelNumber);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(array('error' => 'Watch specifications not found'), JSON_UNESCAPED_UNICODE);
}

$conn->close();
?>