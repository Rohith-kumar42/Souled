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
$sql1 = "SELECT quantity FROM quantity ORDER BY id DESC LIMIT 1";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  while ($row = $result1->fetch_assoc()) {
    $quantity = $row["quantity"];
  }
} else {
  // echo "0 results";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["code"];
  $cardHolderName = $_POST["card_holder_name"];
  $cardNumber = $_POST["card_number"];
  $shippingAddress = $_POST["address"];
  $product_value = $quantity * 7500;
  $number1 = $_POST["number1"];

 
  

  // SQL query to insert data into the table
  $sql2 = "INSERT INTO checkout (email, password, card_holder_name, card_number,shipping_address,product_value,productchoosed)
  VALUES ('$email', '$password', '$cardHolderName', '$cardNumber', '$shippingAddress','$product_value','$number1')";

  if ($conn->query($sql2) === TRUE) {
    // Redirect the user to a success page or perform any other action
    header("Location: otpverify.php");
    exit();
  } else {
    echo "Error inserting data: " . $conn->error;
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
        <link rel="stylesheet" href="../assets/checkout-stylesheet.css">
        <link rel="icon" type="image/png" href="../assets/Images/souled.png" style="width: 150%;"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/checkout-js.js"></script>

        <nav class="d-flex navbar navbar-expand-md darkNav navbar-dark" style="background-color:black">
            
        <div class="mx-auto bg">
            <a href="home.html"><img class="logoBig" src="../assets/Images/souled (1).png" style="width: 150px;height:70px"></a>            
        </div>


          </nav>
    </head>

    <body id="transparentBG" style="background-color: #00000;">
      
        <img style="position: absolute; width: 800px; height:700px;visibility: hidden;" >
  
        
        <form method="post" id="checkoutForm" action="checkout1.php"  style="width: 40%; margin-top: 5%;background-color:black" class="container fade-in">
          <div class="container" style="text-align: center;">
            <img src="../assets/Images/souled (1).png">
          </div>

          <div class="container smallFont">
            <label ><b>Recipient Email</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="Enter Recipient Email" name="email" required>

            <label><b>Confirm Your Password</b></label>
            <input style="background-color:#e8f0fe;" type="password" placeholder="Enter Password" name="code" required>
            <br><label ><b>Credit Card info</b></label>
            <br> 
            <label ><b>Name on card</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="Enter Card holder name" name="card_holder_name" required>

            <label ><b>Card Number</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="1234-4567-8910-1234" name="card_number" required>

            <!-- <label for="verification_code">Verification Code:</label>
            <input type="text" id="code" name="vcode" required><br><br> -->
            <label>Shipping Address</label>
            <input type="text" name="address" required><br><br>
            <div>
                <h3 style="color: white;margin-left: 10px;">Select SIZE</h3>
                <select name="size" style="padding: 10px;width: 100px;border-radius: 10%;margin-left: 10px;background-color: white;border-bottom:14px solid red;border: 2px solid red;">
                  <option value="S">S <?php echo isset($sizes['S']) ? $sizes['S'] : '0'; ?></option>
                  <option value="M">M <?php echo isset($sizes['M']) ? $sizes['M'] : '0'; ?></option>
                  <option value="L">L <?php echo isset($sizes['L']) ? $sizes['L'] : '0'; ?></option>
                  <option value="XL">XL <?php echo isset($sizes['XL']) ? $sizes['XL'] : '0'; ?></option>
                  <option value="XXL">XXL <?php echo isset($sizes['XXL']) ? $sizes['XXL'] : '0'; ?></option>
                </select>
            </div><br>
            <br>
            <label for="quantity" style="color:white">Quantity:</label>
            <p style="color:white"><?php echo isset($quantity) ? $quantity : ''; ?></p>
            <p>Total Number of prducts Selected</p>
           <input type="number" style="width:100px" name="number1" id="number1" required value="0"> 
          </div>

          <div class="container">
            
          </div>
       
            <h2 style="color: whitesmoke;">Product:FC BARCELONA HOME JERSEY</h2>
            <p style="color: whitesmoke;" id="product_value" name="product_value">Total: ₹<?php echo isset($quantity) ? $quantity * 7500 : ''; ?> RUP</p> 
            
            <button type="submit" class="smallFont btn btn-primary btn-disabled" style="display: block;width: 25%; margin-left: 37%; margin-top:2%;height: 50px;border:1px solid white">
             <a href="bill.php"> <span style="color: whitesmoke; font-weight: 600;">Checkout</span></a></button>
              <button style="width: 25%; margin-left: 37%; margin-top:2%;height: 50px; background-image: linear-gradient(to right, #df1b1b, #ba3030);border:1px solid white" 
            type="button" class="btn btn-danger smallFont" onclick=clearInput()><span style="color: whitesmoke; font-weight: 600;">Clear</span></button></button>
            <label >
                <br>
              <input type="checkbox" checked="checked" name="remember" > <span style="color:white">Remember info for next purchase<span>
            </label>
          
          </div>
        
          <div class="container">
            
          </div>
        </form>

    </body>
    <script>
    var quantity = document.getElementsByName("quantity")[0].value;
    // Get the value from the quantity input field

</html>