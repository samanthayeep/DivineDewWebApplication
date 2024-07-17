<?php session_start(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="css files/cartPageStyle.css" />
    <link rel="stylesheet" href="css files/fonts.css" />
    <link rel="stylesheet" href="css files/commonStyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rozha+One&display=swap" rel="stylesheet">
</head>

<body>
    <?php    
    include("navigation.php") 
    ?>
    <div class="cartContainer">
        <div class="column1">
            <div class="cartTitle poppins-medium">
                Your cart items
            </div>
            <br>
            <div class="hyperLink roboto-regular">
                <a href="listingPage.php"> Back to shopping</a>
                
            </div>
        </div>
    <br>
    <br>

    <div class="column2">
        <div class="row">
            <div class="title tableColumn poppins-medium">
                Product
            </div>
            <div class="product-details tableColumn poppins-medium" style="padding-left: 130px;">
                Unit Price
            </div>
            <div class="product-details tableColumn poppins-medium">
                Quantity
            </div>
            <div class="product-details tableColumn poppins-medium">
                Total
            </div>
        </div>
    </div>

    <div class ="cartProducts">
    <?php
    
    if (!empty($_SESSION['cart'])) {
        //if the cart is not empty
        foreach ($_SESSION['cart'] as $item) {
            //iterate through each item in the cart
    ?>
        <div class="row">
            <div class="productDetails poppins-medium">
                <div class="image-gallery">
                    <img src="Images/<?php echo $item['image']; ?>" id="productImg" alt="<?php echo $item['title']; ?>">
                </div>
            </div>
            <div class="productDetailsName poppins-medium">
                <div class="productName poppins-medium" style="width: 370px;">
                    <?php echo $item['title']; ?>
                </div>
                <br>
                <div class="remove roboto-regular">
                <a class="remove-btn" data-title="<?php echo $item['title']; ?>" onclick="removeItem('<?php echo $item['title']; ?>')"> Remove </a>
                </div>
            </div>
            <div class="productDetails poppins-medium">
                <div class="price"><?php echo $item['price']; ?>MYR</div>
            </div>
            <div class="productDetails poppins-medium">
                <div class="increment-box">
                <button class="decrement-btn" data-title="<?php echo $item['title']; ?>">-</button>
                <input type="number" class="quantity-input" value= <?php echo $item['quantity']?> data-title="<?php echo $item['title']; ?>">
                <button class="increment-btn" data-title="<?php echo $item['title']; ?>">+</button>
                </div>
            </div>
            <div class="productDetails poppins-medium" >
                <div class="price"><?php echo $item['price']*$item['quantity']; ?>MYR</div>
            </div>
        </div>
        <?php
        }
        } else {
            ?>
            <div class ="poppins-medium"id="errorMessage">Your cart is empty.</div>
            <!-- if cart is empty, display message -->
            <?php
        }
        ?>
   </div>

   <script>
    document.querySelectorAll('.remove-btn').forEach(function(button) {
        //this line select all element with the class name "remove-btn" & loop thru each of them using forEach method
    button.addEventListener('click', function() {
        //add event listener to each remove-btn element 
        var title = button.getAttribute('data-title');
        //retrieve value of 'data title' from the clicked button. This attribute hold title of the item to be remove from cart
        removeItem(title);
        //call remove function & pass the retrived title
    });
});
    function removeItem(title) {
        var xhr = new XMLHttpRequest();
        //create new instance of the XMLHTTP.... object
        xhr.open('GET', 'addToCart.php?action=remove&title=' + encodeURIComponent(title), true);
        //xhr sent a GET request to addToCart.php for the action (set to 'remove') & title of the item to be removed
        //encodeURIComponent is used to encode special character in the title to ensure they are properly handled in URL
        xhr.onload = function() {
            //set up an event handler to execute when xhr 'LOAD' event is triggered, indicate that request has completed
            if (xhr.status >= 200 && xhr.status < 400) {
                //if HTTP status code falls within range of 200 to 399,  indicate successful request
                location.reload();
                //if request successful, reload current page, update state of cart after item be removed
            }
        };
        xhr.send();
        //making actual HTTP request to the server to remove the item from cart
    }
</script>

<div class="column3">
    <div class="total-container">
        <div class="total roboto-medium">
            Sub-total
        </div>
        <div class="amount roboto-medium">
            <?php
            $total = 0;
            //initialize total to 0
            if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price']*$item['quantity'];
                //calculate the total amount of item by multiply price of each item by its quantity 
                 
            }
            echo $total . "MYR" ;
            //echo total amount in Malaysian Ringgit
            $_SESSION['total'] = $total;
        }
            ?>
        </div>
        <button class="button" onclick="redirectToShippingPage()">Check-out</button>
        <!-- button trigger checkout process when clicked & call redirect toShippingPage function -->
    </div>
</div>
</div>


<script>
    function redirectToShippingPage() {
        window.location.href = "shippingPage.php";
        //redirect user to shippingPage
    }
    document.addEventListener('DOMContentLoaded', function() {
        //wait for DOM content fully loaded before executing, ensure javascript code run after html fully loaded
    const decrementBtns = document.querySelectorAll('.decrement-btn');
    //select all element with class decrement btn & store them in decrement btn variable
    
    decrementBtns.forEach(function(btn) {
        //iterate over each selected decrement button
        btn.addEventListener('click', function() {
            //add a click event listener to each decrement button
            const container = btn.closest('.row');
            //find the closest element with the class row relative to the clicked decrement button
            const quantityInput = container.querySelector('.quantity-input');
            //select quantity input element, use to get current quantity value
            let currentValue = parseInt(quantityInput.value);
            //pass value of quantity input as integer & store it in currentValue variable
            if (currentValue > 1) {
                //if current quantity value is greater than 1 before decrement it further, prevent quantity from become negative
                quantityInput.value = currentValue - 1;
                //update quantity input by substract 1 from current value
                var title = btn.getAttribute('data-title');
                //retrieve value of 'data-title' from clicked decrement button
                updateItem(title, -1);
                //call update item and value of -1 to indicate decrease in quantity
            }
        });
    });

    const incrementBtns = document.querySelectorAll('.increment-btn');
    //selects all elements with the class "increment-btn" and stores them in the incrementBtns variable.
    
    incrementBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const container = btn.closest('.row');
            const quantityInput = container.querySelector('.quantity-input');
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            var title = btn.getAttribute('data-title');
            updateItem(title, 1);
        });
    });

    function updateItem(title, value) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'addToCart.php?action=update&title=' + encodeURIComponent(title) + '&quantity=' + value, true);
        //sent get request to addtocart.php with query parameters for action update, title of item to be updated, change in quantity
        //the encodeURIComponent function is used to encode special characters in the title to ensure they are properly handled in the URL.
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                location.reload();
            }
        };
        xhr.send();
    }

    
});

    </script>
</body>

<?php include("footer.php");?>

</html>