<?php
include '../../Backend/includes/connect.php';
include '../../Backend/includes/session.php';

if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];

    $cart_query = "SELECT order_items.*, products.product_name, products.price, products.image
                   FROM order_items
                   INNER JOIN products ON order_items.product_ID = products.product_ID
                   WHERE order_items.user_ID = $userID";

    $cart_query_run = mysqli_query($con, $cart_query);

    if ($cart_query_run) {
        $cart_items = array();

        while ($row = mysqli_fetch_assoc($cart_query_run)) {
            $cart_items[] = $row;
        }

        echo json_encode($cart_items);
    } else {
        echo json_encode(array('error' => 'Failed to fetch cart items.'));
    }
} else {
    echo json_encode(array('error' => 'User not logged in.'));
}
?>
