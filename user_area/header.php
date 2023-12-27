<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
</head>

<body>
    
    <header>
        <div class="header_headerdiv1">
            <div class="header_headerlogo">
                <img class="header_img" src="../img/Logo.png" alt=""> 
            </div>
            <div class="header_headericons">
                <a href="loginpage.php">
                    <span class="material-symbols-outlined iconstyle">
                        person
                    </span>
                </a>
                <a href="cartpage.php">
                    <span class="material-symbols-outlined iconstyle">
                        shopping_bag
                    </span>
                </a>
            </div>
        </div>

        <div class="header_headerdiv2">
            <nav class="header_navbar">
                <ul class="header_nav-menu">
                    <li class="header_nav-item">
                        <a href="#" class="header_nav-link">Home</a>
                    </li>
                    <li class="header_nav-item">
                        <a href="products.php" class="header_nav-link">Összes termékek</a>
                    </li>
                    <li class="header_nav-item">
                        <a href="#" class="header_nav-link">Gyűrűk</a>
                    </li>
                    <li class="header_nav-item">
                        <a href="#" class="header_nav-link">Karkötők</a>
                    </li>
                    <li class="header_nav-item">
                        <a href="#" class="header_nav-link">Nyakláncok</a>
                    </li>
                </ul>
                <div class="header_hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <div class="header_search-container">
                    <form action ="#">
                        <input type="search" class="header_search-data" placeholder="Search" required>
                        <button type="submit" class="fas fa-search"><span class="material-symbols-outlined">search</span></button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <script src="script.js"></script>
</body>

</html>
