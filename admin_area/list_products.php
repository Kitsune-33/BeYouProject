<?php
include('../includes/connect.php');

// Lekérdezés a termékek táblából
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termékek listája</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Termékek listája</h1>

    <table>
        <tr>
            <th>product_ID</th>
            <th>product_name</th>
            <th>price</th>
            <th>description</th>
            <th>stock</th>
            <th>color_ID</th>
            <th>type_ID</th>
            <th>material_ID</th>
            <th>image</th>
            <th>Szerkesztés</th>
        </tr>

        <?php
        // Kiírjuk a termékeket a táblázatba
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_ID'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "<td>" . $row['color_ID'] . "</td>";
            echo "<td>" . $row['type_ID'] . "</td>";
            echo "<td>" . $row['material_ID'] . "</td>";
            echo "<td>" . $row['image'] . "</td>";
            echo "<td><a href='edit_product.php?id=" . $row['product_ID'] . "'>Szerkesztés</a></td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>

</html>
