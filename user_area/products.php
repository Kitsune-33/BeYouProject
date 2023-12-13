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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    </style>
</head>
<body>
    
    <div class="container">
        <div class="banner-container">
            <img class="banner-img" src="../img/bannerimg_2.png" alt="Banner kép">
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
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
                <div class="type_header mb-2">
                    <h4>Ékszer</h4>
                </div>
                <form action="" method="GET">
                    <div class="type_filter">
                        <?php 
                            $type_query = "SELECT * FROM types";
                            $type_query_run = mysqli_query($con, $type_query);
                            
                            if(mysqli_num_rows($type_query_run) > 0) {
                                $checked = [];
                                if(isset($_GET['types'])) {
                                    $checked = $_GET['types'];
                                }
                                
                                foreach($type_query_run as $typelist) {
                                    ?>
                                    <div>
                                        <div class="wrapper">
                                            <input type="checkbox" name="types[]" value="<?= $typelist['type_ID']; ?>" <?php if(in_array($typelist['type_ID'], $checked)) {echo "checked";} ?>>
                                            <label for="check<?= $typelist['type_ID']; ?>"><?php echo $typelist['type_Name']; ?></label>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                        <button type="submit">Szűrés</button>
                    </div>
                </form>
                
                <hr>
                <div class="material_card">
                    <div class="material_header mb-2">
                        <h4>Fém</h4>
                    </div>
                    <div class="material_filter">
                        <ul class="ul_filter">
                            <li class="li_filter>
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
            <div class="col-12 col-md-9 col-lg-9">
                <div class="productdisplay row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php
                    $sql = "SELECT * FROM products";
                    if(isset($_GET['types']) && !empty($_GET['types'])) {
                        $types = implode(",", $_GET['types']);
                        $sql .= " WHERE type_ID IN ($types)";
                    }
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $product_name = $row['product_name'];
                            $product_price = $row['price'];
                            $product_image = $row['image'];
                            $product_id = $row['product_ID']; // Hozzáadva a termék azonosítójának lekérése
                            // Új rész: Vásárlás gomb hozzáadása
                            ?>
                            <div class="col">
                                <div class="productbox">
                                    <div class="disp_productimg">
                                        <img src="../admin_area/product_images/<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>">
                                    </div>
                                    <div class="disp_productdata mt-2">
                                        <div class="disp_productname">
                                            <p><?php echo $product_name; ?></p>
                                        </div>
                                        <div class="disp_productprice">
                                            <p><?php echo $product_price, " Ft"; ?></p>
                                        </div>
                                        <!-- Vásárlás gomb -->
                                        <button class="buy-button" onclick="addToCart(<?php echo $product_id; ?>)">Vásárlás</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "Nincsenek termékek";
                    }
                    $con->close();
                    ?>
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
