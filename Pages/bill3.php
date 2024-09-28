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
$sql1 = "SELECT * FROM cart";
$result1 = $conn->query($sql1);
$result = $conn->query($sql1);



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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NGB9XqFIl/s9n8IhD/8/pZrWrrmJXAZ1+5FdCzP6iE/X6dJ6/Zn+/UH9lb8B06Gy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script><script src="product-js.js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        
        </script>
         <script src="./assets/product-js.js"></script>
         <style>
         input[type="text"]{
          background-color: #ffffff;
         }
         table, th, td {
  border: 1px solid white;
  color:white;
}
td{
  text-transform:uppercase;
}
          </style>
        </head>
    
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
    <body id="transparentBG" style="background-color: #000;overflow-x:hidden">

        <div class="container" id="container1" style="color:white;margin-top:100px;margin-left:100px;border:2px solid white;margin-top:50px">
      <br>
      <div>
        <img src="./assets/images/souled (1).png" style="margin-left:400px;margin-top:-20px"><br><br><br><br>
        <p style="margin-left:900px">GST No: 33ACLPS7699L2Z</p>
        <p style="margin-left:900px" >Date:</p>
        <p style="margin-left:960px;margin-top:-39.5px" id="datetime"></p>
      </div>
        <form id="form"> 
          <p>To</p>
    
    <input type="text" value="<?php echo htmlspecialchars($email);?>" style="width:250px;background-color:transparent;color:white;border:none;"><br><br>
    <input type="text" value="<?php echo htmlspecialchars($cardHolderName);?>" style="width:250px;background-color:transparent;color:white;border:none;"><br><br>
    <input type="text" value="<?php echo htmlspecialchars($shippingAddress);?>" style="width:250px;background-color:transparent;color:white;border:none;"><br><br>
    <!-- <input type="text" value="<?php echo htmlspecialchars($price);?>" style="width:250px;background-color:transparent;color:white;border:none;"><br><br> -->
</form><br>
<table style="border:1px solid white;margin-left:150px;border-collapse:collapse" id="myTable">
<tr>
    <th style="width:500px;text-align:center">Description</th>
    <th style="text-align:center;width:100px">Price</th>
    <th style="text-align:center;width:100px">Quantity</th>
    <th style="text-align:center;width:100px">Total</th>
</tr>
<tr>
<?php
            // Display the retrieved data in the table
            if ($result) {
              if ($result->num_rows > 0) {
                $totalprice=0;
          
                while ($row = $result->fetch_assoc()) {
                  
                    // Display the data for odd index
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["size"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "</tr>";  
                    
                  
                    $totalprice+=$row['price'];
                 
                }
              } else {
                echo "<tr><td colspan='6'>No items in the cart.</td></tr>";
              }
            } 
              ?>
</table>
<br><br>

<p style="margin-left:800px">Total</p>
<p  style="width:250px;background-color:transparent;color:white;border:none;margin-left:900px;margin-top:-39.50px"><?php echo $totalprice ?></p><br><br>

    <button id="downloadBtn" class="btn btn-primary btn-disabled" style="margin-left:820px">Download BILL AS IMAGE</button><br><br>

</div>  
<br><br>
  </body>
    <script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
        <script>
        document.getElementById('downloadBtn').addEventListener('click', function () {
          // Apply the necessary styles directly in JavaScript (if needed)
          var table = document.getElementById('myTable');
          var body = document.getElementsByTagName('body')[0];
          var container = document.getElementById('container1');
          container.style.display = 'block';
          container.style.backgroundColor = 'black';
          body.style.Color='black';
          table.style.backgroundColor = 'black';
          table.style.color = 'white';
          var btn=document.getElementById('downloadBtn');
          btn.style.display='none';
          var cells = table.getElementsByTagName('th');
          for (var i = 0; i < cells.length; i++) {
            cells[i].style.border = '1px solid white';
          }
          cells = table.getElementsByTagName('td');
          for (var i = 0; i < cells.length; i++) {
            cells[i].style.border = '1px solid white';
          }

          html2canvas(document.querySelector('.container')).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var link = document.createElement('a');
            link.download = 'bill.png';
            link.href = imgData;
            link.click();
          });
        });6
var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = mm + '/' + dd + '/' + yyyy;
  document.getElementById("datetime").innerHTML = today;
</script>
  

</html>
