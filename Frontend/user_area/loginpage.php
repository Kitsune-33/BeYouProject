<?php
include '../../Backend/includes/connect.php';
include '../../Backend/includes/session.php';
include '../assets/header.php';



if (isset($_POST['user_login'])) {
    $login_username = mysqli_real_escape_string($con, $_POST['login_username']);
    $login_password = mysqli_real_escape_string($con, $_POST['login_password']);

    // Bejelentkezés ellenőrzése az user_table-ban
    $select_user_query = "SELECT * FROM user_table WHERE username = '$login_username'";
    $result_user_select = mysqli_query($con, $select_user_query);

    if ($result_user_select && mysqli_num_rows($result_user_select) == 1) {
        $row_user = mysqli_fetch_assoc($result_user_select);
        $hashed_password_user = $row_user['password'];

        if (password_verify($login_password, $hashed_password_user)) {
            // Sikeres bejelentkezés az user_table-ból
            $_SESSION['user_id'] = $row_user['user_ID'];
            $_SESSION['user_username'] = $row_user['username'];
            $_SESSION['user_email'] = $row_user['email'];
            header("location: /beyou/BeYouProject/Frontend/user_area/profilepage.php");
            exit();
        }
    }

    // Bejelentkezés ellenőrzése a table_admin-ban, ha az user_table-ben nem található
    $select_admin_query = "SELECT * FROM table_admin WHERE admin_username = '$login_username'";
    $result_admin_select = mysqli_query($con, $select_admin_query);

    if ($result_admin_select && mysqli_num_rows($result_admin_select) == 1) {
        $row_admin = mysqli_fetch_assoc($result_admin_select);
        $hashed_password_admin = $row_admin['admin_password'];

        if (password_verify($login_password, $hashed_password_admin)) {
            // Sikeres bejelentkezés a table_admin-ból
            $_SESSION['admin_id'] = $row_admin['admin_ID'];
            $_SESSION['admin_username'] = $row_admin['admin_username'];
            $_SESSION['user_type'] = 'admin'; // Hozzáadva az admin típusa
            header("location: /beyou/BeYouProject/admin_area/index.php");
            exit();
        }
    }

    // Ha mindkét ellenőrzés sikertelen (User,Admin bejelentkezés) akkor hibás a felhasználónév vagy jelszó
    echo "<script>alert('Invalid username or password. Please try again.')</script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginpage</title>
    <link rel="stylesheet" href="../../public/user_area/css/loginpage.css">
    <link rel="stylesheet" href="../../public/user_area/css/font_import.css">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row justify-content-center mt-3 mb-4">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="display-4">My profile</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="forms_1">
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login"
                                    role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register"
                                    role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel"
                                aria-labelledby="tab-login">
                                <form method="POST" action="loginpage.php" class="orderform">
                                    <div class="form-group mb-4">
                                        <label for="login_username">Username</label>
                                        <input type="text" name="login_username" id="login_username"
                                            class="form-control" placeholder="Enter your username" required>
                                    </div>
                                    <!-- Password input -->
                                    <div class="form-group mb-4">
                                        <label for="login_password">Password</label>
                                        <input type="password" name="login_password" id="login_password"
                                            class="form-control" placeholder="Enter your password" required>
                                    </div>

 <!--                                   <div class="form-testdiv mb-4">
    <label class="form-testlabel" for="login_username">Test</label>
    <input type="text" name="login_username" id="login_username" class="form-testinput" placeholder="Test" required>
</div>-->

                                    <!-- Submit button -->
                                    <button type="submit" name="user_login"
                                     class="btn btn-block mb-3">Login</button>

                                </form>
                            </div>

                            <div class="tab-pane fade" id="pills-register" role="tabpanel"
                                aria-labelledby="tab-register">
                                <form action="../../Backend/user_area/user_registration.php"  method="post">

                                    <!-- Felhasználónév -->
                                    <div class="form-outline mb-4">
                                        <label for="username" class="form-label">
                                            Username
                                        </label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
                                    </div>

                                    <!-- Rendes név -->
                                    <div class="form-outline mb-4">
                                        <label for="name" class="form-label">
                                            Full name
                                        </label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" autocomplete="off" required="required">
                                    </div>


                                    <!-- Email -->
                                    <div class="form-outline mb-4">
                                        <label for="user_email" class="form-label">
                                            Email
                                        </label>
                                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email address" autocomplete="off" required="required">
                                    </div>

                                    <!-- Jelszó -->
                                    <div class="form-outline mb-4">
                                        <label for="user_password" class="form-label">
                                            Password
                                        </label>
                                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required">
                                    </div>

                                    <!-- Jelszó újra -->
                                    <div class="form-outline mb-4">
                                        <label for="user_password_again" class="form-label">
                                            Password again
                                        </label>
                                        <input type="password" name="user_password_again" id="user_password_again" class="form-control" placeholder="Enter your password again" autocomplete="off" required="required">
                                    </div>

                                    <!-- Ország -->
                                    <div class="form-outline mb-4">
                                        <label for="country" class="form-label">
                                            Country
                                        </label>
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Enter your country" autocomplete="off" required="required">
                                    </div>

                                    <!-- Irányítószám -->
                                    <div class="form-outline mb-4">
                                        <label for="postal_code" class="form-label">
                                            Postal code
                                        </label>
                                        <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Enter your postal code" autocomplete="off" required="required">
                                    </div>

                                    <!-- Város -->
                                    <div class="form-outline mb-4">
                                        <label for="city" class="form-label">
                                            City
                                        </label>
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" autocomplete="off" required="required">
                                    </div>

                                    <!-- Cím -->
                                    <div class="form-outline mb-4">
                                        <label for="user_address" class="form-label">
                                            Address
                                        </label>
                                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required">
                                    </div>

                                    <!-- Utca és házszám -->
                                    <div class="form-outline mb-4">
                                        <label for="street_address" class="form-label">
                                            Street and house number
                                        </label>
                                        <input type="text" name="street_address" id="street_address" class="form-control" placeholder="Enter your street and house number" autocomplete="off" required="required">
                                    </div>

                                    <!-- Telefonszám -->
                                    <div class="form-outline mb-4">
                                        <label for="user_mobile" class="form-label">
                                            Phone number
                                        </label>
                                        <input type="tel" name="user_mobile" id="user_mobile" class="form-control" placeholder="Enter your phonenumber" autocomplete="off" required="required">
                                    </div>

                                    <!-- Neme -->
                                    <div class="form-outline mb-4">
                                        <label for="gender" class="form-label">
                                            Gender
                                        </label>
                                        <select name="gender" id="gender" class="form-select">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <!-- Születésnap -->
                                    <div class="form-outline mb-4">
                                        <label for="birthdate" class="form-label">
                                            Birthday
                                        </label>
                                        <input type="date" name="birthdate" id="birthdate" class="form-control" required="required">
                                    </div>


                                    <!-- Regisztrációs gomb -->
                                    <div class="form-outline mb-4">
                                        <input type="submit" name="user_register" class="btn btn-block mb-3" value="Register">
                                        <p>Already have an account? <button class="btn btn-block mb-3" id="backToLoginButton" class="btn btn-primary">
                                    Back to login
                                </button></p>
                                    </div>
                                </form>

                                <!-- Vissza a bejelentkező űrlaphoz gomb -->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-6">
                    <p>Megrendelés állapotának ellenőrzése </p>
                </div>
                -->
            </div>
        </div>
    </div>

    <!--Funkció a login és register űrlap közötti váltáshoz. -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        const loginTab = document.getElementById('tab-login');
        const registerTab = document.getElementById('tab-register');
        const loginForm = document.getElementById('pills-login');
        const registerForm = document.getElementById('pills-register');
        const registerButton = document.getElementById('tab-register');
        const backButton = document.getElementById('backToLoginButton');

        registerButton.addEventListener('click', function () {
            loginTab.classList.remove('active');
            registerTab.classList.add('active');
            loginForm.classList.remove('show', 'active');
            registerForm.classList.add('show', 'active');
        });

        loginTab.addEventListener('click', function () {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.classList.add('show', 'active');
            registerForm.classList.remove('show', 'active');
        });

        backButton.addEventListener('click', function () {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.classList.add('show', 'active');
            registerForm.classList.remove('show', 'active');
        });
    </script>

</body>
</html>

<?php
//--------------------------------------------REGISZTRÁCIÓ csak user_table-ba------------------------------


if (isset($_POST['user_register'])) {
    // Felhasználótól kapott adatok fogadása
    $username = $_POST['username'];
    $name = $_POST['name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_password_again = $_POST['user_password_again'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $country = $_POST['country'];
    $postal_code = $_POST['postal_code'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $ip_address = $_SERVER['REMOTE_ADDR']; //törölni kell még

    // Üres mezők ellenőrzése
    if (
        $username == '' or $name == '' or $user_email == '' or $user_password == '' or $user_password_again == '' or
        $user_address == '' or $user_mobile == '' or $country == '' or $postal_code == '' or $street_address == '' or
        $city == '' or $gender == '' or $birthdate == ''
    ) {
        echo "<script>alert('Ne hagyd üreset a mezőt/mezőket')</script>";
        exit();
    }

    // Jelszó egyezőségének ellenőrzése
    if ($user_password != $user_password_again) {
        echo "<script>alert('A megadott jelszavak nem egyeznek. Kérjük, próbáld újra.')</script>";
        exit();
    }

    // Felhasználónév foglaltságának ellenőrzése
    $select_query = "SELECT username FROM user_table WHERE username='$username'";
    $result_select = mysqli_query($con, $select_query);

    if (mysqli_num_rows($result_select) > 0) {
        echo "<script>alert('Ez a felhasználónév már foglalt')</script>";
        exit();
    }

    // Jelszó hash készítése
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    // Felhasználói adatok beszúrása az user_table táblába
    $insert_user = "INSERT INTO user_table (name, gender, birthdate, email, phone_number, username, password, ip_address) 
    VALUES ('$name', '$gender', '$birthdate', '$user_email', '$user_mobile', '$username', '$hashed_password', '$ip_address')";

    $result_query_user = mysqli_query($con, $insert_user);

    // Utolsó beszúrt user_ID lekérdezése
    $last_user_id = mysqli_insert_id($con);

    // Szállítási címek táblába való beszúrása
    $insert_shipping_address = "INSERT INTO shipping_addresses (user_ID, country, postal_code, street_address, city) 
    VALUES ('$last_user_id', '$country', '$postal_code', '$street_address', '$city')";

    $result_query_shipping = mysqli_query($con, $insert_shipping_address);

    if ($result_query_user && $result_query_shipping) {
        echo "<script>alert('A regisztráció sikeresen megtörtént')</script>";
    } else {
        echo "<script>alert('A regisztráció során hiba történt')</script>";
    }
}

?>

