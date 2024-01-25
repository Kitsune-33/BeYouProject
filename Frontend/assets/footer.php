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
    font-weight: bold;
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
}

.footer_content ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer_list_item {
    margin-bottom: 8px;
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

    </style>
</head>

<body>
    <footer>
    <div class="container-fluid s_view">
            <div class="footer_container">
                <div class="hr">

                    <hr>    
                </div>
                <div class="footer_item footer_start">
                    <div class="footer_title">
                        <p>Explore</p>
                    </div>
                    <div class="footer_content">
                        <ul>
                            <li class="footer_list_item">All products</li>
                            <li class="footer_list_item">Necklaces</li>
                            <li class="footer_list_item">Rings</li>
                            <li class="footer_list_item">Bracelets</li>
                            <li class="footer_list_item">Charms</li>
                        </ul>
                    </div>
                </div>
                <div class="footer_item">
                    <div class="footer_title">
                        <p>Service</p>
                    </div>
                    <div class="footer_content">
                        <ul>
                            <li class="footer_list_item">Shipping</li>
                            <li class="footer_list_item">Refund</li>
                            <li class="footer_list_item">Discounts</li>
                        </ul>
                    </div>
                </div>
                <div class="footer_item vanish">
                    <!-- Empty column -->
                </div>
                <div class="footer_item">
                    <div class="footer_title">
                        <p>About us</p>
                    </div>
                    <div class="footer_content">
                        <ul>
                            <li class="footer_list_item">Contact</li>
                            <li class="footer_list_item">Our story</li>
                        </ul>
                    </div>
                </div>
                <div class="footer_item footer_end">
                    <div class="footer_title">
                        <p>About us</p>
                    </div>
                    <div class="footer_content">
                        <ul>
                            <li class="footer_list_item">Contact</li>
                            <li class="footer_list_item">Our story</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        




        
    </footer>
</body>

</html>
