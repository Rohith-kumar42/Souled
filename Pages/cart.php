<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jersey";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];
  
  // Delete the row from the "cart" table
  $delete_sql = "DELETE FROM cart WHERE id = $delete_id";
  $conn->query($delete_sql);
}
// Retrieve data from the "cart" table
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

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
         <style>
     table, th, td,tr :nth-child(6){
  border: 1px solid white;
  margin-left:100px;
}
        th, td {
            text-align: left;
            padding: 8px;
            padding-right:-10px;
            text-transform:uppercase;
        }

        tr:nth-child(even) {
            background-color: #000;
            color:white;
        }
        tr:nth-child(odd) {
            background-color: #000;
            color:white;
        }
      
        .cart{
          background-color: transparent;
          border: none;
        }
        .delete{
          background-color: transparent;
          border: none;
          color:red;
        }
    </style>
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
                  <a class="nav-link" href="./About/cart.php">Cart</a>
                </li>
              </ul>
            </div>
        </div>

  
          </nav>
    </head>

<body style="background-color:black">
    <div >
        <h2 style="color:white">Cart Items</h2><br>
        <table >
            <tr style="color:white">
                <th style="width:400px">JERSEY/BOOT NAME</th>
                <th>SIZE</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
            </tr>
            <?php
            // Display the retrieved data in the table
            if ($result) {
              if ($result->num_rows > 0) {
                
          
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<tr id='row-" . $row["id"] . "'>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["size"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["quantity"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["price"]) . "</td>";
                    echo "<td style='border-right:none'><a href='" . htmlspecialchars($row["page_url"]) . "'><button class='cart' type='button'>&#x1F6D2;</button></a></td>";
                    echo "<td style='border-right:none;border-left:none'><button type='button' class='delete' onclick='removeRow(" . $row["id"] . ")'>&#x1F5D9;</button></td>";
                    echo "</tr>";  
                    
                  
                  
                 
                }
              } else {
                echo "<tr><td colspan='6'>No items in the cart.</td></tr>";
              }
            } 
              ?>
         
        </table>
        <br>
        <br>
        <div id="btn-buy" style="margin-left:710px">
                    <a href="./Pages/otpverification.php">
                      <button type="button" class="btn btn-primary active"><span >Buy Jersey</span></button>
                    </a>
                </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
    <script>
    function removeRow(id) {
    if (confirm("Are you sure you want to remove the product from cart?")) {
        // AJAX call to delete the row
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Check if the server responded with a success message
                if (xhr.responseText.trim() === "success") {
                    // Remove the row from the table
                    var row = document.getElementById("row-" + id);
                    if (row) {
                        row.parentNode.removeChild(row);
                    }
                } else {
                    // Handle the error
                    alert("Error deleting row: " + xhr.responseText);
                }
            }
        };
        xhr.send("id=" + id);
    }
}
</script>
