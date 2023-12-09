<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                    <div class="headerrightcontent">
                    <!-- Search form -->
                        <div class="search-container">
                            <div class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2 search-form">
                                <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                            </div>
                        </div>
                        <div class="headericons">
                            <div class="loginicon">
                                <a href="loginpage.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="carticon">

                            </div>
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
                            <li>Gyűrdsaűk</li>
                            <li>Karkötők</li>
                            <li>Füllbevalók</li>
                            <li>Kollekciók</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="keret2"></div>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
    </html>