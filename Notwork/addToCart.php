<?php
include('../includes/connect.php');
session_start();

if (isset($_POST['productID']) && isset($_POST['userID'])) {
    $productID = $_POST['productID'];
    $userID = $_POST['userID'];

    // Ellenőrzés: van-e már ilyen termék a kosárban
    $checkCartQuery = "SELECT * FROM cart WHERE user_ID = $userID AND product_ID = $productID";
    $checkCartResult = mysqli_query($con, $checkCartQuery);

    if (mysqli_num_rows($checkCartResult) > 0) {
        echo "A termék már szerepel a kosárban!";
    } else {
        // Kosárba helyezés
        $insertCartQuery = "INSERT INTO cart (user_ID, product_ID, quantity) VALUES ($userID, $productID, 1)";
        $insertCartResult = mysqli_query($con, $insertCartQuery);

        if ($insertCartResult) {
            echo "A termék sikeresen hozzá lett adva a kosárhoz!";
        } else {
            echo "Hiba a kosárba helyezés során!";
        }
    }
} else {
    echo "Érvénytelen kérés!";
}
?>
