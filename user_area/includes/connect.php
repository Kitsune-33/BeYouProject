
<?php

$servername = "localhost";
$username = "Hamii";
$password = "4M9TZedhhxxd-PFP";
$database = "BeYou";

$con = new mysqli($servername, $username, $password, $database);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$result = $con;

?>
