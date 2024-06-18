<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "otp"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted and not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['code'])) {
    // Retrieve form data and sanitize
    $otp = $conn->real_escape_string($_POST['code']);

    // Prepare SQL statement to fetch the last entered OTP value from the otp table
    $sql = "SELECT otp FROM otp ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result) {
        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Fetch the last entered OTP value
            $row = $result->fetch_assoc();
            $lastEnteredOTP = $row["otp"];

            // Check if the entered OTP matches the last entered OTP value
            if ($otp === $lastEnteredOTP) {
                // Redirect to another page if the OTP is correct
                header('Location: https://transfer.us.c2.synology.com/transfer/6dCnTqijvNdBwMS3/p23ZuzOGAQSMKxPR/v2#WNDYhAe5I9qkdQoKdNVGV5oPCZfu6FaawTln05ywYCQ');
                exit();
            } else {
                // Display an error message if the OTP is incorrect
                echo "Incorrect verification code.";
            }
        } else {
            // Display an error message if no OTP is found in the database
            echo "No OTP found.";
        }
    } else {
        // Display an error message if there is an issue with the query
        echo "Error: " . $conn->error;
    }
} else {
    // Display an error message if form data is not submitted
    echo "Form submission error.";
}

// Close the database connection
$conn->close();
?>
