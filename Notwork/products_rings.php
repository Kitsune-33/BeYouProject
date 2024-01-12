<?php include 'header.php'?>
<?php
include('../includes/connect.php');
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h1 class='position-absolute top-50 start-0 text-center text-white'>Welcome <br> $username</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="includes/font_import.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @font-face {
            font-family: 'CustomFont';
            src: url('../user_area/fonts/Optima\ Medium.woff') format('woff');
            /* Egyéb beállítások (pl. font-weight, font-style) */
        }
        body {
            font-family: 'CustomFont', sans-serif;
        }
    </style>
    <style>
        .primary_container{
            padding-left:3%;
            padding-right:3%;
        }
        .product_card{
            padding:0%;
        }
        .productbox{
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="banner-container">
            <img class="banner-img" src="../img/bannerimg_2.png" alt="Banner kép">
        </div>
    </div>
    <div class="container-fluid primary_container mt-4">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <!-- Az ékszer típusokra való szűrést eltávolítottuk -->
                <hr>
                <div class="type_header mb-2">
                    <h4>Jewellery</h4>
                </div>
                <form id="filterForm">
                    <div class="type_filter">
                        <!-- Az ékszer típusokra való szűrést eltávolítottuk -->
                    </div>
                    <hr>
                    <div class="material_card">
                        <div class="material_header mb-2">
                            <h4>Colours</h4>
                        </div>
                        <div class="material_filter">
                            <?php 
                                $color_query = "SELECT * FROM colors";
                                $color_query_run = mysqli_query($con, $color_query);
                                
                                if(mysqli_num_rows($color_query_run) > 0) {
                                    $checkedColors = isset($_GET['colors']) ? $_GET['colors'] : [];

                                    foreach($color_query_run as $colorlist) {
                                        $colorID = $colorlist['color_ID'];
                                        $colorName = $colorlist['color_Name'];
                                        $isChecked = in_array($colorID, $checkedColors);
                                        ?>
                                        <div>
                                            <div class="wrapper">
                                                <input type="checkbox" name="colors[]" value="<?= $colorID ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                <label><?= $colorName ?></label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="material_card">
                        <div class="material_header mb-2">
                            <h4>Materials</h4>
                        </div>
                        <div class="material_filter">
                            <?php 
                                $material_query = "SELECT * FROM materials";
                                $material_query_run = mysqli_query($con, $material_query);
                                
                                if(mysqli_num_rows($material_query_run) > 0) {
                                    $checkedMaterials = isset($_GET['materials']) ? $_GET['materials'] : [];

                                    foreach($material_query_run as $materiallist) {
                                        $materialID = $materiallist['material_ID'];
                                        $materialName = $materiallist['material_Name'];
                                        $isChecked = in_array($materialID, $checkedMaterials);
                                        ?>
                                        <div>
                                            <div class="wrapper">
                                                <input type="checkbox" name="materials[]" value="<?= $materialID ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                <label><?= $materialName ?></label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
                <div id="productDisplay" class="productdisplay row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <!-- Termékek dinamikusan frissülnek ide -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // A JavaScript kód itt maradt, de az ékszer típusokra való szűrést kivettük
    </script>

    <!-- Bootstrap és egyéb szükséges JavaScript könyvtárak -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
