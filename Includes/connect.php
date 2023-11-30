<!--Csatlakozás az adatbázishoz-->
<?php

$servername = "localhost";
$username = "Hamii";
$password = "4M9TZedhhxxd-PFP";
$database = "BeYou";

// Kapcsolódás az adatbázishoz
$con = new mysqli($servername, $username, $password, $database);

// Ellenőrizze a kapcsolatot
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// echo "Connection successful";                  Nem iratjuk ki
?>
