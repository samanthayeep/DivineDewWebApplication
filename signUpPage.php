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
    include 'db_config.php';
    include_once("navigation.php");
  ?>
  <?php
    $nameErr = $emailErr = $phoneErr = $passwordErr = "";
    $firstName = $LastName = $email = $phone = $password = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty(trim($_POST["FirstName"])) || empty(trim($_POST["LastName"]))){
        $nameErr = "  Name is required.";
      }
      else{
        $firstName = test_input($_POST["FirstName"]);
        $lastName = test_input($_POST["LastName"]);
      }

      if (empty(trim($_POST["Phone"]))){
        $phoneErr = "  Contact number is required.";
      }
      else{
        $phone = test_input($_POST["Phone"]);
      }

      if (empty(trim($_POST["Email"]))){
        $emailErr = "Email is required.";
    }
    else {
        $email = test_input($_POST["Email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = ""; 
        }
    } 
    
    if (empty(trim($_POST["Password"]))){
        $passwordErr = "Password is required.";
    }
    else {
        $password = test_input($_POST["Password"]);
    }


      if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr)){

      $conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
      if($conn-> connect_error){
        die("Connection failed:" .$conn -> connect_error);}

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = "INSERT INTO profile(first_name, last_name, email, phone, password) VALUES ('$firstName', '$lastName', '$email'
      , '$phone', '$hashedPassword' )";

      if($conn -> query($sql) === FALSE){
        echo "Error:" . $sql . "<br>" .$conn ->error;
      }
      $conn -> close();
        echo "<div id='myDialogBox' class='dialogBox'>";
        echo "<div class='dialogBoxContent'>";
        echo "<img src='images/logo.png'>";
        echo "<p class='title roboto-regular' >Thanks for signing up.</p>";
        echo "<p class='text roboto-light' >Your account is successfully created.
        You can now enjoy the benefits of being a registered member.</p>";
        echo "<a class='button roboto-regular' href='index.php'>Continue</a>";
        echo "</div>";
        echo "</div>";
        echo "<script>document.getElementById('myDialogBox').style.display = 'block';</script>";
    }
  }

    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>


  <div class ="signUpScreen" style="height: 1020px;">
    <div class ="details">
        <div class ="title roboto-regular" style="margin-top:80px">
            Sign Up to DivineDew.
        </div>
        <div class ="description roboto-light" style="margin-bottom:10px">
            Already have an account? 
            <a class ="signUpLink roboto-light" href="loginPage.php" >Login</a>
        </div>

        <form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name = "FirstName" style="width:200px; margin:10px 5px; margin-left:10px" placeholder ="First Name"
            value ="<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>">
            
            <input type="text" name = "LastName" style="width:200px; margin:20px 5px" placeholder ="Last Name"
            value = "<?php if(isset($_POST['FirstName'])) $_POST['LastName']; ?>">
            
            <div class="error"><?php if(!empty($nameErr)) echo "*".$nameErr; ?></div>
            <br>
            
            <input type="text" name ="Phone" placeholder ="Mobile phone"
            value ="<?php if(isset($_POST['Phone'])) echo $_POST['Phone']; ?>">
            
            <div class="error"><?php if(!empty($phoneErr)) echo "*".$phoneErr; ?></div>
            <br>
            
            <input type="text" name ="Email" placeholder ="Email" 
            value ="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>">
            
            <div class="error"><?php if(!empty($emailErr)) echo "*".$emailErr; ?></div>
            <br>
            
            <input type="password" name = "Password" placeholder ="Password" 
            value="<?php if(isset($_POST['Password'])) echo $_POST['Password']; ?>">
            
            <div class="error"><?php if(!empty($passwordErr)) echo "*".$passwordErr; ?></div>
            <br>
            
            <input type="checkbox" name = "newsletter" style="margin:10px"id="rememberpassword" 
            <?php if(isset($_POST['newsletter'])) echo "checked" ?>>
            
            <label for="rememberpassword" class="roboto-light">
              Add me to newsletter for a 10% descount
            </label>
            <br>
            
            <input type="checkbox" name ="saveInfo" style="margin:10px" id="rememberpassword"
            <?php if(isset($_POST['saveInfo'])) echo "checked" ?>>
            
            <label for="rememberpassword" class="roboto-light">
              Save the information for a future fast checkout
            </label>
            <br>
            <input type="submit" value="Sign Up">
        </form>
      
    </div>
    <div class="image">
        <img class="detailsImage" src="Images/loginImage.webp">
   </div>
  </div>
  <script>
  var dialogBox = document.getElementById("myDialogBox");
  var closeBtn = document.getElementsByClassName("close")[0];
  closeBtn.onclick = function(){
    dialogBox.style.display = "none";
  }
  </script>
</body>
  <?php
    include("footer.php");
  ?>
</html>
