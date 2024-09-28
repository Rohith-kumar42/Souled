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
    $table_name = $_POST["update_table_name"];
    $update_columns = $_POST["update_columns"];
    $conditions = $_POST["conditions"];

    // Validate inputs
    if (empty($table_name) || empty($update_columns) || empty($conditions)) {
        die("Table name, update columns, and conditions are required.");
    }

    // Parse the update_columns input into an associative array
    $update_columns_array = explode(',', $update_columns);
    $update_columns_assoc = [];
    foreach ($update_columns_array as $column_value) {
        list($column, $value) = explode('=', trim($column_value));
        $update_columns_assoc[trim($column)] = trim($value, " '\"");
    }

    // Build the SET part of the query
    $set_parts = [];
    $types = '';
    $values = [];
    foreach ($update_columns_assoc as $column => $value) {
        $set_parts[] = "$column = ?";
        $types .= 's'; // Assuming all values are strings, you might need to adjust this based on your column types
        $values[] = $value;
    }
    $set_query = implode(', ', $set_parts);

    // Add condition value
    $condition_parts = explode('=', $conditions);
    $condition_column = trim($condition_parts[0]);
    $condition_value = trim($condition_parts[1], " '\"");
    $types .= 's';
    $values[] = $condition_value;

    // Prepare and execute the query
    $sql = "UPDATE $table_name SET $set_query WHERE $condition_column = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$values);

    if ($stmt->execute() === TRUE) {
        echo "Values updated successfully in '$table_name'.";
    } else {
        echo "Error updating values: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
