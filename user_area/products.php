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

            .banner-container {
                width: 100%;
                overflow: hidden;
            }

            .banner-img {
                width: 100%;
                height: auto;
                display: block;
            }


            .custombutton{
                width: 100%;
                height: 2.5rem;
                background-color:white;
                border:1px solid lightgray;
                text-align: left;
            }
            .sort-text{
                text-align: left;
                width: 100%;
            }
            .sort-icon{
                text-align: right;
                width: 100%;
            }
            .box-1{
                border:2px solid green;

            }

            li{
                list-style: none;
                margin-top: 0.25rem;
            }

            ul{
                padding: 0;
            }

            .wrapper {
                width: 100%;
                display: flex;
                margin-bottom: 1em;
            }

            input[type="checkbox"] {
                appearance: none;
                -webkit-appearance: none;
                height: 1.5em;
                width: 1.5em;
                background-color: white;
                border: 2px solid rgb(42, 42, 42);
                border-radius: 0;
                cursor: pointer;
                display: flex;
                outline: none;
                align-items: center;
                justify-content: center;
            }

            label {
                color: black;
                font-size: 1em;
                cursor: pointer;
                margin-left: 0.5em;
            }

            input[type="checkbox"]:after {
                font-family: "Font awesome 6 Free";
                content: "\f00c";
                font-weight: 600;
                font-size: 1em;
                color: #ffffff;
                display: none;
            }

            input[type="checkbox"]:hover {
                background-color: white;
            }

            input[type="checkbox"]:checked {
                background-color: rgb(31,31,31);
            }

            input[type="checkbox"]:checked:after {
                display: block;
            }

            button {
            border: none;
            background: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
            display: inline-flex;
            align-items: center;
            margin:0;
        }

        .material-filter {
            cursor: pointer;
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .outer-circle {
            width: 30px;
            height: 30px;
            border: 2px solid #B5B5B5;
            border-radius: 50%;
            position: relative;
        }

        .inner-circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            transition: background-color 0.3s ease;
        }

        .text {
            margin-left: 0.5em;
            font-size: 16px;
            color: #333; /* Változtathatsz a szöveg színén */
        }

        .hover-frame {
            width: calc(100% + 8px);
            height: calc(100% + 8px);
            border: 2px solid transparent;
            border-radius: 50%;
            position: absolute;
            top: -4px;
            left: -4px;
            transition: border-color 0.3s ease;
        }

        .material-filter:hover .hover-frame {
            border-color: #000000; /* Változtathatsz a hover keretének színén */
        }

        .material-filter.active .hover-frame {
            border-color: #000000; /* Változtathatsz az aktív állapot keretének színén */
        }

        #innercolor1{
            background-color: black;
        }
        #innercolor2{
            background-color: #FFFF00;
        }
        #innercolor3{
            background-color: #F00F00;
        }
        #innercolor4{
            background-color: #FE249A;
        }
        #innercolor5{
            background-color: #0070D2;
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



        <div class="container">
            <div class="banner-container">
                <img class="banner-img" src="../img/bannerimg_2.png" alt="Banner kép">
            </div>
        </div>


        <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="sorting-div">
                    <div class="sorting">
                        <div class="dropdown">
                            <button class="custombutton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="sort-text ms-3">
                                        Rendezés
                                    </div>
                                    <div class="sort-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </div>
                                </div>
                            </button>
                            <div class="dropdown-menu width:100%" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="type_card">
                    <div class="type_header mb-2">
                        <h4>Ékszer</h4>
                    </div>
                    <div class="type_filter">
                        <ul>
                            <li class="wrapper">
                                <input type="checkbox" id="check1">
                                <label for="check1">Nyaklánc</label>
                            </li>
                            <li class="wrapper">
                                <input type="checkbox" id="check2">
                                <label for="check2">Karkötő</label>
                            </li>
                            <li class="wrapper">
                                <input type="checkbox" id="check3">
                                <label for="check3">Füllbevaló</label>
                            </li>
                            <li class="wrapper">
                                <input type="checkbox" id="check4">
                                <label for="check4">Charm</label>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr>

                <div class="material_card">
                    <div class="material_header mb-2">
                        <h4>Fém</h4>
                    </div>
                    <div class="material_filter">
                        <ul>
                            <li>
                                <button class="material-filter" onclick="toggleActive(this)">
                                    <span class="outer-circle">
                                        <span id="innercolor1" class="inner-circle"></span>
                                        <span class="hover-frame"></span>
                                    </span>
                                    <span class="text">Fekete (2)</span>
                                </button>
                            </li>
                            <li>
                                <button class="material-filter" onclick="toggleActive(this)">
                                    <span class="outer-circle">
                                        <span id="innercolor2" class="inner-circle"></span>
                                        <span class="hover-frame"></span>
                                    </span>
                                    <span class="text">Sárga (5)</span>
                                </button>
                            </li>
                            <li>
                                <button class="material-filter" onclick="toggleActive(this)">
                                    <span class="outer-circle">
                                        <span id="innercolor3" class="inner-circle"></span>
                                        <span class="hover-frame"></span>
                                    </span>
                                    <span class="text">Piros (3)</span>
                                </button>
                            </li>
                            <li>
                                <button class="material-filter" onclick="toggleActive(this)">
                                    <span class="outer-circle">
                                        <span id="innercolor4" class="inner-circle"></span>
                                        <span class="hover-frame"></span>
                                    </span>
                                    <span class="text">Rózsaszín (1)</span>
                                </button>
                            </li>
                            <li>
                                <button class="material-filter" onclick="toggleActive(this)">
                                    <span class="outer-circle">
                                        <span id="innercolor5" class="inner-circle"></span>
                                        <span class="hover-frame"></span>
                                    </span>
                                    <span class="text">Kék (7)</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr>


                <script>
                    function toggleActive(element) {
                        element.classList.toggle("active");
                    }
                </script>




            </div>
            <div class="col-12 col-md-6 col-lg-9">
                <div class="productdisplay row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <!-- Az 'ez egy termék' divet megjelenítjük többször, hogy látszódjon, hogyan helyezkednek el -->
                    <div class="col">
                        <div class="productbox">
                            <div class="disp_productimg">
                                <img src="../img/karkoto.png" alt="" style="max-width: 100%;">
                            </div>
                            <div class="disp_productdata mt-2">
                                <div class="disp_productname">
                                    <p>Pandora Moments szikrázó kék kapcsos kígyólánc karkötő</p>
                                </div>
                                <div class="disp_productprice">
                                    <p>24.500,00 Ft </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Ismételd meg a 'ez egy termék' divet, amennyi alkalommal szeretnéd -->
                    <!-- Például, ismételd meg 12 alkalommal a következő módon -->
                    <div class="col">
                        <div class="productbox">
                            <div class="disp_productimg">
                                <img src="../img/karkoto2.png" alt="" style="max-width: 100%;">
                            </div>
                            <div class="disp_productdata mt-2">
                                <div class="disp_productname">
                                    <p>Pandora Moments szívzáras kígyólánc karkötő</p>
                                </div>
                                <div class="disp_productprice">
                                    <p>24.500,00 Ft </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col">
                        <div class="productbox">
                            <div class="disp_productimg">
                                <img src="../img/karkoto2.png" alt="" style="max-width: 100%;">
                            </div>
                            <div class="disp_productdata mt-2">
                                <div class="disp_productname">
                                    <p>Pandora Moments szívzáras kígyólánc karkötő</p>
                                </div>
                                <div class="disp_productprice">
                                    <p>24.500,00 Ft </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col">
                        <div class="productbox">
                            <div class="disp_productimg">
                                <img src="../img/karkoto2.png" alt="" style="max-width: 100%;">
                            </div>
                            <div class="disp_productdata mt-2">
                                <div class="disp_productname">
                                    <p>Pandora Moments szívzáras kígyólánc karkötő</p>
                                </div>
                                <div class="disp_productprice">
                                    <p>24.500,00 Ft </p>
                                </div>
                            </div>
                            
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









