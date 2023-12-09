<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Termékek</title>

    <link rel="stylesheet" href="adminpanel.css">

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">





    <!-- ki kell rendezni css-be -->
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

        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        } 
        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .menu li {
            margin: 20px;
            font-size: 18px;
            justify-content: center;
            color: rgb(60, 60, 60);
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .menu ul {
                flex-direction: column;
                align-items: center;
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
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
            margin-bottom: auto;
        }

        .search-form {
            width: 50%;
        }

        .col-12.col-md-3 {
            padding: 20px;
        }

        .nav.flex-column {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #343a40;
            font-size: 18px;
            border-radius: 5px;
            padding: 10px;
            border: 2px solid transparent;
        }

        .nav-link.active,
        .nav-link:hover {
            border-bottom: 2px solid pink;
        }

        /* Responsive beállítások a Sidebar-hoz */
        @media (max-width: 768px) {
            .col-12.col-md-3 {
                text-align: center;
            }

            .nav.flex-column {
                text-align: center;
            }

            .nav-item {
                margin-bottom: 10px;
            }
        }


        .line{
            border-right: 3px solid pink;
        }

    </style>

</head>

<body>

<!-----------------------------------------------------------------------HEADER-------------------------------------------------------->

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
                <div class="search-container mt-4">
                    <div class="adminname">
                        <h3>[Adminnév]</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="keret"></div>
    <div class="keret2"></div>

<!-----------------------------------------------------------------------HEADER END-------------------------------------------------------->

    <div class="container mt-4">   

        <!-- Adminfelület navigációs sáv -->

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar (Menu) -->
                <div class="col-12 col-md-3">
                    <div class="line">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="index.php?loadhome" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?loadorders" class="nav-link">Rendelések</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?loadinsert_product" class="nav-link">Termék feltöltése</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?loadinsert_details" class="nav-link">Termék adatok hozzáadása</a>
                            </li>
                        </ul>
                    </div>
                </div>

<!-----------------------------------------------------------------------MAIN------------------------------------------------------->

                <!-- Main Content -->
                <div class="col-12 col-md-9">
                    <div class="container">
                        <div class="row">
                            <div class="oldalfeltoltes mt-4">

                            
                            <?php
                                if (isset($_GET['loadinsert_details'])) {
                                    include('loadinsert_details.php');
                                } elseif (isset($_GET['loadinsert_product'])) {
                                    include('loadinsert_product.php');
                                } elseif (isset($_GET['loadhome'])) {
                                    include('loadhome.php');
                                } elseif (isset($_GET['loadorders'])) {
                                    include('loadorders.php');
                                }
                            ?>

                            <div class="oldalfeltoltes2">
                            <?php
                            if (isset($_GET['insert_color'])) {
                                include('insert_color.php');
                            } elseif (isset($_GET['insert_type'])) {
                                include('insert_type.php');
                            } elseif (isset($_GET['insert_material'])) {
                                include('insert_material.php');
                            } 
                            ?>
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

