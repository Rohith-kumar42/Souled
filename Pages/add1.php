<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jersey"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle table selection
$selected_table = "";
$table_data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["table_name"])) {
    $selected_table = $_POST["table_name"];
    $sql = "SELECT * FROM $selected_table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $table_data[] = $row;
        }
    } else {
        echo "<p>No data found in table: $selected_table</p>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets\home-stylesheet.css">
    <link href="https://fonts.cdnfonts.com/css/wicked-steam" rel="stylesheet">
    <link rel="icon" type="image/png" href="./assets/Images/souled.png" style="width: 150%;">       
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Create, Insert, and Update Table</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .form-container {
            display: none;
            border: 1px solid black;
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            background-color: white;
            color: black;
        }
        select {
            margin-bottom: 20px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            color: black;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
    <script>
        function showForm() {
            const forms = document.querySelectorAll('.form-container');
            forms.forEach(form => form.style.display = 'none');
            const selectedForm = document.getElementById(document.getElementById('form-select').value);
            selectedForm.style.display = 'block';
        }
        document.addEventListener("DOMContentLoaded", function() {
            showForm();
        });
    </script>
</head>
 
<nav class="d-flex navbar navbar-expand-md darkNav navbar-dark" style="background-color: black;">
    <!-- Toggler/collapsibe Button -->
    <!-- <span class="d-md-none d-block" style="cursor:pointer" onclick="openNav()"><img width="30px" height="30px" src="https://icon-library.com/images/hamburger-menu-icon-png-white/hamburger-menu-icon-png-white-10.jpg"></span> -->

    
    
<div class="mx-auto bg" style="color: black;">
    <a class="float-left" href="Home.html"><img
        class="logoBig" src="assets/Images/Souled (1).png" style="width: 150px; position: relative; left: -150px; top: 3px; right: 20px;"></a>
    
    <!--Navbar-->
    <div class="collapse navbar-collapse" id="collapsibleNavbar" style="position: relative; left: 300px;background-color: black;">
      <ul class="navbar-nav pt-1">
        <li class="nav-item dropdown">
            <a class="nav-link"  data-toggle="dropdown">
              Store
            </a>
            <div style="background-color:black" class="dropdown-menu">
              <a class="menuItem" href="./Pages/home.html">Home</a>
              <a class="menuItem" href="./pages/discoveryqueue.html">Discovery Queue</a>
              <a class="menuItem" href="./pages/stats.html">Jersey</a>
            </div>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="./Pages/support.html">Support</a>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link" >Account</a>

          <div style="background-color:black" class="dropdown-menu">
            <a class="menuItem" href="./log1.php">Login</a>
            <a class="menuItem" href="Sign-up.html">Sign Up</a>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./Pages/cart.php">About</a>
        </li>
      </ul>
    </div>
</div>

<div class="btn-group">
  <div class="btn-group" >
<a href="cart.php"> <button type="button" class="d-none d-md-block btn btn-primary btn-disabled" aria-haspopup="true" aria-expanded="false" >
&#x1F6D2;CART
</button></a>

</div>
  <div class="dropdown-menu" style="background-color:#3786c6;  margin-top: 5px; width: fit-content;margin-left: -40px;max-width: 50px;">
      <a class="dropdown-item" href="./Pages/user.php" style="color:black;">View My Profile</a>
      <a class="dropdown-item" href="./Pages/useraccount.php" style="color:black;">Account Details</a>
      <a class="dropdown-item" href="./pages/home.html" style="color: black;">Signout</a>
      <!-- Add more dropdown options as needed -->
  </div>
</div>


  </nav>
<body>
    <h1>Database Operations</h1>
    <label for="form-select">Select Operation:</label>
    <select id="form-select" onchange="showForm()">
        <option value="create-form">Create Table</option>
        <option value="addvalues-form">Add Values</option>
        <option value="updatevalues-form">Update Values</option>
        <option value="display-form">Display Table</option>
    </select>

    <div id="create-form" class="form-container">
        <h2>Create Table</h2>
        <form action="add.php" method="post">
            <label for="table_name">Table Name:</label>
            <input type="text" id="table_name" name="table_name" required><br><br>
            <label for="columns">Columns (comma-separated, e.g., id INT PRIMARY KEY, name VARCHAR(100)):</label><br>
            <textarea id="columns" name="columns" rows="4" cols="50" required></textarea><br><br>
            <input type="submit" value="Create Table">
        </form>
    </div>

    <div id="addvalues-form" class="form-container">
        <h2>Add Values</h2>
        <form action="addvalues.php" method="post">
            <label for="insert_table_name">Table Name:</label>
            <input type="text" id="insert_table_name" name="insert_table_name" required><br><br>
            <label for="values">Values (one row per line, e.g., 1, 'John Doe'):</label><br>
            <textarea id="values" name="values" rows="4" cols="50" required></textarea><br><br>
            <input type="submit" value="Add Values">
        </form>
    </div>

    <div id="updatevalues-form" class="form-container">
        <h2>Update Values</h2>
        <form action="updatevalues.php" method="post">
            <label for="update_table_name">Table Name:</label>
            <input type="text" id="update_table_name" name="update_table_name" required><br><br>
            <label for="update_columns">Update Columns (e.g., name='John Doe'):</label><br>
            <input type="text" id="update_columns" name="update_columns" required><br><br>
            <label for="conditions">Conditions (e.g., id=1):</label><br>
            <input type="text" id="conditions" name="conditions" required><br><br>
            <input type="submit" value="Update Values">
        </form>
    </div>
    <div class="form-container" id="display-form">
    <form  method="post">
            <label for="table_name">Table Name:</label>
            <input type="text" id="table_name" name="table_name" required><br><br>
            <input type="submit" value="Display Data">
        </form>
    </div>

    <?php if (!empty($table_data)) : ?>
        <h2>Data from Table: <?php echo htmlspecialchars($selected_table); ?></h2>
        <table>
            <thead>
                <tr>
                    <?php foreach (array_keys($table_data[0]) as $column) : ?>
                        <th><?php echo htmlspecialchars($column); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($table_data as $row) : ?>
                    <tr>
                        <?php foreach ($row as $value) : ?>
                            <td><?php echo htmlspecialchars($value); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <br>
    <br>
    <br>
    <br>
</body>
</html>
