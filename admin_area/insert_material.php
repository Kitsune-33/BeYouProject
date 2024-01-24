<?php
include('../includes/connect.php');

if (isset($_POST['insert_material'])) {
    $material_title = $_POST['material_title']; // Bemeneti adat fogadása

    // Ellenőrzés: minimum 3 karakter szükséges
    if (strlen($material_title) < 3) {
        echo "<script>alert('Az anyagnak legalább 3 karakter hosszúnak kell lennie')</script>";
    } else {
        // Adatbázisban való keresés
        $select_query = "SELECT * FROM materials WHERE material_Name='$material_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('This material is already present in the database')</script>";
        } else {
            // Új anyag beszúrása az adatbázisba
            $insert_query = "INSERT INTO materials (material_Name) VALUES ('$material_title')";
            $result = mysqli_query($con, $insert_query);

            if ($result) {
                echo "<script>alert('Material has been inserted successfully')</script>";
            } else {
                echo "<script>alert('Error inserting material')</script>";
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

<!-- Anyag beszúrása az adatbázisba űrlap -->
<form action="index.php?insert_material" method="post" class="mb-2">
    <div class="primary_container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="material_title" 
                placeholder="Anyag neve" aria-label="Material" aria-describedby="basic-addon1">
            </div>
        </div>

        <!-- Beviteli gomb -->
        <div class="d-flex justify-content-center">
            <div class="input-group mb-2">
                <button type="submit" class="btn form-control" name="insert_material">
                    Material upload
                </button>
            </div>
        </div>
    </div>
</form>

<?php
if (isset($_POST['insert_material'])) {
    // Feldolgozás logikája
}
?>
