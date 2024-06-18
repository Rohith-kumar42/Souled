<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the OTP entered by the user
    $user_entered_otp = $_POST['otp'];

    // Retrieve the last OTP stored in the database
    // You need to implement your database connection logic here
    $last_otp_from_database = ''; // Retrieve the last OTP from your database

    // Check if the entered OTP matches the last OTP from the database
    if ($user_entered_otp == $last_otp_from_database) {
        echo "OTP matched. Access granted.";
    } else {
        echo "OTP does not match. Access denied.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body>
    <h2>Enter OTP</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
