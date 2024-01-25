<?php 
session_start();
session_destroy();
include '../../Backend/includes/connect.php';
include '../assets/header.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout page</title>
    <link rel="stylesheet" href="../../public/user_area/css/logout.css">
    <link rel="stylesheet" href="../../public/user_area/css/font_import.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

    <div class="tabla">
        <div class="kijelenkez">
            <a>Logout successful</a>
            <span class="szimbolum">
                <span class="material-symbols-outlined">
                lock
                </span>
            </span>
            <a  href="loginpage.php"><button type="submit" class="btn_logout">Login</button></a>
        </div>
    </div>

</body>
</html>



