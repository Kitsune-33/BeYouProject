<?php
include('../includes/connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['insert_product'])) {
    $product_name = $con->real_escape_string($_POST['product_name']);
    $product_price = $con->real_escape_string($_POST['product_price']);
    $product_desc = $con->real_escape_string($_POST['product_desc']);
    $product_stock = $con->real_escape_string($_POST['product_stock']);
    $product_color = $con->real_escape_string($_POST['product_color']);
    $product_type = $con->real_escape_string($_POST['product_type']);
    $product_material = $con->real_escape_string($_POST['product_material']);
    $product_image = $_FILES['product_image']['name'];
    $temp_image = $_FILES['product_image']['tmp_name'];

    echo "POST adatok fogadva. ";

    if (empty($product_name) || empty($product_price) || empty($product_desc) || empty($product_stock) ||
        empty($product_color) || empty($product_type) || empty($product_material) || empty($product_image)) {
        echo "<script>alert('Ne hagyd üreset a mezőt/mezőket')</script>";
        exit();
    } else {
        echo "Kép ellenőrzése megtörtént. ";

        if ($_FILES['product_image']['size'] > 5000000) { // Maximum 5 MB
            echo "<script>alert('A kép mérete túl nagy. Maximum 5 MB engedélyezett.')</script>";
            exit();
        }

        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($product_image, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<script>alert('Csak JPG, JPEG, PNG és GIF fájltípusok engedélyezettek.')</script>";
            exit();
        }

        echo "Kép mentése megtörtént. ";

        move_uploaded_file($temp_image, "./product_images/$product_image");

        $insert_products = $con->prepare("INSERT INTO products (product_name, price, description, stock, color_ID, type_ID, material_ID, image) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_products->bind_param('sdssiiis', $product_name, $product_price, $product_desc, $product_stock, $product_color, $product_type, $product_material, $product_image);

        if ($insert_products->execute()) {
            echo "<script>alert('A termék feltöltése sikeresen megtörtént')</script>";
        } else {
            echo "<script>alert('A feltöltés során hiba lépett fel: " . $insert_products->error . "')</script>";
        }

        $insert_products->close();
    }
}


// Select lekérdezés az anyagokhoz
$select_materials_query = "SELECT * FROM materials";
$result_materials_query = $con->query($select_materials_query);
$material_options = "";
while ($material_row = $result_materials_query->fetch_assoc()) {
    $material_ID = $material_row['material_ID'];
    $material_name = $material_row['material_Name'];
    $material_options .= "<option value='$material_ID'>$material_name</option>";
}

// Select lekérdezés a típusokhoz
$select_types_query = "SELECT * FROM types";
$result_types_query = $con->query($select_types_query);
$type_options = "";
while ($type_row = $result_types_query->fetch_assoc()) {
    $type_ID = $type_row['type_ID'];
    $type_name = $type_row['type_Name'];
    $type_options .= "<option value='$type_ID'>$type_name</option>";
}

// Select lekérdezés a színekhez
$select_colors_query = "SELECT * FROM colors";
$result_colors_query = $con->query($select_colors_query);
$color_options = "";
while ($color_row = $result_colors_query->fetch_assoc()) {
    $color_ID = $color_row['color_ID'];
    $color_name = $color_row['color_Name'];
    $color_options .= "<option value='$color_ID'>$color_name</option>";
}

?>

<div class="container w-50 mt-3">

    <h1 class="text-center">Add product</h1>

    <!--Form-->
    <form action="index.php?insert_product" method="POST" enctype="multipart/form-data">

        <div class="form-outline mb-4">
            <label for="product_name" class="form-label">
                Product name
            </label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4">
            <label for="product_price" class="form-label">
                Product price
            </label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
        </div>

        <!--Description-->
        <div class="form-outline mb-4">
            <label for="product_desc" class="form-label">
                Product description
            </label>
            <input type="text" name="product_desc" id="product_desc" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
        </div>

        <!--Stock-->
        <div class="form-outline mb-4">
            <label for="product_stock" class="form-label">
                Product stock
            </label>
            <input type="text" name="product_stock" id="product_stock" class="form-control" placeholder="Enter product stock" autocomplete="off" required="required">
        </div>

        <!-- Szín kiválasztása -->
        <div class="form-outline mb-4">
            <label for="product_color" class="form-label">Select Color</label>
            <select name="product_color" id="product_color" class="form-select">
                <option value="">Select Color</option>
                <?php echo $color_options; ?>
            </select>
        </div>

        <!-- Típus kiválasztása -->
        <div class="form-outline mb-4">
            <label for="product_type" class="form-label">Select Type</label>
            <select name="product_type" id="product_type" class="form-select">
                <option value="">Select Type</option>
                <?php echo $type_options; ?>
            </select>
        </div>

        <!-- Anyag kiválasztása -->
        <div class="form-outline mb-4">
            <label for="product_material" class="form-label">Select Material</label>
            <select name="product_material" id="product_material" class="form-select">
                <option value="">Select Material</option>
                <?php echo $material_options; ?>
            </select>
        </div>

        <!--Kép feltöltés-->
        <div class="form-outline mb-4">
            <label for="product_image" class="form-label">Product Image
            </label>
            <input type="file" name="product_image" id="product_image" class="form-control" required="required">
        </div>

        <!--Submit button-->
        <div class="form-outline mb-4">
            <input type="submit" name="insert_product" class="btn btn-info" value="Insert product">
        </div>

    </form>
</div>
