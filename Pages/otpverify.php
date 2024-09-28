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
                    header('Location: bill.php');
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
    //     echo "Form submission error.";
    }

    // Close the database connection
    $conn->close();
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

        <nav class="d-flex navbar navbar-expand-md darkNav navbar-dark" style="background-color:black">
            
        <div class="mx-auto bg">
            <a href="home.html"><img class="logoBig" src="./assets/Images/souled (1).png" style="width: 150px;height:70px"></a>            
        </div>


          </nav>
          <style>
           body{
                background-color:black;
                color:white;
           }
         
            </style>
    </head>
   
<html>
<body style="background-color:blackcolor:white">
    <h1 style="text-align:center">OTP Verification</h1>
    <form method="post" id="checkoutForm"  style="width: 40%; margin-top: 0%;background-color:black" class="container fade-in">
          <div class="container" style="text-align: center;">
            <img src="./assets/Images/souled (1).png">
          </div>

          <div class="container smallFont">
          <label for="code">Verification Code:</label>
        <input type="text" id="code" name="code" required><br><br>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form>   
        

    </body>