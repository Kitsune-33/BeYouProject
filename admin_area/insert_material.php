<?php
include('../includes/connect.php');

if(isset($_POST['insert_material'])){
    $material_title = $_POST['material_title']; // Bemeneti adat fogadása

    // Adatbázisban való keresés
    $select_query = "SELECT * FROM materials WHERE material_Name='$material_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number > 0){
        echo "<script>alert('This material is already present in the database')</script>";
    } else {
        // Új anyag beszúrása az adatbázisba
        $insert_query = "INSERT INTO materials (material_Name) VALUES ('$material_title')"; 
        $result = mysqli_query($con, $insert_query);

        if($result){
            echo "<script>alert('Material has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error inserting material')</script>";
        }
    }
}
?>


<!-- Anyag beszúrása az adatbázisba űrlap -->
<form action="index.php?insert_material" method="post" class="mb-2">
    <div class="d-flex justify-content-center align-items-center w-100 mt-5">
        <div class="input-group w-75 mb-2">
            <input type="text" class="form-control" name="material_title" 
            placeholder="Anyag neve" aria-label="Material" aria-describedby="basic-addon1">
        </div>
    </div>

    <!-- Beviteli gomb -->
    <div class="d-flex justify-content-center w-100">
        <div class="input-group w-75 mb-2">
            <input type="submit" class="form-control bg-info" name="insert_material" value="Anyag feltöltése"
            placeholder="Anyag hozzáadása" aria-label="Material" aria-describedby="basic-addon1">
        </div>
    </div>
</form>
