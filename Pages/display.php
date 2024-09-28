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