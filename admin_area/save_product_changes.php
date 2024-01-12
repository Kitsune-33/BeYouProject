<?php
include('../includes/connect.php');

if (
    isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['product_description'])
) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productDescription = $_POST['product_description'];

    $query = "UPDATE products 
              SET product_name = ?, price = ?, description = ?
              WHERE product_ID = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $productName, $productPrice, $productDescription, $productId);
    
    if (mysqli_stmt_execute($stmt)) {
        $response = array('status' => 'success', 'message' => 'Changes saved successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Error saving changes.');
    }

    mysqli_stmt_close($stmt);
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request.');
}

// JSON válasz küldése
header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($con);
?>
