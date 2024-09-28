<?php
// Replace 'your_email@example.com' with the actual email address
$expectedEmail = 'rohithkumarcbaalraj@gmail.com';
$expectedCode = '123456'; // Change this to the expected verification code

// Check if form data is submitted and not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['code'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $code = $_POST['code'];

    // Check if the email and code match the expected values
    if ($email === $expectedEmail && $code === $expectedCode) {
        // Redirect to another page if the code is correct
        header('Location: https://transfer.us.c2.synology.com/transfer/6dCnTqijvNdBwMS3/p23ZuzOGAQSMKxPR/v2#WNDYhAe5I9qkdQoKdNVGV5oPCZfu6FaawTln05ywYCQ');
        exit();
    } else {
        // Display an error message if the code is incorrect
        echo "Incorrect verification code.";
    }
} else {
    // Display an error message if form data is not submitted
    echo "Form submission error.";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/checkout-stylesheet.css">
        <link rel="icon" type="image/png" href="./assets/Images/souled.png" style="width: 150%;"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/checkout-js.js"></script>

        <nav class="d-flex navbar navbar-expand-md darkNav navbar-dark">
            
        <div class="mx-auto bg">
            <a href="home.html"><img
                class="logoBig" src="./assets/Images/souled (1).png"></a>            
        </div>


          </nav>
    </head>

    <body id="transparentBG" style="background-color: #1b2838;">
      
        <img style="position: absolute; width: 800px; height:700px;visibility: hidden;" src="././ImageData/games.jpg">
  
        
        <form id="checkoutForm" action="verification1.php"  style="width: 40%; margin-top: 5%;" class="container fade-in">
          <div class="container" style="text-align: center;">
            <img src="./assets/Images/souled (1).png">
          </div>
        
          <div class="container smallFont">
            <label ><b>Recipient Email</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="Enter Recipient Email" name="email" required>
        
            <label><b>Confirm Your Password</b></label>
            <input style="background-color:#e8f0fe;" type="password" placeholder="Enter Password" name="code" required>
            <br><label ><b>Credit Card info</b></label>
            <br> 
            <label ><b>Name on card</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="Enter Card holder name" required>

            <label ><b>Card Number</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="1234-4567-8910-1234" required>

            <label ><b>Security number CCV:</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="CCV/CVV" required>

            <label ><b>Discount Code:</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="CCV/CVV">

            <label for="code">Verification Code:</label>
        <input type="text" id="code" name="code" required><br><br>
        
            <h2 style="color: whitesmoke;">Product: EAFC24</h2>
            <p style="color: whitesmoke;">Total: ₹2000 RUP</p>
            
            <button type="submit" class="smallFont" style="display: block;width: 25%; margin-left: 37%; margin-top:2%;height: 50px ;background-image: linear-gradient(to right, #3786c6 , #223e87);;">
             <a href="https://transfer.us.c2.synology.com/transfer/6dCnTqijvNdBwMS3/p23ZuzOGAQSMKxPR/v2#WNDYhAe5I9qkdQoKdNVGV5oPCZfu6FaawTln05ywYCQ"> <span style="color: whitesmoke; font-weight: 600;">Checkout</span></a></button>
              <button style="width: 25%; margin-left: 37%; margin-top:2%;height: 50px; background-image: linear-gradient(to right, #df1b1b, #ba3030);" 
            type="button" class="cancelbtn smallFont" onclick=clearInput()><span style="color: whitesmoke; font-weight: 600;">Clear</span></button></button>
            <label>
                <br>
              <input type="checkbox" checked="checked" name="remember"> Remember info for next purchase
            </label>
          </div>
        
          <div class="container">
            
          </div>
        </form>

    </body>
</html>