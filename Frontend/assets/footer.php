<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer</title>
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .footer_container {
            background-color: #F6F6F6;
            padding-left: 3rem;
            padding-right: 3rem;
        }

        .footer_title {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0f0f0; /* Halvány szürke háttér */
            padding: 10px 20px;
            margin-bottom: 1px; /* Szürke csík elválasztás */
        }

        .icon {
            font-size: 24px;
        }

        .footer_container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .footer_item {
            box-sizing: border-box;
            padding: 20px;
            margin: 10px;
            background-color: #f7f7f7;
            border-top: 1px solid #dcdcdc;
        }
        .footer_title:hover {
            background-color: #e0e0e0; /* Sötétebb szürke, ha fölötte van az egér */
        }

        .footer_content ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #f9f9f9; /* Világosabb háttér a lenyíló tartalomnak */
            padding-left: 20px; /* Kis térköz a bal oldalon */
            padding-right: 20px; /* Kis térköz a jobb oldalon */
            display: none;
        }

        .footer_list_item {
            padding: 8px 0; /* Padding a menüpontok között */
        }
        .hr{
            width: 100%;
        }

        .footer_start{
            margin-left: 2.3rem;
        }
        .footer_end{
            margin-right: 2.3rem;
        }


        @media (max-width: 768px) {
            .l_view{
                display:none;
            }
            .s_view{
                display:block;
            }
            .footer_container {
                        flex-direction: column; /* Egymás alá rendezés mobil nézetben */
                    }
                    .footer_start{
                        margin:0
                    }
                    .footer_end{
                        margin:0;
                    }
            }
            .navbar {
            display: flex;
            justify-content: space-between;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Kisebb képernyőkre vonatkozó stílusok */
        @media screen and (max-width: 768px) {
            .navbar {
                display: none;
            }

            .dropdown-content {
                display: none; /* Alapértelmezetten elrejtjük */
            }

            .dropdown-btn {
                display: block;
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                width: 100%;
            }
        }

    </style>
</head>

<body>
    <footer>
        <div class="container-fluid s_view">
            <div class="footer_container">
                <div class="footer_item footer_start" id="exploreMenu">
                    <div class="footer_title" onclick="toggleMenu('exploreContent', this)">Explore <span class="icon">+</span></div>
                    <div class="footer_content" id="exploreContent" style="display: none;">
                        <ul>
                            <li class="footer_list_item">All products</li>
                            <li class="footer_list_item">Necklaces</li>
                            <li class="footer_list_item">Rings</li>
                            <li class="footer_list_item">Bracelets</li>
                            <li class="footer_list_item">Charms</li>
                        </ul>
                    </div>
                </div>
                <div class="footer_item footer_start" id="serviceMenu">
                    <div class="footer_title" onclick="toggleMenu('serviceContent', this)">Service <span class="icon">+</span></div>
                    <div class="footer_content" id="serviceContent" style="display: none;">
                        <ul>
                            <li class="footer_list_item">Shipping</li>
                            <li class="footer_list_item">Refund</li>
                            <li class="footer_list_item">Discounts</li>
                        </ul>
                    </div>
                </div>
                <div class="footer_item footer_start" id="aboutMenu">
                    <div class="footer_title" onclick="toggleMenu('AboutContent', this)">About us <span class="icon">+</span></div>
                    <div class="footer_content" id="AboutContent" style="display: none;">
                        <ul>
                            <li class="footer_list_item">Shipping</li>
                            <li class="footer_list_item">Refund</li>
                            <li class="footer_list_item">Discounts</li>
                        </ul>
                    </div>
                </div>
                <div class="footer_item footer_start" id="aboutusMenu">
                    <div class="footer_title" onclick="toggleMenu('AboutusContent', this)">About us <span class="icon">+</span></div>
                    <div class="footer_content" id="AboutusContent" style="display: none;">
                        <ul>
                            <li class="footer_list_item">Shipping</li>
                            <li class="footer_list_item">Refund</li>
                            <li class="footer_list_item">Discounts</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>    
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var mediaQuery = window.matchMedia("(max-width: 768px)");

            function toggleMenu(contentId, titleElement) {
                var content = document.getElementById(contentId);
                var icon = titleElement.querySelector('.icon');
                if (content.style.display === "block" || content.style.display === "") {
                    content.style.display = "none";
                    icon.textContent = "+";
                } else {
                    content.style.display = "block";
                    icon.textContent = "-";
                }
            }

            // Globálisan hozzáférhetővé tesszük a függvényt
            window.toggleMenu = toggleMenu;

            // Képernyő átméretezésekor bezárjuk a menüket
            function handleWindowResize(e) {
                if (!mediaQuery.matches) {
                    var allContents = document.querySelectorAll('.footer_content');
                    allContents.forEach(function(content) {
                        content.style.display = "none";
                        var icon = content.previousElementSibling.querySelector('.icon');
                        if (icon) {
                            icon.textContent = "+";
                        }
                    });
                }
            }

            // Eseményfigyelő hozzáadása a képernyő átméretezéséhez
            mediaQuery.addEventListener('change', handleWindowResize);
        });

    </script>
</body>

</html>
