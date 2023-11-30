<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>

<body>

    <div class="container-fluid p-0 position-relative mt-3">
        <div class="row">
            <div class="col-12">
                <img src="../user_area/img/banner.png" class="img-fluid w-100">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "<h1 class='position-absolute top-50 start-0 text-center text-white'>Welcome <br> $username</h1>";
                    echo "<h1>Sikeres bejelentkezés!</h1>";
                    echo '<p>Üdvözlünk a webáruházunkban.</p>';
                    echo '<a href="profilepage.php"><button>Profil oldal megnyitása</button></a>';
                    echo '<br><br><a href="loginpage.php"><button>Kijelentkezés</button></a>';
                } else {
                    echo "<h1>Sikeres bejelentkezés!</h1>";
                    echo '<p>Üdvözlünk a webáruházunkban.</p>';
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>
