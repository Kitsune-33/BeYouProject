<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

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


        .my-button1 {
            background: url('../img/karkoto.png');
            background-size:cover;
            background-repeat: no-repeat;
            color: #ec4f9b;
            width: 130px;
            height: 130px;
            transition: .5s;
        }
        .my-button2 {
            background: url('../img/fullbevalo.png');
            background-size:cover;
            background-repeat: no-repeat;
            color: black;
            width: 130px;
            height: 130px;
            transition: .5s;
        }
        .my-button3 {
            background: url('../img/gyuru.png');
            background-size:cover;
            background-repeat: no-repeat;
            color: black;
            width: 130px;
            height: 130px;
            transition: .5s;
        }
        .my-button4 {
            background: url('../img/nyaklanc.png');
            background-size:cover;
            background-repeat: no-repeat;
            color: black;
            width: 130px;
            height: 130px;
            transition: .5s;
        }
        .my-button5 {
            background: url('../img/Logo.png');
            background-size:cover;
            background-repeat: no-repeat;
            color: black;
            width: 130px;
            height: 130px;
            transition: .5s;
        }

        .my-button1:hover {
            filter:blur(1px);
            opacity: 0.3q;
        }

        .my-button2:hover {
            filter:blur(1px);
            opacity: 0.3q;
        }

        .my-button3:hover {
            filter:blur(1px);
            opacity: 0.3q;
        }

        .my-button4:hover {
            filter:blur(1px);
            opacity: 0.3q;
        }

        .my-button5:hover {
            filter:blur(1px);
            opacity: 0.3q;
        }

        .types{
            display:inline-flex;
        }


    .img {
        width: 100%;
        height: auto;
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
        <div class="bannerimg">
            <img src="../img/bannerimg_2.png" alt="Kép 1" class="image">
        </div>
    </div>

    <div class="container">
        <div class="types">
            <div class="text-center"><button type="button" class="btn btn-light rounded-circle btn-outline-danger my-button1"></button><p>Karkötők</p></div>
            <div class="text-center"><button type="button" class="btn btn-light rounded-circle btn-outline-danger my-button2"></button><p>Fülbevalók</p></div>
            <div class="text-center"><button type="button" class="btn btn-light rounded-circle btn-outline-danger my-button3"></button><p>Gyűrűk</p></div>
            <div class="text-center"><button type="button" class="btn btn-light rounded-circle btn-outline-danger my-button4"></button><p>Nyakláncok</p></div>
            <div class="text-center"><button type="button" class="btn btn-light rounded-circle btn-outline-danger my-button5"></button><p>Kiégészítők</p></div>
        </div>
    </div>

    <div class="parent-container d-flex">
        <div class="container text-center col-1">
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card" style="width: 10rem;">
                        <div class="card-body">
                            <input type="text" class="form-control" id="search" placeholder="Keresés">
                          <p class="card-text "><button type="button" class="btn btn-outline-danger">Arany</button></p>
                          <p class="card-text"><button type="button" class="btn btn-outline-danger">Ezüst</button></p>
                          <p class="card-text"><button type="button" class="btn btn-outline-danger">Arannyal futtatott</button></p>
                          <p class="card-text"><button type="button" class="btn btn-outline-danger">Rózsaarany</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container text-center col-11">
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="./Img/card1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Termék neve</h5>
                          <p class="card-text">Termékleírás</p>
                          <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="./Img/card1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="./Img/card1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Termék neve</h5>
                            <p class="card-text">Termékleírás</p>
                            <a href="#" class="btn btn-primary">Kosárba</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>