<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css" integrity="sha512-wpPYUAdjBVSE4KJnH1VR1HeZfpl1ub8YT/NKx4PuQ5NmX2tKuGu6U/JRp5y+Y8XG2tV+wKQpNHVUX03MfMFn9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/watch_shop/style.css">
</head>

<body>
    <header class="header">
        <div class="header_container">
            <div class="logo">
                <a href="homepage.php"><img src="/watch_shop/Assets/assets_landscape/official-retailer-plaque-en.png" alt="Logo"></a>
            </div>
            <nav class="navigation">
                <ul>
                    <li class="menu_link"><a href="homepage.php">Home</a></li>
                    <li class="menu_link"><a href="#">All Items</a></li>
                    <li class="menu_link"><a href="#">Daydate</a></li>
                    <li class="menu_link"><a href="#">Dayjust Pearl</a></li>
                    <li class="menu_link"><a href="#">Date Just</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    $modelNumbers = array(100001, 100002, 100003, 100004, 100006, 100006);

    foreach ($modelNumbers as $modelNumber) {
        $imagePath = "/watch_shop/Assets/Product Images/" . $modelNumber . ".png";
        echo '<img src="' . $imagePath . '" alt="Product Image">';
    }
    ?>

    <img src="/watch_shop/Assets/Components and Dimensions/Watch_specifications.jpg" alt="Watch Specifications.jpg">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            function loadWatchSpecifications(modelNumber) {
                $.ajax({
                    url: '/watch_shop/views/server/get_watch_specifications.php',
                    type: 'GET',
                    data: { model_number: modelNumber },
                    success: function (response) {
                        updateSpecifications(response);
                    },
                    error: function () {
                        console.error('Error getting watch specifications from the server.');
                    }
                });
            }

            function updateSpecifications(specifications) {
                console.log(specifications);
                 $('#watchModel').text('Model: ' + specifications.model_case);
    $('#waterResistance').text('Water Resistance: ' + specifications.water_resistance);
    $('#movement').text('Movement: ' + specifications.movement);
            }

           
            loadWatchSpecifications('100001');
        });
    </script>
</body>

</html>

