<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css"
      integrity="sha512-wpPYUAdjBVSE4KJnH1VR1HeZfpl1ub8YT/NKx4PuQ5NmX2tKuGu6U/JRp5y+Y8XG2tV+wKQpNHVUX03MfMFn9Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

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
       <li class="menu_link"><a href="#" >All Items</a></li>
        <li class="menu_link"><a href="#">Daydate</a></li>
        <li class="menu_link"><a href="#">Dayjust Pearl</a></li>
        <li class="menu_link"><a href="#">Date Just</a></li>
      </ul>
    </nav>
</div>
  </header>
  <section class="baner">
  <div class="image-banner">
    <img src="/watch_shop/Assets/assets_landscape/banner-xs_datejust-36_portrait.jpg" alt="Banner Image">
  </div>
</section>
  <section class="text">
  <div class="text-component">
    <h2 class="h2">Experience a Rolex</h2>
    <h1 class="h1">Rolex Watches</h1>
    <p class="p">Rolex watches are crafted from the finest raw materials and assembled with scurpulous attention to detail.Every component is designed, developed and produced to the most exactingstandarts.</p>
  </div>
</section>
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
<section class="grid-editorial">
  <h2 class="h2">Featured selections</h2>
  <div class="editorial-grid">
    
    <div class="editorial-row">
      <div class="editorial double-width">
        <img src="/watch_shop/Assets/assets_portrait/mens-watches_sky_dweller_portrait.jpg" alt="Чоловічі годинники Rolex">
        <h1 class="h1">Rolex Men's Watches</h1>
      </div>
      <div class="editorial double-width">
        <img src="/watch_shop/Assets/assets_portrait/womens-watches_pearlmaster_39_portrait.jpg" alt="Жіночі годинники Rolex">
        <h1 class="h1">Rolex Women's Watches</h1>
      </div>
    </div>
    

    <div class="editorial-row">
      <div class="editorial double-width">
        <img src="/watch_shop/Assets/assets_portrait/gold-watches_portrait.jpg" alt="Золоті годинники Rolex">
        <h1 class="h1">Rolex Gold Whatches</h1>
      </div>
    </div>
  </div>
</section>
<section class="Image_component">
<div class="centered-image">
  <img src="/watch_shop/Assets/assets_portrait/experience-a-rolex_portrait.jpg" alt="Rolex">
</div>
</section>
<section class="text">
  <div class="text-component">
     <h1 class="h1">Visit us in Store</h1>
    <p class="p">Rolex watches are crafted from the finest raw materials and assembled with scurpulous attention to detail.Every component is designed, developed and produced to the most exactingstandarts.</p>
    <button type="button" class="button">Contact us</button>
  </div>
</section>
<section class="keep">
  <div class="content-wrapper">
    <h2 class="h2">Keep exploring</h2>
    <div class="slider-container">
      <div class="slider">
        <div class="slide">
          <img src="/watch_shop/Assets/assets_portrait/keep-exploring-rolex-collection_portrait.jpg" alt="Image 1">
          <h2 class="h2">Rolex Collection</h2>
        </div>
        <div class="slide">
          <img src="/watch_shop/Assets/assets_portrait/keep-exploring-new-2019-watches_portrait.jpg" alt="Image 2">
          <h2>New 2020 Watches</h2>
        </div>
        <div class="slide">
          <img src="/watch_shop/Assets/assets_portrait/keep-exploring-contact-us_portrait.jpg" alt="Image 3">
          <h2>Contact Us</h2>
        </div>
        
      </div>
      <button type="button" onclick="nextSlide()" class="arrow-button">&#9654;</button>
    </div>
  </div>
</section>
<footer class="footer">
  <img src="/watch_shop/Assets/assets_portrait/Rolex_logo_206x114.jpg" alt="Image 3">
  <nav class="footer_navigation">
      <ul>
        <li class="footer_link"><a class="footer_item"href="#">Rolex at[Retailer Name]</a></li>
        <li class="footer_link"><a class="footer_item" href="#">Rolex Collection</a></li>
        <li class="footer_link"><a class="footer_item" href="#">New 2020 whatches</a></li>
        <li class="footer_link"><a class="footer_item" href="#">Contact us</a></li>
      </ul>
    </nav>
  <button type="button" class="scroll" onclick="scrollToTop()">^</button>
</footer>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const slider = document.querySelector('.slider');
  const slides = document.querySelectorAll('.slide');
  let currentIndex = 0;

  function showSlide(index) {
    const translateValue = -index * (100 / slides.length) + '%';
    slider.style.transform = 'translateX(' + translateValue + ')';
  }

  window.nextSlide = function() {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    showSlide(currentIndex);
  }

  document.querySelector('button').addEventListener('click', nextSlide);
  showSlide(currentIndex);
});
</script>
<script>
  function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
</body>
</html>