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
        <div class="headerdiv1">
            <div class="headerlogo">
                <img src="../img/Logo.png" alt=""> 
            </div>
            <div class="headericons">
                <a href="#">
                    <span class="material-symbols-outlined iconstyle">
                        person
                    </span>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined iconstyle">
                        shopping_bag
                    </span>
                </a>
            </div>
        </div>

        <div class="headerdiv2">
            <nav class="navbar">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Összes termékek</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Gyűrűk</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Karkötők</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Nyakláncok</a>
                    </li>
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <div class="search-container">
                    <form action ="#">
                        <input type="search" class="search-data" placeholder="Search" required>
                        <button type="submit" class="fas fa-search"><span class="material-symbols-outlined">search</span></button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <script src="script.js"></script>
</body>

</html>
