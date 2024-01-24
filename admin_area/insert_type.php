<?php
include('../includes/connect.php');

if (isset($_POST['insert_type'])) {
    $type_title = $_POST['type_title']; // Bemeneti adat fogadása

    // Ellenőrzés: minimum 3 karakter szükséges
    if (strlen($type_title) < 3) {
        echo "<script>alert('A típusnak legalább 3 karakter hosszúnak kell lennie')</script>";
    } else {
        // Adatbázisban való keresés
        $select_query = "SELECT * FROM types WHERE type_Name='$type_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('This type is already present in the database')</script>";
        } else {
            // Új típus beszúrása az adatbázisba
            $insert_query = "INSERT INTO types (type_Name) VALUES ('$type_title')";
            $result = mysqli_query($con, $insert_query);

            if ($result) {
                echo "<script>alert('Type has been inserted successfully')</script>";
            } else {
                echo "<script>alert('Error inserting type')</script>";
            }
        }
    }
}
?>

<style>
.primary_container {
    margin: auto;
    width: 50%;
}

.btn {
    width: 25% !important;
    background-color: #27251F;
    color: white;
    justify-content: center;
    height: 40px;
}

.btn:hover {
    transition: 0.3s;
    background-color: #FFCAD4;
    color: black;
}
</style>

<!-- Típus feltöltése az adatbázisba űrlap -->
<form action="index.php?insert_type" method="post" class="mb-2">
    <div class="primary_container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="type_title" 
                placeholder="Típus" aria-label="Type" aria-describedby="basic-addon1">
            </div>
        </div>

        <!-- Beviteli gomb -->
        <div class="d-flex justify-content-center">
            <div class="input-group mb-2">
                <button type="submit" class="btn form-control" name="insert_type">
                    Típus feltöltése
                </button>
            </div>
        </div>
    </div>
</form>

<?php
if (isset($_POST['insert_type'])) {
    // Feldolgozás logikája
}
?>
