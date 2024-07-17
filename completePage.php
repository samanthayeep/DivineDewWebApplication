<?php
// Start the session
session_start();

// Unset the session variable
unset($_SESSION['cart']);

if (!isset($_SESSION['cart'])) {
    echo "Session variable 'cart' has been unset.";
} else {
    echo "Session variable 'cart' still exists.";
}
?>


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
    ?>
<div class="navigation">
    <table>
<tr>
    <td>
        <div class="word color">Cart</div></td>
    <td>
        <div class="symbol color"> ></div></td>
    <td>
        <div class="word color"> Details </div></td>
    <td>
        <div class="symbol color"> ></div></td>
    <td> 
        <div class="word color"> Shipping </div>
    </td>
    <td> 
        <div class="symbol color"> ></div></td>
    <td> 
        <div class="word"> Payment </div>
    </td>
</tr>
</table>
</div>
        <div class="confirmation">
          <div class="image">
            <img class="detailsImage" src="Images/checkCircle.png">
          </div>
            <h1>Payment Confirmed</h1>
            <div class="poppins-light" style="color:#83764F">ORDER #2039</div>
            <br>
            <div class="roboto-light">Thank you for purchasing at DivineDew.
            Now that your order is confirmed it will be ready to ship in 2 days.
            Please check your inbox in the future for your order updates.</div>
            <br>
            <form action="index.php">
            <input type="submit" value="Back to homepage" style="width: 300px; margin: auto"/>
            </form>
            <br>
            <br>
            <div class="print-receipt roboto-light"><a ref="#">Print receipt</a>
</div>
        </div>
    </div>

  </body>
</html>

