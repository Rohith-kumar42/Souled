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
    $table_name = $_POST["insert_table_name"];
    $values = $_POST["values"];

    // Validate inputs
    if (empty($table_name) || empty($values)) {
        die("Table name and values are required.");
    }

    // Split values into rows
    $rows = explode("\n", $values);
    $errors = [];

    foreach ($rows as $row) {
        $row = trim($row); // Remove any surrounding whitespace
        if (!empty($row)) {
            // Construct SQL query
            $sql = "INSERT INTO $table_name VALUES ($row)";
            if (!$conn->query($sql)) {
                $errors[] = "Error inserting row '$row': " . $conn->error;
            }
        }
    }

    if (empty($errors)) {
        echo "Values inserted successfully into '$table_name'.";
    } else {
        echo "Errors occurred:<br>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

$conn->close();
?>
