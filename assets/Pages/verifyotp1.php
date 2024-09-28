<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "otp"; // Your MySQL database name

// Function to generate a random OTP
function generateOTP($length = 6) {
    $characters = '0123456789';
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $otp;
}

// Get the email address from the form
if(isset($_POST['email'])) {
    // Retrieve email from the form
    $recipientEmail = $_POST['email'];
    
    // Generate OTP
    $otp = generateOTP();
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert OTP into the table
    $sql = "INSERT INTO otp (otp) VALUES ('$otp')";

    if ($conn->query($sql) === TRUE) {
        // OTP inserted successfully
        $message = 'OTP has been sent to ' . $recipientEmail;
        
        // Email subject
        $subject = 'Your One-Time Password (OTP)';
        
        // Email message
        $message = 'Your OTP is: ' . $otp;

        // Send email (suppressing warning error using @)
        if (@mail($recipientEmail, $subject, $message)) {
            $message .= '<br>Email sent successfully.';
        } else {
           // $message .= '<br>Failed to send email. Please try again later.';
        }
    } else {
        $message = 'Failed to save OTP in database.';
    }

    // Close the database connection
    $conn->close();
} else {
    $message = 'Email address not provided.';
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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
    <h2 style="text-align:center;color:white;margin-top:display: flex;
        justify-content: center;
        align-items: center;
        height: 300px;
        margin: 300px;"><?php echo $message; ?></h2>
    <?php if (!empty($otp)) : ?>
       
    <?php endif; ?>
    <a href="checkout1.php" style="text-decoration:none;"><button type="submit" class="smallFont" style="display: block;width: 25%; margin-left: 37%;height: 50px ;background-image: linear-gradient(to right, #3786c6 , #223e87);margin-top:-500px">
                <span style="color: whitesmoke; font-weight: 600;">GO TO CHECKOUT</span>
            </button></a>
</body>
</html>
