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