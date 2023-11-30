<?php
include('../includes/connect.php');
session_start();
    

// Ellenőrizzük, hogy a felhasználó bejelentkezett-e
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

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

        // SQL lekérdezés a szállítási adatok lekéréséhez
        $shipping_query = "SELECT * FROM shipping_addresses WHERE user_ID = " . $row_user['user_ID'];
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
            $order_query = "SELECT * FROM orders WHERE user_ID = " . $row_user['user_ID'] . " ORDER BY order_date DESC LIMIT 1";
            $result_order = mysqli_query($con, $order_query);

            // Ellenőrizzük, hogy volt-e korábbi rendelés
            if ($result_order && mysqli_num_rows($result_order) > 0) {
                $row_order = mysqli_fetch_assoc($result_order);
                $order_number = $row_order['order_number'];
            } else {
                $order_number = "Nincs korábbi rendelés";
            }

            // Az adatokat a HTML-ben használd fel
        } else {
            // Hiba kezelése, ha a szállítási adatok lekérdezése nem volt sikeres
            echo "Hiba a szállítási adatok lekérdezésekor";
        }
    } else {
        // Hiba kezelése, ha a felhasználó adatainak lekérdezése nem volt sikeres
        echo "Hiba a felhasználó adatainak lekérdezésekor";
    }
} else {
    // Ha a felhasználó nincs bejelentkezve, akkor további műveletek...
    echo "<p>Session fut, de nincs bejelentkezett felhasználó.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto+Slab:wght@200;300;600&display=swap" rel="stylesheet">

    <title>Profile page</title>

    <link rel="stylesheet" href="profile.css">

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .keret {
            border-bottom: 6px solid pink;
            width: 100%;
            box-sizing: border-box;
        }

        .keret2 {
            border-bottom: 1px solid gray;
        }

        .logo img {
            max-width: 180px;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0; /* Hozzáadva a margin: 0; tulajdonság */
            display: flex;
            /* Középre igazítás */
        }

        .menu li {
            margin: 20px; /* Minimális térköz minden oldalról */
            font-size: 18px;
            justify-content: center;
            color: rgb(60, 60, 60);
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .menu ul {
                flex-direction: column;
                align-items: center; /* Középre igazítás kisebb kijelzőn */
            }
        }

        .nnav {
            margin: auto;
        }

        .active-pink input.form-control[type=text] {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }

        .search-container {
            display: flex;
            justify-content: flex-end; /* A jobb oldali elhelyezkedéshez */
            align-items: center;
            margin-top: 20px; /* Fentről a container tetejétől elindítva az eloszlást */
            margin-bottom: auto; /* Lentről a container aljától elindítva az eloszlást */
        }

        .search-form {
            width: 50%; /* Keresőmező szélessége, lehet állítani */
        }

    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="magas">
                    <div class="logo">
                        <img src="img/logo.png" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Search form -->
                <div class="search-container">
                    <div class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2 search-form">
                        <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="keret"></div>

    <div class="container">
        <div class="nnav">
            <div class="row">
                <div class="menu group col-12">
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Összes termék
                            </a>

                        </li>
                        <li>Új termékek</li>
                        <li>Gyűrűk</li>
                        <li>Karkötők</li>
                        <li>Füllbevalók</li>
                        <li>Kollekciók</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="keret2"></div>

    <div class="container-fluid p-0 position-relative mt-3">
        <div class="row">
            <div class="col-12">
                <img src="../user_area/img/banner.png" class="img-fluid w-100">
                <h1 class="position-absolute top-50 start-0 text-center text-white">Welcome <br> <?php echo $username; ?></h1>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="ccardbody">
                    <div class="ccard">
                        <div class="ccardheader">
                            <div class="ccardprocontent">
                                <div class="ccardcontent">
                                    <h3>Előző rendelések</h3>
                                </div>
                            </div>
                        </div>
                        <div class="ccardprocontent">
                            <div class="ccardcontent">
                                <p class="dataheader">Rendelés száma:</p>
                                <p><?php echo $order_number; ?></p>
                            </div>
                            <div class="ccardedit">
                                <p class="underlined">Megtekintés</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="ccardbody">
                    <div class="ccard">
                        <div class="ccardheader">
                            <div class="ccardprocontent">
                                <div class="ccardcontent">
                                    <h3>Kívánságlista</h3>
                                </div>
                            </div>
                        </div>
                        <div class="ccardprocontent">
                            <div class="ccardcontent">
                                <p class="dataheader">Termék neve:</p>
                                <p>Nagyon pacek aranygyűrű</p>
                            </div>
                            <div class="ccardedit">
                                <p class="underlined">Megtekintés</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-md-6 mb-4">
                <div class="ccardbody">
                    <div class="ccard">
                        <div class="ccardheader">
                            <div class="ccardprocontent">
                                <div class="ccardcontent">
                                    <h3>Profil</h3>
                                </div>
                                <div class="ccardedit">
                                    <p class="underlined">Szerkesztés</p>
                                </div>
                            </div>
                        </div>
                        <div class="ccardprocontent">
                            <div class="ccardcontent">
                                <p class="dataheader">Név</p>
                                <p><?php echo $name; ?></p>
                            </div>
                            <div class="ccardcontent">
                                <p class="dataheader">Nem</p>
                                <p><?php echo $gender; ?></p>
                            </div>
                        </div>
                        <div class="ccardprocontent">
                            <div class="ccardcontent">
                                <p class="dataheader">Születésnap</p>
                                <p><?php echo $birthdate; ?></p>
                            </div>
                            <div class="ccardcontent">
                                <p class="dataheader">E-mail</p>
                                <p><?php echo $email; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="ccardbody">
                    <div class="ccard">
                        <div class="ccardheader">
                            <div class="ccardprocontent">
                                <div class="ccardcontent">
                                    <h3>Szállítási adatok</h3>
                                </div>
                                <div class="ccardedit">
                                    <p class="underlined">Szerkesztés</p>
                                </div>
                            </div>
                        </div>
                        <div class="ccardprocontent">
                            <div class="ccardcontent">
                                <p class="dataheader">Ország</p>
                                <p><?php echo $country; ?></p>
                            </div>
                            <div class="ccardcontent">
                                <p class="dataheader">Irányítószám</p>
                                <p><?php echo $postal_code; ?></p>
                            </div>
                        </div>
                        <div class="ccardprocontent">
                            <div class="ccardcontent">
                                <p class="dataheader">Város</p>
                                <p><?php echo $city; ?></p>
                            </div>
                            <div class="ccardcontent">
                                <p class="dataheader">Utca</p>
                                <p><?php echo $street_address; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
