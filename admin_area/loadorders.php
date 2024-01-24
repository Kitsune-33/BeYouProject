
<style>
        .displayer {
            border: 2px solid pink;

            height: 150px; /* Változtathatsz az értéken az igényeid szerint */
            padding: 10px;
            position: relative;
        }

        .vertical_center {
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .image_container {
            position: absolute;
            top:60%;
            right: 0;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            height: 50%; /* A kép magassága a displayer div magasságának 50%-a */
        }

        .displayer:hover {
            background-color: #fce4ec; /* Halvány rózsaszín háttérszín hover állapotban */
        }

        .displayer_header {
            color: black; /* Fekete szín */
        }

        .displayer_data {
            color: gray; /* Szürke szín */
        }

        .menu-item {
            font-size: 18px;
            color: #343a40;
            text-decoration: none;
            padding: 10px;
        }

        .menu-item.active,
        .menu-item:hover {
            border-bottom: 2px solid pink;
        }

    </style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="displayer mb-2">
                    <div class="vertical_center ms-3">
                        <div class="displayer_header">
                            <h4></h4>
                        </div>
                        <div class="displayer_data">
                            <h5></h5>
                        </div>
                    </div>
                    <div class="image_container me-3">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="displayer mb-2">
                    <div class="vertical_center ms-3">
                        <div class="displayer_header">
                            <h4></h4>
                        </div>
                        <div class="displayer_data">
                            <h5></h5>
                        </div>
                    </div>
                    <div class="image_container me-3">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="displayer mb-2">
                    <div class="vertical_center ms-3">
                        <div class="displayer_header">
                            <h4></h4>
                        </div>
                        <div class="displayer_data">
                            <h5></h5>
                        </div>
                    </div>
                    <div class="image_container me-3">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="displayer mb-2">
                    <div class="vertical_center ms-3">
                        <div class="displayer_header">
                            <h4></h4>
                        </div>
                        <div class="displayer_data">
                            <h5></h5>
                        </div>
                    </div>
                    <div class="image_container me-3">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS és Popper.js betöltése -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>



