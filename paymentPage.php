<html>
    <head>
        <title>DivineDew</title>
		<link rel="stylesheet" href="css files/mystyle.css">
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
        session_start();
        include("navigation.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['payment'] = true;
            $_SESSION['payment_time'] = date("Y-m-d H:i:s");
        } 

        $cardNumberErr = $cardNameErr = $expirationErr = $cvvErr = "";
        $cardNumber = $cardName = $expiration = $cvv = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['cardNumber'])) {
                $cardNumberErr = "*Card number is required";
            } else {
                $cardNumber = test_input($_POST['cardNumber']);
                if (!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?)$/",$cardNumber) && !preg_match("/^(?:5[1-5][0-9]{14})$/",$cardNumber)) {
                    $cardNumberErr = "*Invalid card number";
                } 
            }

            if (empty($_POST['cardName'])) {
                $cardNameErr = "*Holder name is required";
            } else {
                $cardName = test_input($_POST['cardName']);
                if (!preg_match("/^[a-zA-Z ]*$/",$cardName)) {
                  $cardNameErr = "*Only letters and white space allowed in holder name";
                }
            }

            if (empty($_POST['expiration'])) {
                $expirationErr = "*Expiration is required";
            } else {
                $expiration = test_input($_POST['expiration']);
                if (!preg_match("/^(0[1-9]|1[0-2])\/\d{2}$/", $expiration)) {
                    $expirationErr = "*Invalid expiration format. Please enter MM/YY format.";
                } else {
                    list($enteredMonth, $enteredYear) = explode('/', $expiration);
                    $enteredYear = intval($enteredYear);
                    $enteredMonth = intval($enteredMonth);

                    $currentYear = intval(date('y'));
                    $currentMonth = intval(date('m'));
            
                    if ($enteredYear < $currentYear || ($enteredYear == $currentYear && $enteredMonth < $currentMonth)) {
                        $expirationErr = "*Invalid expiration date.";
                    }
                }
            }

            if (empty($_POST['cvv'])) {
                $cvvErr = "*CVV is required";
            } else {
                $cvv = test_input($_POST['cvv']);
                if (!preg_match("/^[0-9]+$/",$cvv)) {
                  $cvvErr = "*Invalid CVV number";
                }
            }

            if (!isset($_POST['addressoption'])) {
                $addressoptionErr = "*Select an address option";
            } else {
                $addressoption = test_input($_POST['addressoption']);
            }

            if (empty($cardNumberErr) && empty($cardNameErr) && empty($expirationErr) && empty($cvvErr)) {
                echo '<script>alert("Form submitted successfully"); window.location.href = "completePage.php";</script>';
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        ?>

		<div class="shippingScreen">
			<div class="leftSide">
                <table>
                    <tr>
                        <td>
                            <div class="directionword directioncolor">Cart</div></td>
                        <td>
                            <div class="directionsymbol directioncolor"> ></div></td>
                        <td>
                            <div class="directionword directioncolor"> Details </div></td>
                        <td>
                            <div class="directionsymbol directioncolor"> ></div></td>
                        <td> 
                            <div class="directionword directioncolor"> Shipping </div>
                        </td>
                        <td> 
                            <div class="directionsymbol directioncolor"> ></div></td>
                        <td> 
                            <div class="directionword"> Payment </div>
                        </td>
                    </tr>
                </table>
                <span class="error"><?php echo $cardNumberErr; ?></span>
                <span class="error"><?php echo $cardNameErr; ?></span>
                <span class="error"><?php echo $expirationErr; ?></span>
                <span class="error"><?php echo $cvvErr; ?></span>
                <div class="method">
                    <h3>
                        Payment method
                    </h3>
                </div>
                <table style="width: 460px; height: 256px; border-radius: 7px; border: 1px solid #E5E5E5;">
                    <tr>
                        <th class="logo-text">
                            <div class="cardlogo">
                                <img src="images/creditcardlogo.jpg" width="38" height="25">
                            </div>
                            <div class="creditcard">Credit Card</div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="cardDetailsForm" onsubmit="return validateForm()">
                                <input type="text" name="cardNumber" style="width: 408px; height:40px; margin: 5px;" placeholder="Card Number" value="<?php echo htmlspecialchars($cardNumber); ?>">
                                <input type="text" name="cardName" style="width: 408px; height:40px; margin: 5px;" placeholder="Holder Name" value="<?php echo htmlspecialchars($cardName); ?>">
                                <input type="text" name="expiration" style="width: 197px; height:40px; margin: 5px;" placeholder="Expiration (MM/YY)" value="<?php echo htmlspecialchars($expiration); ?>">
                                <input type="text" name="cvv" style="width: 197px; height:40px;  margin: 5px;" placeholder="CVV" value="<?php echo htmlspecialchars($cvv); ?>">
                            </form>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <h3>
                    Billing address
                </h3>
                <form action="completePage.php" class="billingaddress" id="billingaddressForm">
                    <label class="con">
                        <input type="radio" name="addressoption" value="same">Same as the shipping address
                        <span class="checkmark"></span>
                    </label>  
                    <hr>      
                    <label class="con">
                        <input type="radio" name="addressoption" value="different">Use a different address for billing
                        <span class="checkmark"></span>
                    </label>
                    <br>
                    <br>
                    <br>
                    <div class="pay">
                        <div class="backtoshipping">
                            <a href="shippingPage.php" target="_blank">Back to shipping</a>
                        </div>
                        <button class="paynow" form="cardDetailsForm" onclick="return validateForm();"> Pay now</button>
                    </div>
                </form>
            </div>



            <div class="rightSide">
				<div class="pic-text">
					<div class="image-container">
						<img src="images/product.webp" width="143" height="130">
					</div>
					<div class="product-details">
						<div class="DivineDewFragrance">DivineDew Fragrance</div>
						<div class="price"><?php echo $_SESSION['total'] ?>MYR</div>
					</div>
				</div>
				<div class="breakline" style="width=30vw; margin-top: 65px; margin-left: 2px;"></div>
				<br>
				<br>
				<form action="#"> 
					<div class="addcode">
						<input type="text" style="width: 272px; margin:0px 0px; margin-left:-20px; margin-bottom:4px" placeholder="Coupon code">
						<input type="submit" value="Add Code" style="margin: 0px 0px; margin-bottom: 4px; padding: 8px 10px;">
					</div>
				</form>
				<div class="breakline" style="width=410px; margin-top: 30px; margin-left: 2px;"></div>
				<br>
					<table>
						<tr>
							<td>
								<div class="textFont">Subtotal</div>
							</td>
							<td>
								<div class="text"><?php echo $_SESSION['total'] ?>MYR</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="textFont">Shipping</div>
							</td>
							<td>
								<div class="text">Free Shipping</div>
							</td>
						</tr>
					</table>
					<br>
					<div class="breakline" style="width=350px; margin-top: 0px; margin-left: 2px;"></div>
					<br>
					<table>
						<tr>
							<td>
								<div class="textFont">Total</div>
							</td>
							<td>
								<div class="text priceBig"><?php echo $_SESSION['total'] ?>MYR</div>
							</td>
						</tr>
					</table>
				

				</div>

			</div>
            <script>
                function validateForm() {
                    var addressOptionChecked = document.querySelector('input[name="addressoption"]:checked');
                    if (!addressOptionChecked) {
                        alert('Please select a billing address option');
                        return false; 
                    }
                    return true; 
                }
            </script>

</body>
<?php include("footer.php");?>
</html>