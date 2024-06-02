<?php 
require_once "queryDb.php";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
} else {
    $search = "";
}
$products = getProducts($search);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lil' Plush Products</title>
    <link rel="stylesheet" href="style/index.css" />
  </head>
  <body>
    <!-- HEADER -->
    <header>
        <div class="header">
            <h1><a href="./index.html">Lil' Plush</a></h1>
            <div class="search">
                <input type="text" placeholder="Search your plushie...">
            </div>
            <nav class="navbar">
                <a href="./newCollection.html">NEW COLLECTION</a>
                <a href="./allPlush.html">ALL PLUSHIES</a>
                <a href="./favourites.html">FAVOURITES</a>
                <a href="./aboutUs.html">ABOUT US</a>
                <a href="./products.php">GIFTS</a>
            </nav>
        </div>
    </header>

    <!-- SEARCHING -->
    <div class="searching">
        <h2 class="mainTitle">A SPECIAL GIFT FOR LOYAL CUSTOMER...</h2>
        <img src="./img/gift.jpeg" alt="">
    </div>
    
    <form action="products.php" method="get">
      <h3></h3>
      <input
        type="text"
        id="search"
        name="search"
        placeholder="Exploring a special gift..."
        value="<?php echo htmlspecialchars($search); ?>"
      />
      <button type="submit" value="Search">Search</button>
    </form>

    <!-- DATABASE -->
    <table class="container">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Manufacturer</th>
          <th>Description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
          <td><?= htmlspecialchars($product['PRODUCTNAME']) ?></td>
          <td><?= htmlspecialchars($product['MANUFACTURER']) ?></td>
          <td><?= htmlspecialchars($product['DESCRIPTION']) ?></td>
          <td>$<?= htmlspecialchars(number_format($product['PRICE'], 2)) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- FOOTER -->
    <footer>
        <div class="footer">
            <p>&copy; 2024 Lil' Plush - Viet My Tran Le (Lily)</p>
        </div>
        <div class="footer-section">
            <a href="#">Privacy and Policy</a>
            <a href="#">Customer Care</a>
            <a href="#">About Us</a>
        </div>
    </footer>
  </body>
</html>

