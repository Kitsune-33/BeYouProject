<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
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


            body {
                margin: 0;
                padding: 0;
            }

            .receipt{
                background-color: #F5F5F5;
                border-top: 5px solid #FFCAD4;
            }

            .itemprice{
                text-align: right;
            }

            h3{
                font-weight: bold;
            }

            .receipt_header h4 {
                font-weight: 600;
            }

            .sidetext{
                color:#71706C;
            }
            .sideprice{
                color:#71706C;
                font-weight: 600;
            }

            .fixprice{
                font-weight: 600;
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



        <div class="container mt-4">
            <div class="row justify-content-center">

                <div class="col-12 col-lg-6 col-xl-7"> 
                    <div class="cartlistdiv">
                        <div class="cartheader">
                            <h3>Kosaram (X termék)</h3>
                        </div>
                            <hr>
                        <div class="cartbody">
                            <div class="row">
                                <div class="col-4 col-md-3">
                                    <div class="itemimage">
                                        <img src="../img/karkoto.png" alt="" style="max-width: 100%;">
                                    </div>
                                </div>
                                <div class="col-8 col-md-9">
                                    <div class="d-md-flex">
                                        <div class="col-md-8">
                                            <div class="itemname">
                                                <h4>Pandora Moments szívzáras kígyólánc karkötő</h4>
                                            </div>
                                            <div class="itemdata">
                                                <p class="mb-1">Termék száma: []</p>
                                                <p class="mb-1">Termék színe : []</p>
                                                <p class="mb-1">Termék típusa : []</p>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="itemprice">
                                                24.500,00 Ft
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xl-3">
                    <div class="receipt ms-2 mt-2">
                        <div class="receipt_content p-4">
                            <div class="receipt_header">
                                <h4>
                                    Rendelés áttekintése
                                </h4>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="sidetext">Részösszeg</span>
                                    <span class="sidetext">(1 termék)</span>
                                </div>
                                <p class="sideprice">
                                    24.500,00 Ft
                                </p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="fixprice">Összesen</span>
                                </div>
                                <p class="fixprice">
                                    24.500,00 Ft
                                </p>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-dark">Fizetés</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
    </html>









