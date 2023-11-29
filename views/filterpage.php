<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css"
        integrity="sha512-wpPYUAdjBVSE4KJnH1VR1HeZfpl1ub8YT/NKx4PuQ5NmX2tKuGu6U/JRp5y+Y8XG2tV+wKQpNHVUX03MfMFn9Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="/watch_shop/style.css">
</head>

<body>
    <header class="header">
        <div class="header_container">
            <div class="logo">
                <a href="views/homepage.php"><img
                        src="/watch_shop/Assets/assets_landscape/official-retailer-plaque-en.png" alt="Logo"></a>
            </div>
            <nav class="navigation">
                <ul>
                    <li class="menu_link"><a href="views/homepage.php">Home</a></li>
                    <li class="menu_link" data-category-id="1"><a href="#">Date Just</a></li>
                    <li class="menu_link" data-category-id="5"><a href="#">Date Just Pearl</a></li>
                    <li class="menu_link" data-category-id="6"><a href="#">Day-Date</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="grid">
        <div class="watch-grid">
            <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "programmer1_maindb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="watch">';
        
        if (isset($row["image_url"]) && !empty($row["image_url"])) {
            $image_url = "/watch_shop/proxy.php?image=" . $row["image_url"];
            echo '<img src="' . $image_url . '" alt="' . $row["large_title"] . '">';
        } else {
            echo '<p>Product image not available</p>';
        }

        echo '<h3>' . $row["large_title"] . '</h3>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<p>Price: $' . $row["price"] . '</p>';
        echo '</div>';
    }
} else {
    echo "Товари не знайдено.";
}

$conn->close();
?>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var menuLinks = document.querySelectorAll('.menu_link');

            menuLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();

                    var categoryId = link.dataset.categoryId;
                    loadProductsByCategory(categoryId);
                });
            });
        });

        function loadProductsByCategory(categoryId) {
            $.ajax({
                url: '/watch_shop/views/server/get_products.php',
                type: 'GET',
                data: { category_id: categoryId },
                success: function (response) {
                    displayProducts(response);
                },
                error: function () {
                    console.error('Error getting products from the server.');
                }
            });
        };

        function displayProducts(products) {
    var watchGrid = document.querySelector('.watch-grid');
    watchGrid.innerHTML = '';

    if (Array.isArray(products)) {
        products.forEach(function (product) {
            var watch = document.createElement('div');
            watch.className = 'watch';

            if (product.image_url) {
                var image = document.createElement('img');
                image.src = '/watch_shop/proxy.php?image=' + product.image_url;
                image.alt = product.large_title;
                watch.appendChild(image);
            } else {
                var noImage = document.createElement('p');
                noImage.textContent = 'Product image not available';
                watch.appendChild(noImage);
            }

            var title = document.createElement('h3');
            title.textContent = product.large_title;
            watch.appendChild(title);

            var description = document.createElement('p');
            description.textContent = product.description;
            watch.appendChild(description);

            var price = document.createElement('p');
            price.textContent = 'Price: $' + product.price;
            watch.appendChild(price);

            watchGrid.appendChild(watch);
        });
    } else {
        console.error('Invalid products data:', products);
    }
}

    </script>
</body>

</html>
