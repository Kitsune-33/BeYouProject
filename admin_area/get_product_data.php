<?php
header('Content-Type: application/json');
error_log("Hibaüzenet: valami történt", 0);

include('../includes/connect.php');

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    $query = "SELECT 
            product_ID,
            product_name,
            price,
            description
          FROM products
          WHERE product_ID = ?";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $productId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Sikeres lekérdezés esetén küldjük vissza a termék adatait JSON formátumban
        echo json_encode($row);
    } else {
        // Sikertelen lekérdezés esetén küldünk hibaüzenetet JSON formátumban
        echo json_encode(['error' => 'Failed to retrieve product data.']);
    }
} else {
    // Ha nincs megfelelő adat a POST kérésben, küldünk hibaüzenetet JSON formátumban
    echo json_encode(['error' => 'Invalid request.']);
}

mysqli_close($con);
?>
