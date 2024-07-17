<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="css files/style.css" />
    <link rel="stylesheet" href="css files/fonts.css" />
    <link rel="stylesheet" href="css files/commonStyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rozha+One&display=swap" rel="stylesheet">

</head>
  <body>
  <?php
    include("navigation.php");
    include_once("db_config.php");
    ?>

    <div class ="header">
      <img class="headerImage" src="images/headerImage.webp">
      <div class="headerBackground"></div>
      <div class="headerText rozha-one-regular">FRAGRANCE</div>
    </div>
    <div class="label">
      <div class="title poppins-medium">Products</div>
      <div class="description poppins-medium">Order it for you and your beloved ones.</div>
    </div>

    <div class="productSection">
    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo '<div class ="productCard">';
          echo '<div class ="cardBackground">';
          echo '<a href="productDetails.php?title=' . urlencode($row['product_name']) . '&image=' . $row['image'] . '&price=' . $row['price'] . '">';
          echo '<img class ="productImage" src="images/' . $row['image'] . '">';
          echo '</a>';
          echo '<div class="productDescription">';
          echo '<div class="productText poppins-medium">' . $row['product_name'] . '</div>';
          echo '<div class="productPrice poppins-medium">' . (int)$row['price'] . ' MYR</div>'; // Added a space before 'MYR'
          echo '</div>';
          echo '</div>';
          echo '</div>';
      }
    } else {
        echo "No products found in the database";
    }
    ?>
    </div>

    <div class ="popularSection">
      <div class ="title poppins-medium"> Popular</div>
      <div class ="description poppins-medium">Our top selling products that you may like</div>
      <div class ="popularProduct">
        <?php
        $sql = "SELECT * FROM popular_products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<div class ="productCard">';
            echo '<div class ="cardBackground">';
            echo '<a href="productDetails.php?title=' . urlencode($row['product_name']) . '&image=' . $row['image'] . '&price=' . $row['price'] . '">';
            echo '<img class ="productImage" src="images/' . $row['image'] . '">';
            echo '</a>';
            echo '<div class="productDescription">';
            echo '<div class="productText poppins-medium">' . $row['product_name'] . '</div>';
            echo '<div class="productPrice poppins-medium">' . (int)$row['price'] . ' MYR</div>'; // Added a space before 'MYR'
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "No products found in the database";
        }
        ?>
    </div>
  </div>
    
  </body>
  <?php
    include("footer.php");
  ?>
</html>