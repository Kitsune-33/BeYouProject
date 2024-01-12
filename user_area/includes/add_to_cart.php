<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['user_id'];
    $productID = $_POST['product_id'];

    // Ellenőrizze, hogy a termék létezik az adatbázisban
    $checkProductQuery = "SELECT * FROM products WHERE product_ID = $productID";
    $checkProductResult = mysqli_query($con, $checkProductQuery);

    if (mysqli_num_rows($checkProductResult) > 0) {
        $productData = mysqli_fetch_assoc($checkProductResult);
        $productName = $productData['product_name'];
        $productPrice = $productData['price'];

        // Ellenőrizze, hogy van-e aktív rendelés a felhasználónak
        $checkOrderQuery = "SELECT * FROM orders WHERE user_ID = $userID AND status = 'Received'";
        $checkOrderResult = mysqli_query($con, $checkOrderQuery);

        if (mysqli_num_rows($checkOrderResult) > 0) {
            // Van aktív rendelés, hozzáadja a terméket a rendeléshez
            $orderData = mysqli_fetch_assoc($checkOrderResult);
            $orderID = $orderData['order_ID'];

            $insertToOrderItemsQuery = "INSERT INTO order_items (order_ID, product_ID, quantity, item_price,user_ID, status) VALUES ($orderID, $productID, 1, $productPrice,$userID, 'Cart') ON DUPLICATE KEY UPDATE quantity = quantity + 1, status = 'Cart'";
            $insertToOrderItemsResult = mysqli_query($con, $insertToOrderItemsQuery);

            if ($insertToOrderItemsResult) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Hiba a rendelés tételekhez adás közben.']);
            }
        } else {
            // Nincs aktív rendelés, létrehoz egy új rendelést
            $createOrderQuery = "INSERT INTO orders (user_ID) VALUES ($userID)";
            $createOrderResult = mysqli_query($con, $createOrderQuery);

            if ($createOrderResult) {
                $orderID = mysqli_insert_id($con);

                $insertToOrderItemsQuery = "INSERT INTO order_items (order_ID, product_ID, quantity, item_price, user_ID, status) VALUES ($orderID, $productID, 1, $productPrice, $userID, 'Cart')";
                $insertToOrderItemsResult = mysqli_query($con, $insertToOrderItemsQuery);

                if ($insertToOrderItemsResult) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Hiba a rendelés tételekhez adás közben.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Hiba az új rendelés létrehozása közben.']);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'A kiválasztott termék nem található.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Érvénytelen kérési metódus.']);
}
?>
