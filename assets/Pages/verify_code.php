<?php
// Replace 'your_email@example.com' with the actual email address
$expectedEmail = 'your_email@example.com';
$expectedCode = '123456'; // Change this to the expected verification code

// Retrieve form data
$email = $_POST['email'];
$code = $_POST['code'];

// Check if the email and code match the expected values
if ($email === $expectedEmail && $code === $expectedCode) {
    // Redirect to another page if the code is correct
    header('Location: home.html');
    exit();
} else {
    // Display an error message if the code is incorrect
    echo "Incorrect verification code.";
}
?>
