<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asd.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .bordereddiv {
            border: 1px solid gray;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }


        img {
            max-width: 100%;
            height: auto;
            display: block; /* Centrálja a képet a konténerben */
            margin: auto; /* Centrálja a képet a konténerben */
        }

        .displayer {
            border: 1px solid gray;
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

        .kep {
            width: 80%;
        }

        .kepfelirat {
            text-align: center;
            border-bottom: 1px solid pink;
            max-width: 60%;
            margin-top: 10px;
            padding-bottom: 5px;
        }
        .bordereddiv:hover .kepfelirat{
            border-bottom: 2px solid pink;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-4">
                <div class="displayer">
                    <div class="vertical_center">
                        <h2>Fedezze fel az ékszerek világát</h2>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="bordereddiv">
                    <div class="kep m-3">
                        <img class="img-fluid" src="..//img/gyuru.png" alt="Ékszer kép">
                    </div>
                    <div class="kepala">
                    <div class="kepfelirat mb-3">
                        Pandora Ring
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="bordereddiv">
                    <div class="kep m-3">
                    <img class="img-fluid" src="..//img/karkoto.png" alt="Ékszer kép">
                    </div>
                    <div class="kepfelirat mb-3">
                        Pandora Ring
                    </div>
                    <div class="alahuzas">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
            <div class="bordereddiv">
                    <div class="kep m-3">
                    <img class="img-fluid" src="..//img/nyaklanc.png" alt="Ékszer kép">
                    </div>
                    <div class="kepfelirat mb-3">
                        Pandora Ring
                    </div>
                    <div class="alahuzas">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
            <div class="bordereddiv">
                    <div class="kep m-3">
                    <img class="img-fluid" src="..//img/charm.png" alt="Ékszer kép">
                    </div>
                    <div class="kepfelirat mb-3">
                        Pandora Ring
                    </div>
                    <div class="alahuzas">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
