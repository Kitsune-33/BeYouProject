<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Termékek</title>
            
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
</head>

<body>
    <header>
        
        <div class="contact-info">
            <div>beyou@yoube.com</div>
        </div>
        <div class="logo-container">
            <div class="logo">
                <img src="img/logo.png" alt="Logo">
            </div>
        </div>
        <div class="search-bar">
            <button>Bejelentkezés</button>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Collections</a></li>
            <li><a href="#">On Sale%</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>
   
    
    <div class="kepekkozepre">
        <div class="image-container">
            <div class="left-image">
                <img src="img/Nagykep.png" alt="Kép 1" class="responsive-image">
            </div>
            <div class="right-images">
                <div class="image-box">
                    <img src="img/kiskep.png" alt="Kép 2" class="responsive-image">
                </div>
                <div class="image-box">
                    <img src="img/kiskep.png" alt="Kép 3" class="responsive-image">
                </div>
            </div>
        </div>
    </div>
    

<!--
<script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var adatok = JSON.parse(this.responseText);
            var table = "<table border='1'><tr><th>ProductID</th><th>ProductName</th><th>Price</th><th>Description</th><th>Stock</th><th>Type</th><th>Color</th></tr>";
            for (var i = 0; i < adatok.length; i++) {
                table += "<tr><td>"+adatok[i].ProductID+"</td><td>"+adatok[i].ProductName+"</td><td>"+adatok[i].Price+"</td><td>"+adatok[i].Description+"</td><td>"+adatok[i].Stock+"</td><td>"+adatok[i].Type+"</td><td>"+adatok[i].Color+"</td></tr>";
            }
            table += "</table>";
            document.getElementById("adatok").innerHTML = table;
        }
    };
    xhttp.open("GET", "http://localhost/getdata.php", true);
    xhttp.send();

    
</script>
-->

<?php
getIPAddress();
$ip = getIPAddress();  
echo 'User Real IP Address - '.$ip;  


?>

</body>
</html>
