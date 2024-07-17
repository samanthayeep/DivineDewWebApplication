<?php
session_start();
?>
<html>
    <head>
        <title>DivineDew</title>
		<link rel="stylesheet" href="css files/mystyle.css">
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

		$firstnameErr = $lastnameErr = $addressErr = $cityErr = $postalcodeErr = $provinceErr = $countryErr = "";
		$firstname = $lastname = $address = $city = $postalcode = $province = $country = "";

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (empty($_POST['firstname'])) {
				$firstnameErr = "*First Name is required";
			} else {
				$firstname = test_input($_POST['firstname']);
			
				if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
					$firstnameErr = "*Only letters and white space allowed in first name";
				}
			}
			
			if (empty($_POST['lastname'])) {
				$lastnameErr = "*Last Name is required";
			} else {
				$lastname = test_input($_POST['lastname']);
			
				if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
					$lastnameErr = "*Only letters and white space allowed in last name";
				}
			}

			if (empty($_POST['address'])) {
				$addressErr = "*Address is required";
			} else {
				$address = test_input($_POST['address']);
			}

			if (empty($_POST['city'])) {
				$cityErr = "*City is required";
			} else {
				$city = test_input($_POST['city']);
				if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
					$cityErr = "*Only letters and white space allowed in city";
				}
			}

			if (empty($_POST['postalcode'])) {
				$postalcodeErr = "*Postal code is required";
			} else {
				$postalcode = test_input($_POST['postalcode']);
				if (!preg_match("/^[0-9]+$/",$postalcode)) {
					$postalcodeErr = "*Postal code must contain only digits";
				} elseif (strlen($postalcode) !== 5) {
					$postalcodeErr = "*Postal code must be 5 digits long";
				}
			}
			

			if (empty($_POST['province'])) {
				$provinceErr = "*Province is required";
			} else {
				$province = test_input($_POST['province']);
				if (!preg_match("/^[a-zA-Z ]*$/",$province)) {
					$provinceErr = "*Only letters and white space allowed in province";
				}
			}

			if (empty($_POST['country'])) {
				$countryErr = "*Country is required";
			} else {
				$country = test_input($_POST['country']);
				if (!preg_match("/^[a-zA-Z ]*$/",$country)) {
					$countryErr = "*Only letters and white space allowed in country";
				}
			
			}

			if (empty($firstnameErr) && empty($lastnameErr) && empty($addressErr) && empty($cityErr) && empty($postalcodeErr) && empty($provinceErr) && empty($countryErr)) {
				echo '<script>alert("Form submitted successfully"); window.location.href = "paymentPage.php";</script>';
				exit();
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
						<div class="directionword"> Shipping </div>
					</td>
					<td> 
						<div class="directionsymbol"> ></div></td>
					<td> 
						<div class="directionword"> Payment </div>
					</td>
				</tr>
			</table>
			<span class="error"><?php echo $firstnameErr; ?></span>
			<span class="error"><?php echo $lastnameErr; ?></span>
			<br>
			<span class="error"><?php echo $addressErr; ?></span>
			<br>
			<span class="error"><?php echo $cityErr; ?></span>
			<span class="error"><?php echo $postalcodeErr; ?></span>
			<span class="error"><?php echo $provinceErr; ?></span>
			<br>
			<span class="error"><?php echo $countryErr; ?></span>
			<div class="ship">
				<h3>
					Shipping Method
				</h3>
				<div class="standardShipping">
					<div class="standardShipping-border">
						<form id="shippingMethodForm" >	
							<label class="con">
								<input type="radio" name="standardshipping" value="standard" checked>Standard Shipping
								<span class="checkmark"></span>
							</label> 
						</form>			
					</div>
				</div>
			</div>
			<br>
			<div class="shipAddress">
				<div class="shipAddress-text">
					<h3>
						Shipping Address
					</h3>
				</div>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="shippingAddressForm">
					<input type="text" name="firstname" style="width:200px; margin:0px 0px; margin-left:20px; margin-bottom: -7px; padding: 20px;" placeholder ="First Name" value="<?php echo htmlspecialchars($firstname); ?>">
					<input type="text" name="lastname" style="width:200px; margin:0px 230px; margin-top:-34px; margin-bottom: 10px; padding: 20px;" placeholder ="Last Name" value="<?php echo htmlspecialchars($lastname); ?>">
					<input type="text" name="address" style="width:410px; margin-top:0px; margin-bottom:10px; padding: 20px;" placeholder ="Address and number" value="<?php echo htmlspecialchars($address); ?>">
					<input type="text" name="shippingnote" style="width:410px; margin-top:0px; margin-bottom:10px; padding: 20px;" placeholder ="Shipping note (optional)">
					<div class="address-line">
						<input type="text" name="city" style="width:130px; margin:0px 5px; margin-left:20px; margin-bottom:10px; padding: 20px;" placeholder="City" value="<?php echo htmlspecialchars($city); ?>">
						<input type="text" name="postalcode" style="width:130px; margin:0px 5px; margin-left:5px; margin-bottom:10px; padding: 20px;" placeholder="Postal Code" value="<?php echo htmlspecialchars($postalcode); ?>">
						<div class="dropdown">
							<input type="text" name="province" style="width:130px; margin:0px 5px; margin-bottom:10px; padding: 20px;" placeholder="Province" id ="selectedProvince" value="<?php echo htmlspecialchars($province); ?>">
							<div class="dropdownArrow down"></div>
								<div class="dropdown-contentPro">		
								 	<a class="roboto-regular provinceLink" href="#">Johor</a>									
									<a class="roboto-regular provinceLink" href="#">Kedah</a>
									<a class="roboto-regular provinceLink" href="#">Kelantan</a>
									<a class="roboto-regular provinceLink" href="#">Malacca</a>
									<a class="roboto-regular provinceLink" href="#">Negeri Sembilan</a>
									<a class="roboto-regular provinceLink" href="#">Kuala Lumpur</a>
									<a class="roboto-regular provinceLink" href="#">Pahang</a>
									<a class="roboto-regular provinceLink" href="#">Penang</a>
									<a class="roboto-regular provinceLink" href="#">Perak</a>
									<a class="roboto-regular provinceLink" href="#">Perlis</a>
									<a class="roboto-regular provinceLink" href="#">Putrajaya</a>
									<a class="roboto-regular provinceLink" href="#">Sabah</a>
									<a class="roboto-regular provinceLink" href="#">Sarawak</a>
									<a class="roboto-regular provinceLink" href="#">Selangor</a>
									<a class="roboto-regular provinceLink" href="#">Terengganu</a>
								</div>
						    </div>
					</div>
					<div class="dropdown">
						<input type="text" name="country" style="width:410px; margin-top: 0px; margin-bottom:0px; padding: 20px; " placeholder="Country/Region" id="selectedCountry" value="<?php echo htmlspecialchars($country); ?>">
						<div class="dropdownArrow down" style="right:45px"></div>
							<div class="dropdown-content">
								<a class="roboto-regular countryLink" href="#">West Malaysia</a>
								<a class="roboto-regular countryLink" href="#">East Malaysia</a>
							</div>
						</div>
					</div>
					<div class="save">
						<input type="checkbox" style="margin:10px" id="rememberpassword">
						<label for="rememberpassword" class="roboto-light" style="width:50px">Save the information for a future fast checkout</label>
					</div>							
					<br>
					<input type="submit" name="submit" class="ProceedToPayment" value="Proceed to payment">
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
		document.addEventListener("DOMContentLoaded", function() {
		var provinceLinks = document.getElementsByClassName("provinceLink");
		var countryLinks = document.getElementsByClassName("countryLink");
		for (var i = 0; i < provinceLinks.length; i++) {
			provinceLinks[i].addEventListener("click", function() {
			var selectedProvince = this.innerText;
			document.getElementById("selectedProvince").value = selectedProvince;
			});
		}
		for (var i = 0; i < countryLinks.length; i++) {
			countryLinks[i].addEventListener("click", function() {
			var selectedCountry = this.innerText;
			document.getElementById("selectedCountry").value = selectedCountry;
			});
		}
		});
	</script>

</body>
<?php include("footer.php");?>
</html>