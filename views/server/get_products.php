<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "programmer1_maindb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getProductsByCategory($categoryId, $conn) {
    $sql = "SELECT * FROM products WHERE id = ? OR pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $categoryId, $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
echo "Debug: " . json_encode($row);


            if ($row['type'] == 'category') {
                $subProducts = getProductsByCategory($row['id'], $conn);
                $products = array_merge($products, $subProducts);
            }
        }
    }

    return $products;
}


if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];

    try {
        $allProducts = getProductsByCategory($categoryId, $conn);
        echo json_encode($allProducts, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
} else {
    echo json_encode(array('error' => 'Category ID is not set.'));
}

$conn->close();
?>
