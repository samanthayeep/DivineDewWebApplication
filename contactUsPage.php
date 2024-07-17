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
<?php
    $nameErr = $phoneErr = $emailErr = $messageErr = "";
    $name = $phone = $email = $message = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
        if (empty($_POST['name'])) {
            $nameErr = "*Name is required";
        } else {
            $name = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "*Only letters and white space allowed";
            }
        }

        if (empty($_POST['phone'])) {
            $phoneErr = "*Phone number is required";
        } else {
            $phone = test_input($_POST['phone']);
            if (!preg_match("/^[0-9]{10}$/",$phone)) {
            $phoneErr = "*Invalid phone number";
            }
        }
        
        if (empty($_POST['email'])) {
            $emailErr = "*Email is required";
        } else {
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid email format";
            }
        }
        
        if (empty($_POST['message'])) {
            $messageErr = "*Message is required";
        } else {
            $message = test_input($_POST['message']);
        }
        
        if (empty($nameErr) && empty($phoneErr) && empty($emailErr) && empty($messageErr)) {
            $to = "youremail@example.com";
            $subject = "New contact form submission";
            $message = "Name: " . $name . "\nPhone: " . $phone . "\nEmail: " . $email . "\nMessage: " . $message;
            $headers = "From: " . $email;
            mail($to,$subject,$message,$headers);

            echo '<script>alert("Form submitted successfully"); window.location.href = "index.php";</script>';
            exit();
        }
    }

    // Function to sanitize input data
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

?>
<div class="contactus">
    <div class="details">
        <div class="title roboto-regular" style="margin-top:80px">
            Contact Us
        </div>
        <div class="description roboto-light" style="margin-bottom:10px">
            Feel free to contact us and we will get back to you as soon as we can.
        </div>

        <span class="error"><?php echo $nameErr;?></span>
        <span class="error"><?php echo $phoneErr;?></span>
        <span class="error"><?php echo $emailErr;?></span>
        <span class="error"><?php echo $messageErr;?></span>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>">
            <br>
            <input type="text" name="phone" placeholder="Phone No." value="<?php echo htmlspecialchars($phone); ?>">
            <br>
            <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
            <br>
            <textarea name="message" placeholder="Message" style="width: 445px; height: 90px"><?php echo htmlspecialchars($message); ?></textarea>
            <br>
            <br>
            <input type="submit" name="submit" value="Send" style="width: 250px">
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