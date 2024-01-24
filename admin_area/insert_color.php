<?php
include('../includes/connect.php');

if (isset($_POST['insert_color'])) {
    $colors_title = $_POST['color_title'];

    // Ellenőrzés: minimum 3 karakter szükséges
    if (strlen($colors_title) < 3) {
        echo "<script>alert('A színnek legalább 3 karakter hosszúnak kell lennie')</script>";
    } else {
        $select_query = "SELECT * FROM colors WHERE color_name='$colors_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('This color is already present in the database')</script>";
        } else {
            // Új szín beszúrása az adatbázisba
            $insert_query = "INSERT INTO colors (color_name) VALUES ('$colors_title')";
            $result = mysqli_query($con, $insert_query);

            if ($result) {
                echo "<script>alert('Color has been inserted successfully')</script>";
            } else {
                echo "<script>alert('Error inserting color')</script>";
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

<!--Űrlap az adatbázisba való szín feltöltéshez-->

<!--Szöveges beviteli mező -->
<form action="index.php?insert_color" method="post" class="mb-2">
    <div class="primary_container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="color_title" placeholder="Szín" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>

        <!--Beviteli gomb-->
        <div class="d-flex justify-content-center">
            <div class="input-group mb-2">
                <button type="submit" class="btn form-control" name="insert_color">
                    Szín feltöltése
                </button>
            </div>
        </div>
    </div>
</form>
