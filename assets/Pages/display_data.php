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

// Prepare SQL statement to fetch the last entered username
$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Check if there are any rows in the result
if ($result->num_rows > 0) {
    // Output data of the last entered username
    $row = $result->fetch_assoc();
    $lastUsername = $row["username"];
    echo "Last entered username: " . $lastUsername;
} else {
    echo "No username found";
}

// Close the database connection
$conn->close();
?>