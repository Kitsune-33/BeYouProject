<?php
include('../includes/connect.php');

if(isset($_POST['insert_type'])){
    $type_title = $_POST['type_title']; // Bemeneti adat fogadása

    // Adatbázisban való keresés
    $select_query = "SELECT * FROM types WHERE type_Name='$type_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number > 0){
        echo "<script>alert('This type is already present in the database')</script>";
    } else {
        // Új típus beszúrása az adatbázisba
        $insert_query = "INSERT INTO types (type_Name) VALUES ('$type_title')"; 
        $result = mysqli_query($con, $insert_query);

        if($result){
            echo "<script>alert('Type has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error inserting type')</script>";
        }
    }
}
?>



<!--Űrlap az adatbázisba való típus feltöltéshez-->

<!--Szöveges beviteli mező-->
<form action="index.php?insert_type" method="post" class="mb-2">
    <div class="d-flex justify-content-center align-items-center w-100 mt-5">
        <div class="input-group w-75 mb-2">
            <input type="text" class="form-control" name="type_title" 
            placeholder="Típus" aria-label="Type" aria-describedby="basic-addon1">
        </div>
    </div>

    <!--Beviteli gomb-->
    <div class="d-flex justify-content-center w-100">
        <div class="input-group w-75 mb-2">
            <input type="submit" class="form-control bg-info" name="insert_type" value="Típus feltöltése"
            placeholder="Típus hozzáadása" aria-label="Type" aria-describedby="basic-addon1">
        </div>
    </div>
</form>

<!---------------------------------------------------------->

<?php
if(isset($_POST['insert_type'])) {
    // Feldolgozás logikája
}
?>
