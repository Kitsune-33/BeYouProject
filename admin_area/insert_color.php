<!--Űrlap összekötése az adatbázissal-->
<?php
include('../includes/connect.php');


if(isset($_POST['insert_color'])){
    $colors_title = $_POST['color_title']; // Bemeneti adat fogadása

    // Adatbázisban való keresés
    $select_query = "SELECT * FROM colors WHERE color_name='$colors_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number > 0){
        echo "<script>alert('This color is already present in the database')</script>";
    } else {
        // Új szín beszúrása az adatbázisba
        $insert_query = "INSERT INTO colors (color_name) VALUES ('$colors_title')"; 
        $result = mysqli_query($con, $insert_query);

        if($result){
            echo "<script>alert('Color has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error inserting color')</script>";
        }
    }
}
?>



<!--Űrlap az adatbázisba való szín feltöltéshez-->

<!--Szöveges beviteli mező-->
<form action="index.php?insert_color" method="post" class="mb-2">
    <div class="d-flex justify-content-center align-items-center w-100">
        <div class="input-group w-75 mb-2">
            <input type="text" class="form-control" name="color_title" 
            placeholder="Szín" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </div>

    <!--Beviteli gomb-->
    <div class="d-flex justify-content-center w-100">
        <div class="input-group w-75 mb-2">
            <input type="submit" class="form-control bg-pink" name="insert_color" value="Szín feltöltése"
            placeholder="Szín hozzáadása" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </div>

</form>

<!---------------------------------------------------------->


<?php
if(isset($_POST['insert_color'])) {
    // Feldolgozás logikája
}
?>

