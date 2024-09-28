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

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect the user to a success page or perform any other action
        header("Location: Pages/stats.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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


          </nav>
          
    </head>

    <body id="transparentBG" style="background-color: #1b2838; overflow-x: hidden;" class="fade-in">

      <img style="position: absolute;background-position:cover;width:105%;height:900px" src="assets\background.jpg">


        <form name="myForm" id="loginForm" onsubmit="return errormessage()" method="post" class="container smallFont fade-in" style="margin-top:250px">
          
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
            return false; 
        case 'Sudhikumaran2005@gmail.com':
        case 'Sudhikumaran2005':
            window.location.href = "pages/homesudhi.html";
            return false; 
        case 'ukimanimaran@gmail.com':
        case 'ukimanimaran':
            window.location.href = "pages/homeuki.html";
            return false; 
        default:
            return true; 
            var errorMessage = "<?php echo $errorMsg; ?>";
        if (errorMessage !== '') {
            alert(errorMessage);
            return false; 
        }
        return true; 
    }
    
}  
    </script>
</html>
