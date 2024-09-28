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
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is found (username and password match)
    if ($result->num_rows > 0) {
        // Redirect the user to respective home pages based on username
        switch ($username) {
            case 'rohithkumarcbaalraj@gmail.com':
            case 'rohithkumarcbaalraj':
                header("Location: pages/homerk.html");
                exit();
            case 'dsiddarth05@gmail.com':
            case 'dsiddarth05':
                header("Location: pages/homesidd.html");
                exit();
            case 'Sudhikumaran2005@gmail.com':
            case 'Sudhikumaran2005':
                header("Location: pages/homesudhi.html");
                exit();
            case 'ukimanimaran@gmail.com':
            case 'ukimanimaran':
                header("Location: pages/homeuki.html");
                exit();
            default:
                // Redirect to default home page
                header("Location: pages/home.html");
                exit();
        }
    } else {
        // Handle invalid login (e.g., display an error message)
        echo "<script>alert('Invalid username or password');</script>";
    }
}
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

// Prepare SQL statement to fetch the last entered username
$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Check if there are any rows in the result
if ($result->num_rows > 0) {
    // Output data of the last entered username
    $row = $result->fetch_assoc();
    $lastUsername = $row["username"];
} else {
    // If no username found, set a default value
    $lastUsername = "No username found";
}

// Close the connection
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
        <script src="./assests/login.js"></script>


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
            <input  type="text"name="username" placeholder="Enter Username" id="uname">
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
            <div id="errorMessage" style="color:white; margin-top: 10px;font: size 35px;"></div>

        </div>


        </form>
    </body>
    
    <script>
    function errormessage() {
    let username = document.getElementById("uname").value;
    let password = document.getElementById("psw").value;
    let usernameError = document.getElementById("error1");
    let passwordError = document.getElementById("error");
  
    // Reset previous error messages
    usernameError.textContent = "";
    passwordError.textContent = "";
  
    // Check for empty username
    if (username == "" || username.length < 5) {
        usernameError.textContent = "Please enter a valid username (at least 5 characters).\n";
        usernameError.style.color = "#1999ff";
        usernameError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }
    if (/^\d+$/.test(username)) {
        usernameError.textContent = "Username cannot contain only numbers.\n";
        usernameError.style.color = "#1999ff";
        usernameError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }
    if (username.startsWith(" ")) {
        usernameError.textContent = "Username cannot start with a space.\n";
        usernameError.style.color = "#1999ff";
        usernameError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }
  
    // Check for empty password
    if (password == "") {
        passwordError.textContent = "Please enter a password.\n";
        passwordError.style.color = "#1999ff";
        passwordError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }
  
    // Redirect based on username
    switch (username) {
        case 'rohithkumarcbaalraj@gmail.com':
        case 'rohithkumarcbaalraj':
            window.location.href = "pages/homerk.html";
            return false; // Prevent form submission
        case 'dsiddarth05@gmail.com':
        case 'dsiddarth05':
            window.location.href = "pages/homesidd.html";
            return false; // Prevent form submission
        case 'Sudhikumaran2005@gmail.com':
        case 'Sudhikumaran2005':
            window.location.href = "pages/homesudhi.html";
            return false; // Prevent form submission
        case 'ukimanimaran@gmail.com':
        case 'ukimanimaran':
            window.location.href = "pages/homeuki.html";
            return false; // Prevent form submission
        default:
            return true; // Allow form submission
            var errorMessage = "<?php echo $errorMsg; ?>";
        if (errorMessage !== '') {
            alert(errorMessage);
            return false; // Prevent form submission
        }
        return true; 
    }
     // Allow form submission
}  
    </script>
</html>
