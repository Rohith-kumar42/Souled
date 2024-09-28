<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/product-stylesheet.css">
        <link rel="icon" type="image/png" href="../assets/Images/souled.png" style="width: 150%;"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script><script src="product-js.js"></script>
         <script src="../assets/product-js.js"></script>

        <nav class="d-flex navbar navbar-expand-md darkNav navbar-dark">
            <!-- Toggler/collapsibe Button -->
            <span class="d-md-none d-block" style="cursor:pointer" onclick="openNav()"><img width="30px" height="30px" src="https://icon-library.com/images/hamburger-menu-icon-png-white/hamburger-menu-icon-png-white-10.jpg"></span>

            <div id="myNav" class="overlay">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img width="30px" height="30px" src="https://icon-library.com/images/hamburger-menu-icon-png-white/hamburger-menu-icon-png-white-10.jpg"></a>
              <div class="overlay-content">
                <ul class="navbar-nav pl-4 pt-1">
                  <li class="nav-item dropdown">
                      <a class="nav-link" href="../pages/home.html" data-toggle="dropdown">
                        Store
                      </a>
                      <div style="background-color:black" class="dropdown-menu">
                        <a class="menuItem" href="home.html">Home</a>
                        <a class="menuItem" href="../pages/discoveryqueue.html">Discovery Queue</a>
                        <a class="menuItem" href="../pages/wishlist.html">Wishlist</a>
                        <a class="menuItem" href="../pages/home.html">Points Shop</a>
                        <a class="menuItem" href="../pages/news.html">News</a>
                        <a class="menuItem" href="../pages/stats.html">Jersey</a>
                      </div>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../pages/home.html">Support</a>
                    </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="../pages/home.html">Account</a>
  
                    <div style="background-color:black" class="dropdown-menu">
                      <a class="menuItem" href="../pages/home.html">Login</a>
                      <a class="menuItem" href="../pages/home.html">Sign Up</a>
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
                class="logoBig" src="../assets/Images/souled (1).png"></a>
            
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav pt-1">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="../pages/home.html" data-toggle="dropdown">
                      Store
                    </a>
                    <div style="background-color:black" class="dropdown-menu">
                      <a class="menuItem" href="../pages/home.html">Home</a>
                      <a class="menuItem" href="../pages/discoveryqueue.html">Discovery Queue</a>
                      
                      <a class="menuItem" href="../pages/stats.html">Jersey</a>
                    </div>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Pages/support.html">Support</a>
                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="../pages/home.html">Account</a>

                  <div style="background-color:black" class="dropdown-menu">
                    <a class="menuItem" href="../log1.php">Login</a>
                    <a class="menuItem" href="../Pages/Sign-up.html">Sign Up</a>
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
    
    <body id="body" style="background-color: #1b2838;">
        <div class="bg">
            <!--Game Highlights Container-->
            <div id="game-highlight-div" class="container" style=" width: 60%; height: 470px; position: relative; background-color: #0e151d; padding: 0px;">
                <div style="float: left; width: 60%; height: 100%;"
         id="demo" class="carousel slide carousel-fade vid-carousel" data-ride="carousel" data-interval="false">

          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active" style="background-image: url(../assets/Images/fifac.jpg);"></li>
            <li data-target="#demo" data-slide-to="1" style="background-image: url(../assets/Images/fifa1.jpg);"></li>
            <li data-target="#demo" data-slide-to="2" style="background-image: url(../assets/Images/fifa2.jpg);"></li>
            <li data-target="#demo" data-slide-to="3" style="background-image: url(../assets/Images/fifa3.jpg);"></li>
          </ul>
          
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
                <video controls autoplay muted id="myVideo" width="100%" height="100%">
                    <source src="../assets/Videos/EA SPORTS FC 24 _ Official Gameplay Trailer.mp4" type="video/mp4">
                  </video>
            </div>
            <div class="carousel-item">
              <img src="../assets/Images/fifa1.jpg">
            </div>
            <div class="carousel-item">
              <img src="../assets/Images/fifa2.jpg">
            </div>
            <div class="carousel-item">
                <img src="../assets/Images/fifa3.jpg">
              </div>
          </div>
          
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>

        <div id="game-highlight" style="display: inline-block; width: 40%; height: 100%; padding-left: 1%;">
            <img class="game_header_image_full" src="../assets/Images/fifac.jpg"
            style="width: 100%;">
            <p class="smallFont">
                EA SPORTS FC™ 24 welcomes you to The World’s Game: the most true-to-football experience ever with HyperMotionV, PlayStyles optimised by Opta, and an enhanced Frostbite™ Engine.                <p class="tinyFont">
                    RELEASE DATE: &#160; &#160; &#160; &#160; &#160; &#160;
                    
28 Sep, 2023
                    <br>
                    DEVELOPER: &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; 
                    
EA Canada & EA Romania
                    <br>
                    PUBLISHER: &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;
                    
Electronic Arts
                </p>
            </p>
        </div>

                
        </div>

        <div class="container" id="game-price" style="
        width: 60%; height: 80px; background-image: linear-gradient(to right, rgb(45, 61, 74) , rgb(87, 101, 116));">
            <div class="smallFont" style="display: inline-block; font-weight: 600; font-size: 20px; padding-left: 5px; margin-top: 25px;">
                Purchase    EA FC24
            </div>
            
            <div id="price" style="background-color: black; float: right; padding: 5px; margin-top: 20px;">
                    <span style="color: #c5d3de; position: relative; top: 8px; padding-right: 12px;">₹2000 RUP</span>

                <div id="btn-buy" style="float: right;">
                    <a href="../Pages/otpverification.php">
                      <button type="button" class="btn btn-success"><span>Buy Game</span></button>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div id="sysreq" style="display: inline-block; border-bottom: 1px; border-color: #3a6e8b; border-style: solid; border-top: 0px;
        border-left: 0px; border-right: 0px; margin-left: 20%;">
          <span class="smallFont">
            System Requirements &#160; &#160;
          </span>
          <br>
          <div id="req-type" class="smallFont">
            <span class="dimFont">OS: </span> Windows 10 - 64-Bit. <br>
            <span class="dimFont">Processor: </span>Intel Core i5-6600K @ 3.50GHz or AMD Ryzen 5 1600 @ 3.2 GHZ. <br>
            <span class="dimFont">Memory: </span>8 GB RAM. <br>
            <span class="dimFont">Graphics: </span>NVIDIA GeForce GTX 1050 Ti 4GB or AMD Radeon RX 570 4GB. <br>
            <span class="dimFont">DirectX: </span>Version 9.0c <br>
            <span class="dimFont">Storage: </span>100 GBavailable space <br>
          </div>

        </div>
       

        </div>
    </body>

</html>