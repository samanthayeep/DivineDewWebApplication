<?php session_start() ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css files/profileStyle.css" />
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

    <div class="profileScreen">
        <div class="title poppins-medium">
            Welcome, 
            <?php 
            if(isset($_COOKIE['user_name'])) {
                $userName = $_COOKIE['user_name'];
                echo $userName;
            } else {
                echo "new DivineDew user";
            }
            ?>
        </div>
        <div class="details">
            <div class="options">
                <div class="rectangle poppins-light">
                    Orders <span class="right-arrow">&gt;</span>
                </div>
                <div class="rectangle1 poppins-light" >
                    Account settings <span class="right-arrow">&gt;</span>
                </div>
                <div class="rectangle poppins-light">
                    Points <span class="right-arrow">&gt;</span>
                </div>
                <div class="rectangle1 poppins-light" >
                    DivineDew membership <span class="right-arrow">&gt;</span>
                </div>
                <div class="rectangle poppins-light">
                    Refund policy <span class="right-arrow">&gt;</span>
                </div>
                <div class="rectangle1 poppins-light" >
                    Help us improve <span class="right-arrow">&gt;</span>
                </div>
                <div class="rectangle poppins-light" id="signOutButton">
                    Sign out <span class="right-arrow">&gt;</span>
                </div>
            </div>
            <div class ="moreOptions">
                <div class ="title poppins-regular">
                    My offers
                </div>
                <div class="offer">
                    <div class ="offerDetails">
                        <img src="images/offerPic1.webp">
                        <div class="desc poppins-light">Member prices on selected styles.</div>
                    </div>
                    <div class ="offerDetails">
                        <img src="images/offerPic3.png">
                        <div class="desc poppins-light">Collect points to get vouchers.</div>
                    </div>
                    <div class ="offerDetails">
                        <img src="images/offerPic2.webp">
                        <div class="desc poppins-light">Free returns valid for 30 days.</div>
                    </div>
                </div>
                <div class ="title poppins-regular">
                    All purchases
                </div>
                <div class="purchase">
                    <div class="purchaseRecord poppins-light">
                        <?php
                        if(isset($_SESSION['payment'])){
                            echo $_SESSION['payment_time'];
                            echo "<br>";
                            echo "RM" .$_SESSION['total'];
                        }
                        else{
                            echo "No purchases made yet.";
                        }
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </div> 

</body>
<script>
    document.getElementById("signOutButton").addEventListener("click", function() {
        signOut();
        
    });

    function signOut() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "logout.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location.href = "loginPage.php";
            }
        };
        xhr.send();
    }
</script>

<?php
    include("footer.php");
  ?>
</html>