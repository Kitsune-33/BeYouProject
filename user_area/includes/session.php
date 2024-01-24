<?php
session_start();
include '../includes/connect.php';

// Bejelentkezés ellenőrzése
if (isset($_SESSION['user_username'])) {
    $user_ID = $_SESSION['user_id'];
    $username = $_SESSION['user_username'];
    $user_email = $_SESSION['user_email'];
    $is_logged_in = true;

    // SQL lekérdezés a felhasználó adatainak lekéréséhez
    $user_query = "SELECT * FROM user_table WHERE username = '$username'";
    $result_user = mysqli_query($con, $user_query);

    // Ellenőrizzük, hogy a lekérdezés sikeres volt-e
    if ($result_user) {
        $row_user = mysqli_fetch_assoc($result_user);

        // Felhasználó adatainak tárolása változókban
        $name = $row_user['name'];
        $gender = $row_user['gender'];
        $birthdate = $row_user['birthdate'];
        $email = $row_user['email'];
        $phonenumber = $row_user['phone_number'];

        // SQL lekérdezés a szállítási adatok lekéréséhez
        $shipping_query = "SELECT * FROM shipping_addresses WHERE user_ID = $user_ID";
        $result_shipping = mysqli_query($con, $shipping_query);

        // Ellenőrizzük, hogy a lekérdezés sikeres volt-e
        if ($result_shipping) {
            $row_shipping = mysqli_fetch_assoc($result_shipping);

            // Szállítási adatok tárolása változókban
            $country = $row_shipping['country'];
            $postal_code = $row_shipping['postal_code'];
            $street_address = $row_shipping['street_address'];
            $city = $row_shipping['city'];

            // SQL lekérdezés a korábbi rendelések lekéréséhez
            $order_query = "SELECT * FROM orders WHERE user_ID = $user_ID ORDER BY order_date DESC LIMIT 1";
            $result_order = mysqli_query($con, $order_query);

            // Ellenőrizzük, hogy volt-e korábbi rendelés
            if ($result_order && mysqli_num_rows($result_order) > 0) {
                $row_order = mysqli_fetch_assoc($result_order);
                $order_ID = $row_order['order_ID'];
            } else {
                $order_ID = "Nincs korábbi rendelés";
            }

            // Az adatokat a HTML-ben használd fel
        } else {
            // Hiba kezelése, ha a szállítási adatok lekérdezése nem volt sikeres
            echo "Hiba a szállítási adatok lekérdezésekor: " . mysqli_error($con);
        }
    } else {
        // Hiba kezelése, ha a felhasználó adatainak lekérdezése nem volt sikeres
        echo "Hiba a felhasználó adatainak lekérdezésekor: " . mysqli_error($con);
    }
} else {
    $is_logged_in = false;
}
?>