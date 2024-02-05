<?php
include('../includes/connect.php');

// Lekérdezés a termékek táblából
$query = "SELECT 
            p.product_ID,
            p.product_name,
            p.price,
            p.description,
            p.stock,
            c.color_Name AS color,
            t.type_Name AS type,
            m.material_Name AS material,
            p.image
          FROM products p
          LEFT JOIN colors c ON p.color_ID = c.color_ID
          LEFT JOIN types t ON p.type_ID = t.type_ID
          LEFT JOIN materials m ON p.material_ID = m.material_ID";

$result = mysqli_query($con, $query);

// Ellenőrizze, hogy a lekérdezés sikeres volt-e
if (!$result) {
    die('Error in query');
}

// Szöveges adatokhoz speciális karakterek kezelése
function escape($value) {
    global $con;
    return mysqli_real_escape_string($con, $value);
}

?>

<!DOCTYPE html>
<html lang="Hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termékek listája</title>
    <style>
        .tablazat {
            display: flex;
            justify-content: center;
        }

        th {
            background-color: #FFCAD4;
            min-width: 100px; /* Minimális szélesség beállítása */
        }

        td {
            height: 50px;
            max-width: 100px; /* Maximális szélesség beállítása */
            overflow: hidden; /* Túlcsorduló tartalom elrejtése */
            text-overflow: ellipsis; /* Túlcsorduló tartalom helyettesítése ...-el */
            white-space: nowrap; /* Több sorra osztás kikapcsolása */
        }

        table {
            width: 100%; /* Szélességet 100%-ra változtattam */
            border-collapse: collapse;
            overflow-y: auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="tablazat">
        <table>
            <tr>
                <th>product_ID</th>
                <th>product_name</th>
                <th>price</th>
                <th>description</th>
                <th>stock</th>
                <th>color</th>
                <th>type</th>
                <th>material</th>
                <th>image</th>
                <th colspan="2">Szerkesztés</th>
            </tr>

            <?php
            // Táblázat tartalom
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . escape($row['product_ID']) . "</td>";
                echo "<td><a href='#' class='edit-link' data-id='" . escape($row['product_ID']) . "'>" . escape($row['product_name']) . "</a></td>";
                echo "<td>" . escape($row['price']) . "</td>";
                echo "<td>" . escape($row['description']) . "</td>";
                echo "<td>" . escape($row['stock']) . "</td>";
                echo "<td>" . escape($row['color']) . "</td>";
                echo "<td>" . escape($row['type']) . "</td>";
                echo "<td>" . escape($row['material']) . "</td>";
                echo "<td>" . escape($row['image']) . "</td>";
                echo "<td colspan='2'><a href='#' class='edit-link' data-id='" . escape($row['product_ID']) . "'>Szerkesztés</a></td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Termék szerkesztése</h2>
            <form id="szerkeszto-form">
                <!-- Ide kerülnek a szerkesztéshez szükséges mezők -->
            </form>
            <button type="button" onclick="saveChanges()">Mentés</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var editLinks = document.querySelectorAll('.edit-link');

            editLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    var productId = this.getAttribute('data-id');
                    showEditor(productId);
                });
            });

            function showEditor(productId) {
                var modal = document.getElementById('myModal');
                modal.style.display = 'block';

                var szerkesztoForm = document.querySelector('#szerkeszto-form');

                // AJAX kérés a termék adatainak lekérésére
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'get_product_data.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            // Sikeres kérés esetén feldolgozzuk a választ
                            var productData;
                            console.log('Response Text:', xhr.responseText);
                            try {
                                productData = JSON.parse(xhr.responseText);
                                console.log('Product data received:', productData);
                            } catch (error) {
                                console.error('Error parsing JSON:', error);
                                return; // Ne folytassuk a feldolgozást, ha hiba történt
                            }

                            // A szerkesztő űrlap mezőit kitöltjük az adatokkal
                            szerkesztoForm.innerHTML = `
                                <label for="edited-product-id">Termék azonosító:</label>
                                <input type="text" id="edited-product-id" name="edited-product-id" value="${escape(productData.product_ID)}" readonly>
                                <br>
                                <label for="edited-product-name">Termék neve:</label>
                                <input type="text" id="edited-product-name" name="edited-product-name" value="${escape(productData.product_name)}">
                                <br>
                                <label for="edited-product-price">Termék ára:</label>
                                <input type="text" id="edited-product-price" name="edited-product-price" value="${escape(productData.price)}">
                                <br>
                                <label for="edited-product-description">Termék leírása:</label>
                                <textarea id="edited-product-description" name="edited-product-description">${escape(productData.description)}</textarea>
                                <br>
                                <!-- További mezők hozzáadása -->
                            `;
                        } else {
                            // Hiba esetén kiírjuk a hibaüzenetet
                            console.error('Error in AJAX request:', xhr.statusText);
                        }
                    }
                };

                // AJAX kérés küldése a termék azonosítójával
                xhr.send('product_id=' + productId);
            }

            function closeModal() {
                var modal = document.getElementById('myModal');
                modal.style.display = 'none';
            }

            window.onclick = function (event) {
                var modal = document.getElementById('myModal');
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            function saveChanges() {
                // AJAX kérés a módosítások mentésére
                // Az adatokat a szerkesztő űrlapról kell elküldeni
                var editedProductId = document.querySelector('#edited-product-id').value;
                var editedProductName = document.querySelector('#edited-product-name').value;
                var editedProductPrice = document.querySelector('#edited-product-price').value;
                var editedProductDescription = document.querySelector('#edited-product-description').value;

                // AJAX kód itt kell majd lennie a módosítások mentésére a szerveren
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'save_product_changes.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            // Sikeres kérés esetén frissíthetjük a táblázatot vagy kezelhetjük a választ
                            console.log('Changes saved successfully.');
                        } else {
                            // Hiba esetén kiírjuk a hibaüzenetet
                            console.error('Error in AJAX request:', xhr.statusText);
                        }
                    }
                };

                // AJAX kérés küldése az adatokkal
                xhr.send('product_id=' + editedProductId +
                    '&product_name=' + encodeURIComponent(editedProductName) +
                    '&product_price=' + editedProductPrice +
                    '&product_description=' + encodeURIComponent(editedProductDescription));

                // Zárjuk be a modal ablakot a mentés után
                closeModal();
            }

        });
    </script>
<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Termék szerkesztése</h2>
            <form id="szerkeszto-form">
                <!-- Ide kerülnek a szerkesztéshez szükséges mezők -->
            </form>
            <button type="button" onclick="saveChanges()">Mentés</button>
        </div>
    </div>
</body>

</html>
