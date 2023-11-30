<!--Csatlakozás az adatbázishoz az insert_product.php-vel -->
<?php
include('../includes/connect.php');

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>       <!--Nevezd át-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container w-50 mt-3">

        <h1 class="text-center">Login form</h1>

        <!--Form-->
        <form action="index.php?insert_product" method="post" enctype="multipart/form-data">

                                                                        <!--Adatbázis szerkezet:-->

                                <!--user_ID	username	user_email	user_password	user_ip	user_address	user_mobile		-->


            <!--Username-->
            <div class="form-outline mb-4">
                <label for="username" class="form-label">
                    Username
                </label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
            </div>


            <!--Password-->
            <div class="form-outline mb-4">
                <label for="user_password" class="form-label">
                    Password
                </label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required">
            </div>

            <!--Submit button-->
            <div class="form-outline mb-4">
                <input type="submit" name="user_login" class="btn btn-info" value="Login">
                <p>Don't have an account? <a href="user_registration.php">Register</a> </p>
            </div>
            
        </form>
    </div>
</body>

</html>


