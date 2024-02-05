<?php 
include '../../Backend/includes/connect.php';
include '../../Backend/includes/session.php';
include '../assets/header.php';
?>  
<!DOCTYPE html>
<html lang="HU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/user_area/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
    img {
        max-width: 100%;
        height: auto;
    }
</style>
</head>
<body>
        <div class="container-fluid">
        <div class="row flex-wrap justify-content-center">
            <div class="col-4 d-flex align-items-center">
                    <h2>Fedezze fel az égszerek világát</h2>
                </div>
                <div class="col-2">
                    <div class="kartya">
                        <div class="kep">
                            <img src="test.png" alt="charm">
                        </div>
                        <div class="felirat mb-2">
                            <h3>Charm </h3>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="kartya">
                        <div class="kep">
                            <img src="test.png" alt="Nyaklánc">
                        </div>
                        <div class="felirat mb-2">
                            <h3>Nyaklánc </h3>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="kartya">
                        <div class="kep">
                            <img src="test.png" alt="Gyűrűk">
                        </div>
                        <div class="felirat mb-2">
                            <h3>Gyűrű </h3>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="kartya">
                        <div class="kep">
                            <img src="test.png" alt="Füllbevalók">
                        </div>
                        <div class="felirat mb-2">
                            <h3>Füllbevalók </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    <div class="container-fluid" style="text-align: center;">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <div>
                    <h4>Ünnep utáni leárazások</h4>
                    <p>Fedezd fel számodra legfontosabb szeretet ékszert, amit megoszthatsz a számodra legfontosabb szeretteddel</p>
                </div>
            </div>
            <div class="col-6">
                <img src="https://hu.pandora.net/dw/image/v2/BJRN_PRD/on/demandware.static/-/Sites-hu-HU-Library/default/dwb0c99c98/Cycles/2024/Q1/Brand/Feature/Feature_01_Desktop.jpg" alt="kep" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="felkapott">
        <h2>Legkedveltebbek</h2>
    </div>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                    <img src="test.png" class="d-block w-100 m-2" alt="...">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-fluid" style="text-align: center;">
        <div class="row">
            <div class="col-6">
                <img src="https://hu.pandora.net/dw/image/v2/BJRN_PRD/on/demandware.static/-/Sites-hu-HU-Library/default/dwb0c99c98/Cycles/2024/Q1/Brand/Feature/Feature_01_Desktop.jpg" alt="kep" class="img-fluid">
            </div>
            <div class="col-6 d-flex align-items-center">
                <div>
                    <h4>Ünnep utáni leárazások</h4>
                    <p>Fedezd fel számodra legfontosabb szeretet ékszert, amit megoszthatsz a számodra legfontosabb szeretteddel</p>
                </div>
            </div>
        </div>
    </div>
    <div class="felirat">
        <h1>Még több Be You termék</h1>
    </div>
    <div class="row">
        <div class="image-container">
            <div class="col-4">
                <img src="https://hu.pandora.net/dw/image/v2/BJRN_PRD/on/demandware.static/-/Sites-hu-HU-Library/default/dw38455ebd/Cycles/2024/Q1/Brand/Explore/PandoraMe_Product_Explore_Desktop.jpg" alt="Kép 1">
                <p>Szöveg az első képhez.</p>
            </div>
            <div class="col-4">
                <img src="https://hu.pandora.net/dw/image/v2/BJRN_PRD/on/demandware.static/-/Sites-hu-HU-Library/default/dwa603f375/Cycles/2024/Q1/Valentines/Explore/AvianaColin_02_Explore_Desktop.jpg" alt="Kép 2">
                <p>Szöveg a második képhez.</p>
            </div>
            <div class="col-4">
                <img src="https://hu.pandora.net/dw/image/v2/BJRN_PRD/on/demandware.static/-/Sites-hu-HU-Library/default/dw3ec0beee/Cycles/2024/Q1/Brand/Explore/Timeless_Product_Explore_Desktop.jpg" alt="Kép 3">
                <p>Szöveg a harmadik képhez.</p>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>   
</body>
</html>
<?php
include '../assets/footer.php'; 
?>
