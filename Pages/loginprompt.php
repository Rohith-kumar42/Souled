
<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "games"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["name"];
    $password = $_POST["password"];

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect the user to a success page or perform any other action
        header("Location: log.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/login-stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="./assets/Images/souled.png" style="width: 150%;"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets\login.js"></script>


        <nav class="d-flex navbar navbar-expand-md darkNav navbar-dark">
            
        <div class="mx-auto bg">
            <img
                class="logoBig" src="assets/Images/souled (1).png" style="position: relative; left: 80px;width:160px"></a>            
        </div>

        <button type="button" class="d-none d-md-block btn btn-success" data-target="#">
            <img width="15px" height="15px" src="https://img.icons8.com/material-sharp/256/download--v1.png">Install GC</button>

          </nav>
          
    </head>

    <body id="transparentBG" style="background-color: #1b2838; overflow-x: hidden;" class="fade-in">

      <img style="position: absolute; ;" src="assets\Images\Background.jpg">
<!-- 
        <form name="myForm" id="loginForm" action="" onsubmit="return errormessage()" method="post" class="container smallFont fade-in">
          
          <div style="display: block;">
            <label for="uname"><b>Sign in with account name</b></label>
            <input  type="text" name="name" placeholder="Enter Username" id="name">
            <span id="error1"></span></div>
            <label for="psw"><b>Password</b></label>
           
            <input  type="password" name="password" placeholder="Enter Password" id="psw" >
            <span id="error"></span>
            <div style="text-align: center;">
              <button type="submit">
              <span style="color: whitesmoke;">Login</span></button>
              <br>
              <label class="smallFont"><a href="./Pages/Sign-up.html">Not Registered?</a></label>
                <br>
              <label class="smallFont"><a href="./Register/register.html">Forgot Password?</a></label>
            </div>


        </div>


        </form> -->

        <form name="myForm" id="loginForm" onsubmit="return errormessage()" method="post" class="container smallFont fade-in">
          
          <div style="display: block;">
            <label for="uname"><b>Sign in with account name</b></label>
            <input  type="text"name="name" placeholder="Enter Username" id="uname">
            <span id="error1"></span></div>
            <label for="psw"><b>Password</b></label>
           
            <input  type="password" name="password" placeholder="Enter Password" id="psw" >
            <span id="error"></span>
            <div style="text-align: center;">
              <button type="submit">
              <span style="color: whitesmoke;">Login</span></button>
              <br>
              <label class="smallFont"><a href="./Pages/Sign-up.html">Not Registered?</a></label>
                <br>
              <label class="smallFont"><a href="./Register/register.html">Forgot Password?</a></label>
            </div>


        </div>


        </form>
    </body>
    

</html>