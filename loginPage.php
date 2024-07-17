<?php session_start();

if(isset($_COOKIE['user_name'])) {
    header("Location: profilePage.php");
    exit;
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
    include_once('db_config.php');
    $loginSuccess = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $email = $_POST["Email"];
      $password = $_POST["Password"];
  
      $sql = "SELECT * FROM profile WHERE email = '$email'";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          if (password_verify($password, $row["password"])) {
              $loginSuccess = true;
              $firstName = $row["first_name"];
              $lastName = $row["last_name"];
              setcookie("user_name", $firstName . ' ' . $lastName, time() + (86400 * 30), "/"); 
          } else {
              $passwordErr = "Invalid password";
          }
      } else {
          $emailErr = "User not found";
      }
      $conn->close();
  }

  if ($loginSuccess) {
    setcookie("user_name", $firstName . ' ' . $lastName, time() + (86400 * 30), "/"); 
    $_SESSION['name'] = $firstName . ' ' . $lastName;
    // if(isset($_COOKIE["user_name"])) {
    //     echo "<h1>Cookie has the value: " . $_COOKIE["user_name"] . '</h1>';
    // } else {
    //     echo "<h1>Cookie is not set!" . '</h1>';
    // }
    header("Location: profilePage.php");
    exit;
  }

  include('navigation.php');
  ?>
    
    <div class ="logInScreen">
        <div class ="details">
            <div class ="title" style="margin-top:80px">
                Log In to DivineDew.
            </div>
            <div class ="description roboto-light">
                Don't have an account? 
                <a class ="signUpLink roboto-light" href="signUpPage.php" >Sign Up</a>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" placeholder ="Email" name="Email" style="margin-left: 12px;"
                value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>">
                <div class="error"><?php if(!empty($emailErr)) echo "*".$emailErr; ?></div>
                <br>
                <input type="password" placeholder ="Password" name ="Password">
                <div class="error"><?php if(!empty($passwordErr)) echo "*".$passwordErr; ?></div>
                <br>
                <a class ="forgotPassword roboto-regular" href="#"> Forgot your password?</a>
                <br>
                <input type="checkbox" id="rememberpassword">
                <label for="rememberpassword" class="roboto-light">Remember my password for future logins.</label>
                <br>
                <input type="submit" value="Log In">
            </form>
            
        </div>
        <div class="image">
            <img class="detailsImage" src="Images/loginImage.webp">
        </div>
    </div>
    </body>
    <?php
      include("footer.php");
    ?>
</html>
