<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jersey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform query
$sql = "SELECT * FROM checkout ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Check if query was successful
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $password = $row["password"];
            $cardHolderName = $row["card_holder_name"];
            $cardNumber = $row["card_number"];
            $shippingAddress = $row["shipping_address"];
        }
    } else {
        // No results found
        // echo "0 results";
    }
} else {
    // Query failed
    die("Query failed: " . $conn->error);
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/product-stylesheet.css">
        <link rel="icon" type="image/png" href="./assets/Images/souled.png" style="width: 150%;"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script><script src="product-js.js"></script>
         <script src="./assets/product-js.js"></script>
    
        <nav class="d-flex navbar navbar-expand-md darkNav navbar-dark">
            <!-- Toggler/collapsibe Button -->
            <span class="d-md-none d-block" style="cursor:pointer" onclick="openNav()"><img width="30px" height="30px" src="https://icon-library.com/images/hamburger-menu-icon-png-white/hamburger-menu-icon-png-white-10.jpg"></span>

            <div id="myNav" class="overlay">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img width="30px" height="30px" src="https://icon-library.com/images/hamburger-menu-icon-png-white/hamburger-menu-icon-png-white-10.jpg"></a>
              <div class="overlay-content">
                <ul class="navbar-nav pl-4 pt-1">
                  <li class="nav-item dropdown">
                      <a class="nav-link" href="./pages/home.html" data-toggle="dropdown">
                        Store
                      </a>
                      <div style="background-color:black" class="dropdown-menu">
                        <a class="menuItem" href="home.html">Home</a>
                        <a class="menuItem" href="./pages/discoveryqueue.html">Discovery Queue</a>
                        <a class="menuItem" href="./pages/stats.html">Jersey</a>
                      </div>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link" href="./Pages/support.html">Support</a>
                    </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="./pages/home.html">Account</a>
  
                    <div style="background-color:black" class="dropdown-menu">
                      <a class="menuItem" href="./pages/home.html">Login</a>
                      <a class="menuItem" href="./pages/home.html">Sign Up</a>
                    </div>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button> -->
        <div class="mx-auto bg">
            <a class="float-left" href="home.html"><img
                class="logoBig" src="./assets/Images/souled (1).png"></a>
            
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav pt-1">
                <li class="nav-item dropdown">
                    <a class="nav-link"  data-toggle="dropdown">
                      Store
                    </a>
                    <div style="background-color:black" class="dropdown-menu">
                      <a class="menuItem" href="./pages/home.html">Home</a>
                      <a class="menuItem" href="./pages/discoveryqueue.html">Discovery Queue</a>
                      <a class="menuItem" href="./pages/stats.html">Jersey</a>
                    </div>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pages/home.html">Support</a>
                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="./pages/home.html">Account</a>

                  <div style="background-color:black" class="dropdown-menu">
                    <a class="menuItem" href="./pages/home.html">Login</a>
                    <a class="menuItem" href="./pages/home.html">Sign Up</a>
                  </div>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>
              </ul>
            </div>
        </div>

  
          </nav>
    </head>
    <body id="transparentBG" style="background-color: #1b2838;overflow-x:hidden">

        <div class="container" style="color:white;margin-top:0px;margin-left:500px">
        <video autoplay muted loop id="myVideo" class="img-fluid" style="z-index: -1;height: 500px;width:1000px;margin-left:-200px">
                <source src="./assets/Videos/billanimation.mp4" type="video/mp4">
              </video>
            <h2 style="margin-left:100px">Your Product will be Shipped To:</h2>
            <p style="text-align:center;margin-left:-500px"><?php echo $shippingAddress; ?></p>
            <button href="bill1.php" class="btn btn-primary btn-active" id="btn1" style="padding: 7px;">Cash on Delivery</button>
            <button style="margin-left:350px"  class="btn btn-primary btn-active" id="btn2">Pay with Card/UPI</button>
        </div>
    </body>
    <script>
      let btn1 = document.getElementById("btn1");
      btn1.addEventListener("click", () => {
        window.location.href = "bill1.php";
      });
      let btn2 = document.getElementById("btn2");
      btn2.addEventListener("click", () => {
        window.location.href = "biil2fcb.php";
      });
      </script>