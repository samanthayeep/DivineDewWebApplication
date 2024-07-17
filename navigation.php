<div class="navigationMenu" >
    <div class="logo">
        <a href="index.php"> 
            <img src="images/logo.png">
        </a>
    </div>
    <div class ="box"></div>
    <div class="itemLink roboto-regular" id="explore" style="padding-top: 5px;">
        Discovery 
        <span class="arrow">&#8964;</span> 
        <script>
            document.getElementsByClassName("explore")[0].addEventListener("click", showMenu);
            function showMenu(){
                var menu = document.getElementsByClassName("dropdownMenu")[0];
                menu.style.display = menu.style.display === "block" ? "none" : "block";
                event.stopPropagation();
            }
            document.addEventListener("click", function(event) {
            var button = document.getElementsByClassName("explore")[0];
                var menu = document.getElementsByClassName("dropdownMenu")[0];
            if (event.target !== button && event.target !== menu) {
            menu.style.display = "none";
            }
            });
        </script>
        <div class="dropdownMenu">
            <div class ="dropdownContent">
                <a href="listingPage.php" class ="heading poppins-medium">New Arrivals</a>
                <a href="#" class ="text poppins-light">Myrrh & Tonka</a>
                <a href="#" class ="text poppins-light">Red Hibiscus</a>
                <a href="#" class ="text poppins-light">Cypress & Grapevine</a>
                <a href="#" class ="text poppins-light">Dark Amber & Ginger Lily</a>
            </div>
            <div class ="dropdownContent">
                <a href="listingPage.php" class ="heading poppins-medium">By Scents</a>
                <a href="#" class ="text poppins-light">English Pear & Freesia</a>
                <a href="#" class ="text poppins-light">Blackberry & Bay</a>
                <a href="#" class ="text poppins-light">Basil & Neroli</a>
                <a href="#" class ="text poppins-light">Poppy & Barley</a>
            </div>
            <div class ="dropdownContent">
                <a href="listingPage.php" class ="heading poppins-medium">Occasions</a>
                <a href="#" class ="text poppins-light">Everyday Wear</a>
                <a href="#" class ="text poppins-light">Formal events</a>
                <a href="#" class ="text poppins-light">Date Nights</a>
                <a href="#" class ="text poppins-light">Valentines</a>
            </div>
            <div class ="dropdownContent">
                <a href="listingPage.php" class ="heading poppins-medium">Online Exclusive</a>
                <a href="#" class ="text poppins-light">Explore our Limited-Edition Collection</a>
                <a href="#" class ="heading poppins-medium" style="padding-top:30px">Store</a>
                <a href="#" class ="text poppins-light">Locate our stores</a>
            </div>
        </div>
    </div>
    <div class ="itemLink roboto-regular">
        <a href="aboutUsPage.php"> About </a>
    </div>
    <div class ="itemLink roboto-regular">
        <a href="contactUsPage.php"> Contact Us </a>
    </div>
    <div class="box">

    </div>
    <div class="icons">
        <a href="cartPage.php">
            <img src="images/cartIcon.svg" alt="Cart Icon">
        </a>
        
        <a href="loginPage.php">
            <img src="images/personIcon.svg" alt="Profile Icon">
        </a>
    </div>
</div>