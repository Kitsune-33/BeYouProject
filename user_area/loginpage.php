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

// BEJELENTKEZÉS
session_start();

if (isset($_POST['user_login'])) {
    $login_username = mysqli_real_escape_string($con, $_POST['login_username']);
    $login_password = mysqli_real_escape_string($con, $_POST['login_password']);

    // Ellenőrzés az adatbázisban
    $select_query = "SELECT * FROM user_table WHERE username = '$login_username'";
    $result_select = mysqli_query($con, $select_query);

    if ($result_select) {
        if (mysqli_num_rows($result_select) == 1) {
            $row = mysqli_fetch_assoc($result_select);
            $hashed_password = $row['password'];

            // Ellenőrzés a megadott jelszó alapján
            if (password_verify($login_password, $hashed_password)) {
                // Sikeres bejelentkezés
                $_SESSION['user_id'] = $row['user_ID'];
                $_SESSION['username'] = $row['username'];

                // Átirányítás a welcome.php oldalra vagy más céloldalra
                header("location: welcome.php");
                exit();
            } else {
                echo "<script>alert('Hibás felhasználónév vagy jelszó. Kérjük, próbáld újra.')</script>";
            }
        } else {
            echo "<script>alert('Hibás felhasználónév vagy jelszó. Kérjük, próbáld újra.')</script>";
        }
    } else {
        echo "Hiba a lekérdezés során: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Termékek</title>

    <link rel="stylesheet" href="loginpage.css">

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>

    .forms_1{
        justify-content: center;
        width: 75%;
    }
</style>

</head>

<body>


      <div class="container">
        <div class="row justify-content-center mt-5 mb-4">
            <div class="col-lg-12">
                <div class=" text-center">
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
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel"
                                aria-labelledby="tab-login">
                                <form method="POST" action="loginpage.php" class="orderform">
                                    <div class="form-group mb-4">
                                        <label for="login_username">Felhasználónév</label>
                                        <input type="text" name="login_username" id="login_username"
                                            class="form-control" placeholder="Add meg a felhasználóneved" required>
                                    </div>
                                    <!-- Password input -->
                                    <div class="form-group mb-4">
                                        <label for="login_password">Jelszó</label>
                                        <input type="password" name="login_password" id="login_password"
                                            class="form-control" placeholder="Add meg a jelszavad" required>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="user_login"
                                        class="btn btn-primary btn-block mb-3">Bejelentkezés</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="pills-register" role="tabpanel"
                                aria-labelledby="tab-register">
                                <form action="user_registration.php" method="post">

                                    <!-- Felhasználónév -->
                                    <div class="form-outline mb-4">
                                        <label for="username" class="form-label">
                                            Felhasználónév
                                        </label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Add meg a felhasználóneved" autocomplete="off" required="required">
                                    </div>

                                    <!-- Rendes név -->
                                    <div class="form-outline mb-4">
                                        <label for="name" class="form-label">
                                            Rendes név
                                        </label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Add meg a rendes neved" autocomplete="off" required="required">
                                    </div>


                                    <!-- Email -->
                                    <div class="form-outline mb-4">
                                        <label for="user_email" class="form-label">
                                            Email cím
                                        </label>
                                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Add meg az email címed" autocomplete="off" required="required">
                                    </div>

                                    <!-- Jelszó -->
                                    <div class="form-outline mb-4">
                                        <label for="user_password" class="form-label">
                                            Jelszó
                                        </label>
                                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Add meg a jelszavad" autocomplete="off" required="required">
                                    </div>

                                    <!-- Jelszó újra -->
                                    <div class="form-outline mb-4">
                                        <label for="user_password_again" class="form-label">
                                            Jelszó újra
                                        </label>
                                        <input type="password" name="user_password_again" id="user_password_again" class="form-control" placeholder="Add meg újra a jelszavad" autocomplete="off" required="required">
                                    </div>

                                    <!-- Cím -->
                                    <div class="form-outline mb-4">
                                        <label for="user_address" class="form-label">
                                            Cím
                                        </label>
                                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Add meg a címed" autocomplete="off" required="required">
                                    </div>

                                    <!-- Telefonszám -->
                                    <div class="form-outline mb-4">
                                        <label for="user_mobile" class="form-label">
                                            Telefonszám
                                        </label>
                                        <input type="tel" name="user_mobile" id="user_mobile" class="form-control" placeholder="Add meg a telefonszámod" autocomplete="off" required="required">
                                    </div>

                                    <!-- Ország -->
                                    <div class="form-outline mb-4">
                                        <label for="country" class="form-label">
                                            Ország
                                        </label>
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Add meg az országod" autocomplete="off" required="required">
                                    </div>

                                    <!-- Irányítószám -->
                                    <div class="form-outline mb-4">
                                        <label for="postal_code" class="form-label">
                                            Irányítószám
                                        </label>
                                        <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Add meg az irányítószámod" autocomplete="off" required="required">
                                    </div>

                                    <!-- Utca és házszám -->
                                    <div class="form-outline mb-4">
                                        <label for="street_address" class="form-label">
                                            Utca és házszám
                                        </label>
                                        <input type="text" name="street_address" id="street_address" class="form-control" placeholder="Add meg az utcád és házszámod" autocomplete="off" required="required">
                                    </div>

                                    <!-- Város -->
                                    <div class="form-outline mb-4">
                                        <label for="city" class="form-label">
                                            Város
                                        </label>
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Add meg a városod" autocomplete="off" required="required">
                                    </div>

                                    <!-- Neme -->
                                    <div class="form-outline mb-4">
                                        <label for="gender" class="form-label">
                                            Neme
                                        </label>
                                        <select name="gender" id="gender" class="form-select">
                                            <option value="male">Férfi</option>
                                            <option value="female">Nő</option>
                                            <option value="other">Egyéb</option>
                                        </select>
                                    </div>

                                    <!-- Születésnap -->
                                    <div class="form-outline mb-4">
                                        <label for="birthdate" class="form-label">
                                            Születésnap
                                        </label>
                                        <input type="date" name="birthdate" id="birthdate" class="form-control" required="required">
                                    </div>

                                    <!-- IP cím kijelzése -->
                                    <div class="form-outline mb-4">
                                        <label for="ip_address" class="form-label">
                                            IP cím
                                        </label>
                                        <input type="text" name="ip_address" id="ip_address" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" readonly>
                                    </div>

                                    <!-- Regisztrációs gomb -->
                                    <div class="form-outline mb-4">
                                        <input type="submit" name="user_register" class="btn btn-info" value="Regisztráció">
                                        <p>Már van fiókod? <a href="user_login.php">Bejelentkezés</a></p>
                                    </div>
                                </form>

                                <!-- Vissza a bejelentkező űrlaphoz gomb -->
                                <button id="backToLoginButton" class="btn btn-primary">
                                    Vissza a bejelentkezéshez
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- Az előző Bootstrap JS és egyéb scriptek -->

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
//----------------------------------------------------------------REGISZTRÁCIÓ--------------------- ::::::::::::


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
    $ip_address = $_SERVER['REMOTE_ADDR'];

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