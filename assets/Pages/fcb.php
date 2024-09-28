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

// SQL query to fetch data from the table
$sql = "SELECT size, count FROM fcbhome";
$result = $conn->query($sql);

// Create an associative array to store the sizes and their counts
$sizes = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sizes[$row["size"]] = $row["count"];
    }
} else {
    echo "0 results";
}
$quantity = $_POST['quantity'];

// Insert the quantity value into the database table
$sql = "INSERT INTO quantity (quantity) VALUES ('$quantity')";
if ($conn->query($sql) === TRUE) {
  // echo "Quantity inserted successfully";
} else {
  echo "Error inserting quantity: " . $conn->error;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['size']) && isset($_POST['quantity'])) {
    $selectedSize = $_POST['size'];
    $quantity = $_POST['quantity'];

    // Update the count value in the table based on the selected size
    $sql1 = "UPDATE fcbhome SET count = count - $quantity WHERE size = '$selectedSize'";
    if ($conn->query($sql1) === TRUE) {
        // echo "Count updated successfully";
    } else {
        echo "Error updating count: " . $conn->error;
    }
}

// Fetch the sizes and their counts from the database
$sql = "SELECT size, count FROM fcbhome";
$result = $conn->query($sql);

// Create an associative array to store the sizes and their counts
$sizes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sizes[$row['size']] = $row['count'];
    }
} else {
    // echo "0 results";
}
   

// Close the connection
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

        <nav class="d-flex navbar navbar-expand-md darkNav navbar-dark" style="background-color:black">
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
                        <a class="menuItem" href="./pages/wishlist.html">Wishlist</a>
                        <a class="menuItem" href="./pages/home.html">Points Shop</a>
                        <a class="menuItem" href="./pages/news.html">News</a>
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
                    <a class="nav-link" href="./About/about.html">About</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button> -->
        <div class="mx-auto bg" >
            <a class="float-left" href="home.html"><img
                class="logoBig" src="./assets/Images/souled (1).png" style="border:none;width:100;"></a>
            
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar" style="background-color:black">
              <ul class="navbar-nav pt-1">
                <li class="nav-item dropdown">
                    <a class="nav-link"  data-toggle="dropdown">
                      Store
                    </a>
                    <div style="background-color:black" class="dropdown-menu">
                      <a class="menuItem" href="./pages/home.html">Home</a>
                      <a class="menuItem" href="./pages/discoveryqueue.html">Discovery Queue</a>
                      <a class="menuItem" href="./pages/wishlist.html">Wishlist</a>
                      <a class="menuItem" href="./pages/home.html">Points Shop</a>
                      <a class="menuItem" href="./pages/news.html">News</a>
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
                  <a class="nav-link" href="./About/about.html">About</a>
                </li>
              </ul>
            </div>
        </div>

  
          </nav>
    </head>
    
    <body id="body" style="background-color: #000000;">
        <div class="bg">
            <!--Game Highlights Container-->
            <div id="game-highlight-div" class="container" style=" width: 60%; height: 1070px; position: relative; background-color: #00000; padding: 0px;margin-top: 10px;">
                <div style="float: left; width: 60%; height: 100%;margin-top: 0px;"
         id="demo" class="carousel slide carousel-fade vid-carousel" data-ride="carousel" data-interval="false">

        
          
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./assets/Images/fcbarcelonajersey.png" style="height: 800px; padding: 15px;background-size: contain;">
            </div>
            <div class="carousel-item">
              <img src="./assets/Images/fcbarcelonajersey1.png" style="height: 800px; padding: 15px;background-size: contain;">
            </div>
            <div class="carousel-item">
              <img src="./assets/Images/fcbarcelonajersey2.jpg" style="height: 800px; padding: 15px;background-size: contain;">
            </div>
            <div class="carousel-item">
                <img src="./assets/Images/fcbarcelonajersey3.jpg" style="height: 800px; padding: 15px;background-size: contain;">
              </div>
              <div class="carousel-item">
                <img src="./assets/Images/fcbarcelonajersey4.jpg" style="height: 800px; padding: 15px;background-size: contain;">
              </div>
              <div class="carousel-item">
                <img src="./assets/Images/fcbarcelonajersey5.jpg" style="height: 800px; padding: 15px;background-size: contain;">
              </div>
              <div class="carousel-item">
                <img src="./assets/Images/fcbarcelonajersey6.jpg" style="height: 800px; padding: 15px;background-size: contain;">
              </div>
              <div class="carousel-item">
                <img src="./assets/Images/fcbarcelonajersey7.jpg" style="height: 800px; padding: 15px;background-size: contain;">
              </div>
          </div>
          <form action="fcb.php" method="POST">
          <div>
            <h3 style="color: white;margin-left: 10px;">Select SIZE</h3>
            <button type="button" id="s" style="padding: 15px;width: 85px;height: 70px;border-radius: 10%;margin-left: 10px;background-color: white;border-bottom:14px solid red;border: 2px solid red;">
              S<br><?php echo isset($sizes['S']) ? $sizes['S'] : '0'; ?>
          </button>
          <button type="button" id="m"  style="padding: 15px;width: 85px;height: 70px;border-radius: 10%;margin-left: 10px;background-color: white;border-bottom:14px solid red;border: 2px solid red;">
              M<br><?php echo isset($sizes['M']) ? $sizes['M'] : '0'; ?>
          </button>
          <button type="button" id="l"  style="padding: 15px;width: 85px;height: 70px;border-radius: 10%;margin-left: 10px;background-color: white;border-bottom:14px solid red;border: 2px solid red;">
              L<br><?php echo isset($sizes['L']) ? $sizes['L'] : '0'; ?>
          </button>
          <button type="button" id="xl" style="padding: 15px;width: 85px;height: 70px;border-radius: 10%;margin-left: 10px;background-color: white;border-bottom:14px solid red;border: 2px solid red;">
              XL<br><?php echo isset($sizes['XL']) ? $sizes['XL'] : '0'; ?>
          </button>
          <button type="button" id="xxl"  style="padding: 15px;width: 85px;height: 70px;border-radius: 10%;margin-left: 10px;background-color: white;border-bottom:14px solid red;border: 2px solid red;">
              XXL<br><?php echo isset($sizes['XXL']) ? $sizes['XXL'] : '0'; ?>
          </button>
       
            <div class="product-single__quantity">
            <label style="margin-left: 10px;color: white;font-size: 20px;">Size</label>
            <input type="text" id="size" name="size" value="" style="width: 60px;margin-left: 20px;margin-top: 20px;height: 40px;">

              <label style="margin-left: 10px;color: white;font-size: 20px;">Quantity</label>
              <input type="number" id="Quantity" name="quantity" value="0" style="width: 60px;margin-left: 20px;margin-top: 20px;height: 40px;">
              <button type="submit" class="btn-primary active" style="margin-left: 30px;padding: 10px 20px;color: white;border-radius: 5px;border: none;cursor: pointer;">Add to Cart</button>
            </div>
          </form>
          </div>
            <!-- Indicators -->
            <ul class="" style="width: 190px;margin-left: 710px;margin-top: -880px;list-style-type: none;">
              <li data-target="#demo" data-slide-to="0" class="active" style="background-image: url(./assets/Images/fcb1.png);height: 85px;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <li data-target="#demo" data-slide-to="1" style="background-image: url(./assets/Images/fcb2.png);height: 85px;background-size: contain;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <li data-target="#demo" data-slide-to="2" style="background-image: url(./assets/Images/fcb3.png);height: 85px;background-size: contain;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <li data-target="#demo" data-slide-to="3" style="background-image: url(./assets/Images/fcb4.png);height: 85px;background-size: contain;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <li data-target="#demo" data-slide-to="4" style="background-image: url(./assets/Images/fcb5.png);height: 85px;background-size: contain;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <li data-target="#demo" data-slide-to="5" style="background-image: url(./assets/Images/fcb6.png);height: 85px;background-size: contain;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <li data-target="#demo" data-slide-to="6" style="background-image: url(./assets/Images/fcb7.png);height: 85px;background-size: contain;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <li data-target="#demo" data-slide-to="7" style="background-image: url(./assets/Images/fcb8.png);height: 85px;background-size: contain;background-repeat: no-repeat;width: 155px;background-size: cover;"></li><br>
              <!-- <li data-target="#demo" data-slide-to="3" style="background-image: url(./assets/Images/csgo3.jpg);"></li> -->
            </ul>
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>

        <!-- <div id="game-highlight" style="display: inline-block; width: 40%; height: 100%; padding-left: 1%;">
            <img class="game_header_image_full" src="./assets/Images/fcbarcelona.jpg"
            style="width: 100%;">
            <p class="smallFont">
                Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.                <br> 
                <p class="tinyFont">
                    RELEASE DATE: &#160; &#160; &#160; &#160; &#160; &#160;
                    14 Apr,2015
                    <br>
                    DEVELOPER: &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; 
                    Valve, Hidden Path Entertainment
                    <br>
                    PUBLISHER: &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;
                    Valve
                </p>
            </p>
        </div> -->

                
        </div>
<br>
        <div class="container" id="game-price" style="
        width: 60%; height: 150px; background-image: linear-gradient(to right, rgb(45, 61, 74) , rgb(87, 101, 116));">
            <div class="smallFont" style="display: inline-block; font-weight: 600; font-size: 20px; padding-left: 5px; margin-top: 25px;">
                Purchase FC BARCELONA HOME KIT 2023-2024
            </div>
            
            <div id="price" style="background-color: black; float: right; padding: 5px; margin-top: 20px;">
                    <span style="color: #c5d3de; position: relative; top: 8px; padding-right: 12px;">₹7500 RUP</span>

                <div id="btn-buy" style="float: right;">
                    <a href="./Pages/otpverification.php">
                      <button type="button" class="btn btn-primary active"><span>Buy Jersey</span></button>
                    </a>
                </div>
               
            </div>
            <div>
              
              </h2></div>
            </div>
        </div>
        <br>
        


      
        </div>
    </body>

</html>