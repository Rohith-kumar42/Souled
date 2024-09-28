<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jersey"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST["table_name"];
    $columns = $_POST["columns"];

    // Validate inputs
    if (empty($table_name) || empty($columns)) {
        die("Table name and columns are required.");
    }

    // Construct SQL query
    $sql = "CREATE TABLE $table_name ($columns)";

    if ($conn->query($sql) === TRUE) {
        echo "Table '$table_name' created successfully.";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$conn->close();
?>
