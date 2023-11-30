<?php
include('../includes/connect.php');

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Lekérdezés a termék adatokhoz az adatbázisból
    $query = "SELECT * FROM products WHERE product_ID = $product_id";
    $result = mysqli_query($con, $query);
    $product = mysqli_fetch_assoc($result);

    // Lekérdezés a szín, típus és anyag nevének lekérdezéséhez
    $colorQuery = "SELECT color_Name FROM colors WHERE color_ID = " . $product['color_ID'];
    $typeQuery = "SELECT type_Name FROM types WHERE type_ID = " . $product['type_ID'];
    $materialQuery = "SELECT material_Name FROM materials WHERE material_ID = " . $product['material_ID'];

    $colorResult = mysqli_query($con, $colorQuery);
    $typeResult = mysqli_query($con, $typeQuery);
    $materialResult = mysqli_query($con, $materialQuery);

    $color = mysqli_fetch_assoc($colorResult);
    $type = mysqli_fetch_assoc($typeResult);
    $material = mysqli_fetch_assoc($materialResult);

    $productColorName = $color['color_Name'];
    $productTypeName = $type['type_Name'];
    $productMaterialName = $material['material_Name'];
} else {
    // Ha nincs érvényes id, visszairányítjuk a felhasználót a termékek listájához
    header("Location: list_products.php");
    exit();
}

// Ha az űrlapot elküldték
if(isset($_POST['update_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_stock = $_POST['product_stock'];
    $product_color = $_POST['product_color'];
    $product_type = $_POST['product_type'];
    $product_material = $_POST['product_material'];

    // Frissítés a termékek táblában
    $update_query = "UPDATE products SET product_name='$product_name', price='$product_price', description='$product_desc', stock='$product_stock', color_ID='$product_color', type_ID='$product_type', material_ID='$product_material' WHERE product_ID=$product_id";
    $update_result = mysqli_query($con, $update_query);

    if($update_result) {
        echo "Termék sikeresen frissítve!";
    } else {
        echo "Hiba a termék frissítésekor: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék szerkesztése</title>
</head>

<body>
    <h1>Termék szerkesztése</h1>

    <form action="" method="post">
        <label for="product_name">Termék neve:</label>
        <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>"><br><br>

        <label for="product_price">Ár:</label>
        <input type="text" id="product_price" name="product_price" value="<?php echo $product['price']; ?>"><br><br>

        <label for="product_desc">Leírás:</label><br>
        <textarea id="product_desc" name="product_desc"><?php echo $product['description']; ?></textarea><br><br>

        <label for="product_stock">Készlet mennyiség:</label>
        <input type="text" id="product_stock" name="product_stock" value="<?php echo $product['stock']; ?>"><br><br>

        <label for="product_color">Szín:</label>
        <input type="text" id="product_color" name="product_color" value="<?php echo $productColorName; ?>"><br><br>

        <label for="product_type">Típus:</label>
        <input type="text" id="product_type" name="product_type" value="<?php echo $productTypeName; ?>"><br><br>

        <label for="product_material">Anyag:</label>
        <input type="text" id="product_material" name="product_material" value="<?php echo $productMaterialName; ?>"><br><br>

        <input type="submit" name="update_product" value="Frissítés">
    </form>
</body>

</html>
